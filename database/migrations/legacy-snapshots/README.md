# Inactive historical migration snapshots

The original repository carried 180 migration files. Of those, 68 later files
redeclared classes already present in earlier migrations and attempted to
create the same tables. With all 180 files active, a fresh migration fails
before any application table is created (`Cannot redeclare class
CreateCategoriesTable`).

For the modernization candidate, each **earlier** migration remains active
and the corresponding **later** duplicate has been moved here unchanged.
Laravel's default migrator scans `database/migrations/*_*.php`, so these files
are retained for audit and historical comparison but are not automatically
run. Do not add this directory to the migrator's configured paths.

The earlier definitions are particularly important for the `anbar` field on
`product_sellers` and the `system` field on `notifications`, which current
application code uses but the later snapshot definitions omit.

This normalization is intended for an **empty disposable database** and is
verified through `.github/workflows/database-compatibility.yml`. It does not
prove an upgrade path for an existing database. Before upgrading any
preexisting deployment, compare its actual schema and `migrations` tracking
table with these definitions, and design a non-destructive migration plan.

Never import an old SQL dump or real customer data into public CI.
