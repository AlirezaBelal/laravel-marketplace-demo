# Security Policy

## Support status

This repository preserves a completed **legacy Laravel marketplace project**, not a supported production service.

The application currently targets Laravel 9. Laravel 9's official security-fix window ended on **February 6, 2024**. Before using this code in a deployed environment, upgrade Laravel and the surrounding dependency stack to supported versions and perform a fresh security review.

The locked dependency graph is intentionally kept on **stable releases**. The dedicated Dependency security audit (legacy) workflow runs a full Composer audit and allows only the following Laravel 9 advisories because no supported fix exists on the Laravel 9 release line:

- `PKSA-m5cs-t1y6-qpcs`
- `PKSA-3r5d-mb8f-1qw9`
- `PKSA-mdq4-51ck-6kdq`
- `PKSA-8qx3-n5y5-vvnd`

These exceptions document framework end-of-life debt; they are not claims that the issues are safe for production. Any additional PHP advisory still fails the independent security-audit workflow.

A fresh locked audit on 2026-10-24 reports six additional, non-ignored advisories across laravel/framework (2), league/commonmark (2), symfony/http-foundation (1) and symfony/yaml (1). One Laravel advisory is classified critical by the advisory feed. The complete npm dependency graph reports 69 findings. These are dependency findings, not application exploit verification. Existing exceptions have not been expanded; the previous green CI does not establish current dependency safety.

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

The example environment defaults to the local/demo payment driver. A gateway callback must be verified with the configured payment provider before an order is marked paid. Real gateway deployment requires current provider credentials, HTTPS callbacks, and validation against the provider's current API documentation.

## Reporting a vulnerability

Do not include credentials, personal data, or exploit payloads containing sensitive information in a public issue. Use GitHub's private vulnerability reporting/security advisory flow when available. If a public issue is necessary, provide only a non-sensitive summary and request a private follow-up channel.

## Credential response

If a real credential is ever committed, removing it from the current branch is not sufficient. Revoke or rotate the credential at the provider first, then replace it with an environment-variable reference.

## Archive limitations

The owner authorized retention of the legacy source with known dependency audit failures visible and approved retention of the existing UI assets. Archival is not a security clearance, credential revocation or independent third-party rights verification. GitHub Support cleanup of old refs/caches remains pending. The owner reports cancelling Google Cloud, but invalidation of the historical API keys has not been independently confirmed. Do not publish sensitive review evidence in issues or pull requests.
