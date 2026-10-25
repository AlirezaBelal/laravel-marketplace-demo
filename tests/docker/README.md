# Disposable local acceptance sandbox

Use **only in a fresh clone** of `master`, with synthetic
records. Requires Docker Desktop in Linux mode and previously built frontend
assets (`npm ci`, `npm run build`). Nothing in this configuration uses a host
database, imports historical dumps, or exposes the MySQL port to Windows.
The single web port is bound to `127.0.0.1:18080`. Never use real service keys.

The app starts `php artisan serve --no-reload` deliberately. With a local `.env`
present, Laravel's default `serve` subprocess strips non-passthrough environment
variables (including `DB_HOST`, `DB_DATABASE` and `DB_USERNAME`); the child
then reads the `.env.example` defaults (host `127.0.0.1`, database
`marketplace_demo`) instead of the Compose-only MySQL service and returns
HTTP 500. `--no-reload` retains the isolated Compose environment. To apply
future Compose command changes **without resetting the test database**, use
`docker compose -f compose.acceptance.yml up -d --no-deps --force-recreate app`.

The service name `mysql` resolves only within this Compose network. Its data
directory is a Linux tmpfs, so it is intentionally nonpersistent. The two
passwords in `compose.acceptance.yml` are fixed **test-only** values for this
isolated network and must not be reused elsewhere.

Start from the root of the test clone:

```bash
docker compose -f compose.acceptance.yml config --quiet
docker compose -f compose.acceptance.yml up -d --build
docker compose -f compose.acceptance.yml exec -T app php -v
docker compose -f compose.acceptance.yml exec -T app composer install --no-interaction --prefer-dist --no-progress
```

In the newly cloned repository, **only if `.env` is absent**, create a local
file and a unique application key inside the PHP container:

```bash
docker compose -f compose.acceptance.yml exec -T app sh -lc 'test -f .env || cp .env.example .env'
docker compose -f compose.acceptance.yml exec -T app php artisan key:generate --force
```

Run the Feature suite **first, on the untouched disposable MySQL container**:

```bash
docker compose -f compose.acceptance.yml exec -T -e APP_ENV=testing -e CACHE_STORE=array -e SESSION_DRIVER=array -e MAIL_MAILER=array app vendor/bin/phpunit --testsuite Feature --display-phpunit-deprecations
```

Important: `RefreshDatabase` invokes `migrate:fresh` on the **main** MySQL
connection. The historical migrations also create tables in **five other**
connections, which that reset does not clear. Running `php artisan migrate`
first in the same sandbox leaves category tables behind and causes
`SQLSTATE[42S01]` duplicate-table errors during PHPUnit setup. CI deliberately
runs fresh-migration and full-Feature jobs with **separate** MySQL instances.

After the Feature suite succeeds, check/complete the migration ledger for
browser inspection (this is normally a no-op after PHPUnit):

```bash
docker compose -f compose.acceptance.yml exec -T app php artisan migrate --force
```

If this disposable database was already migrated *before* PHPUnit, reset
**only the acceptance Compose project** to start with fresh empty tmpfs data:

```bash
docker compose -f compose.acceptance.yml down
docker compose -f compose.acceptance.yml up -d
```

This removes the two Compose containers and their temporary MySQL contents;
it does **not** erase the host clone, its `.env`, `vendor/`, Vite assets or
any XAMPP database. Do not use `down -v` or run manual `migrate:fresh`.

After PHPUnit succeeds, confirm the HTTP server uses the Compose database:

```bash
curl --max-time 30 -sS -o /dev/null -w 'HTTP %{http_code}\n' http://127.0.0.1:18080/
```

Expect `HTTP 200`. An HTTP 500 with a Laravel log showing `DB_HOST=127.0.0.1`
indicates the child server did not inherit the container's DB environment;
check for `--no-reload` in the Compose command and recreate **only** `app`.
Do not rerun PHPUnit or reset the already-migrated MySQL instance for this.

With the previous steps succeeding, visit <http://127.0.0.1:18080/> in a
browser. The schema exists, but no comprehensive sample catalog is seeded;
the test suite only uses synthetic records. External SMS/OTP providers
are disabled and interactive registration remains **not yet accepted**.

When finished, stop this sandbox with:

```bash
docker compose -f compose.acceptance.yml down
```

Do not run `migrate:fresh` on any host/legacy connection, do not use `--env-file`
pointing at a real environment, and do not import historical database backups.
This is a **disposable development/acceptance sandbox**, not a production
container deployment. Teams adopting this source commercially must configure
and test their own payments, notifications, secured infrastructure and release
workflows. See [integration handoff](../../INTEGRATION_GUIDE.md).
