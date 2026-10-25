# Security Policy

## Support status

This repository contains a modernized **portfolio marketplace**, not a supported production service. The active modernization candidate targets PHP 8.4, Laravel 13 and Livewire 4. The original Laravel 9 baseline was unsupported and vulnerable; this migration does not by itself certify application security.

The independent [dependency security audit](.github/workflows/security-audit.yml) checks the complete locked Composer and npm dependency graphs, including development dependencies. It fails normally on advisories: no `continue-on-error`, blanket ignore or audit suppression has been introduced. The historical four Composer advisory exceptions were removed during modernization.

The last verified dependency audit passed, but new advisories can appear at any time and should be checked on the final commit. Deprecation notices for some older UI/runtime packages are not the same as a passing security audit or a production safety assessment.

The automated acceptance suite tests fresh installation on six disposable MySQL databases and 62 Feature cases. It is not an independent penetration test and does not validate a real payment gateway. Open issues include anonymous cart identity based on IP addresses, stored price/stock revalidation, gift credit consumed before payment success, replay/concurrent payment callbacks, broad seller/admin permissions, file manager access and an unverified browser/UX journey. See [MODERNIZATION.md](MODERNIZATION.md) and [ACCEPTANCE_TESTING.md](ACCEPTANCE_TESTING.md).

## Current repository rules

The current branch must not contain:

- real `.env` files or API credentials
- payment merchant secrets or hard-coded gateway credentials
- SMS, mail, cloud, or database passwords
- production-derived database exports
- personal data such as names, phone numbers, postal addresses, or customer records
- runtime logs containing request or user information

Database dumps are ignored. The owner rewrote both branches on 2026-10-25 to remove historical SQL backups and Google API key patterns. Old PR references, cached objects and other clones may still retain earlier material; the owner has opened a GitHub Support request, but server-side removal is not confirmed. See SECURITY_REMEDIATION.md.

## Payment safety

The example environment defaults to the local/demo payment driver. A gateway callback must be verified with the configured payment provider before an order is marked paid. Payment replay/idempotency and gift-credit sequencing are not fully accepted. Real gateway deployment requires current provider credentials, HTTPS callbacks, and validation against the provider's current API documentation. Do not use live credentials in public CI.

## Reporting a vulnerability

Do not include credentials, personal data, or exploit payloads containing sensitive information in a public issue. Use GitHub's private vulnerability reporting/security advisory flow when available. If a public issue is necessary, provide only a non-sensitive summary and request a private follow-up channel.

## Credential response

If a real credential is ever committed, removing it from the current branch is not sufficient. Revoke or rotate the credential at the provider first, then replace it with an environment-variable reference.

## Archive limitations

The owner authorized preservation of the source and existing UI assets and the attempt to modernize dependencies. GitHub archival is not a security clearance, a production-readiness claim, credential revocation or independent third-party rights verification. GitHub Support cleanup of old refs/caches remains pending. The owner reports cancelling Google Cloud, but invalidation of historical API keys has not been independently confirmed. Do not publish sensitive review evidence in issues or pull requests.
