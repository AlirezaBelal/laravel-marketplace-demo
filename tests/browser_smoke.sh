#!/usr/bin/env bash

# Public, unauthenticated browser smoke test only. Run with disposable data.
set -euo pipefail

browser_port="${BROWSER_SMOKE_PORT:-8765}"
browser_origin="http://127.0.0.1:${browser_port}"
browser_temp="$(mktemp -d)"

if command -v google-chrome >/dev/null 2>&1; then
    browser_binary="$(command -v google-chrome)"
elif command -v chromium >/dev/null 2>&1; then
    browser_binary="$(command -v chromium)"
else
    echo 'A local Chrome/Chromium binary is required for the browser smoke test.' >&2
    exit 1
fi

php artisan serve --host=127.0.0.1 --port="${browser_port}" >"${browser_temp}/server.log" 2>&1 &
browser_server_pid=$!
trap 'kill "${browser_server_pid}" 2>/dev/null || true' EXIT

browser_ready=0
for _ in {1..30}; do
    if curl --silent --fail --output /dev/null "${browser_origin}/users/login-register"; then
        browser_ready=1
        break
    fi
    sleep 1
done

if [[ "${browser_ready}" != '1' ]]; then
    echo 'The isolated Laravel HTTP server did not become ready.' >&2
    exit 1
fi

for browser_path in '/' '/users/login-register' '/cart' '/seller/account/login'; do
    browser_status="$(curl --silent --output /dev/null --write-out '%{http_code}' "${browser_origin}${browser_path}")"
    if [[ "${browser_status}" != '200' ]]; then
        echo "Unexpected HTTP ${browser_status} for ${browser_path}" >&2
        exit 1
    fi

    "${browser_binary}" \
        --headless \
        --no-sandbox \
        --disable-gpu \
        --disable-dev-shm-usage \
        --no-first-run \
        --virtual-time-budget=2500 \
        --dump-dom "${browser_origin}${browser_path}" \
        >"${browser_temp}/rendered.html" 2>"${browser_temp}/chrome.log"

    if ! grep -qi '<html' "${browser_temp}/rendered.html" ||
       grep -Eqi 'ERR_CONNECTION_REFUSED|This site can.t be reached' "${browser_temp}/rendered.html"; then
        echo "Chrome could not render ${browser_path}" >&2
        exit 1
    fi

    if [[ "${browser_path}" == '/users/login-register' ]] &&
       ! grep -q 'wire:' "${browser_temp}/rendered.html"; then
        echo 'The guest login page did not render Livewire bindings.' >&2
        exit 1
    fi

    echo "Chrome smoke passed: ${browser_path}"
done
