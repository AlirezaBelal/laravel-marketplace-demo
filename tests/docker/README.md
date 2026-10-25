# Disposable local acceptance sandbox

Use **only in a fresh clone** of the modernization branch, with synthetic
records. Requires Docker Desktop in Linux mode and previously built frontend
assets (`npm ci`, `npm run build`). Nothing in this configuration uses a host
database, imports historical dumps, or exposes the MySQL port to Windows.
The single web port is bound to `127.0.0.1:18080`. Never use real service keys.

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

Then initialize the *new disposable* MySQL databases and run the feature suite:

```bash
docker compose -f compose.acceptance.yml exec -T app php artisan migrate --force
docker compose -f compose.acceptance.yml exec -T app vendor/bin/phpunit --testsuite Feature
```

With the previous steps succeeding, visit <http://127.0.0.1:18080/> in a
browser. The schema is empty until synthetic records are added; the test suite
does not create a comprehensive sample catalog. External SMS/OTP providers
are disabled and interactive registration remains **not yet accepted**.

When finished, stop this sandbox with:

```bash
docker compose -f compose.acceptance.yml down
```

Do not run `migrate:fresh` on any host/legacy connection, do not use `--env-file`
pointing at a real environment, and do not import historical database backups.
This sandbox has not been independently certified as production-ready.
