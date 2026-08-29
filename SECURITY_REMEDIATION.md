# Security remediation

The legacy database export directory (`DOC/backup_V06`) was removed from the current branch because it contained row-level data that is not appropriate for a public source repository.

The application should be initialized from Laravel migrations/seeders or explicitly sanitized demo fixtures instead of database dumps copied from a development environment.

Historical Git objects are intentionally not rewritten as part of this repository cleanup. If any value from a historical dump represented a live credential, rotate that credential separately.
