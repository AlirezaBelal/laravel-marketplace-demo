# Security Policy

## Support status

This repository is a **legacy educational project**, not a supported production service.

The application currently targets Laravel 9. Laravel 9's official security-fix window ended on **February 6, 2024**. Before using this code in a deployed environment, upgrade Laravel and the surrounding dependency stack to supported versions and perform a fresh security review.

## Current repository rules

The current branch must not contain:

- real `.env` files or API credentials
- payment merchant secrets or hard-coded gateway credentials
- SMS, mail, cloud, or database passwords
- production-derived database exports
- personal data such as names, phone numbers, postal addresses, or customer records
- runtime logs containing request or user information

Database dumps are ignored and the legacy `DOC/backup_V06` exports have been removed from the current branch. Historical Git commits may still contain older repository content and should not be treated as a sanitized data source.

## Payment safety

The example environment defaults to the local/demo payment driver. A gateway callback must be verified with the configured payment provider before an order is marked paid. Real gateway deployment requires current provider credentials, HTTPS callbacks, and validation against the provider's current API documentation.

## Reporting a vulnerability

Do not include credentials, personal data, or exploit payloads containing sensitive information in a public issue. Use GitHub's private vulnerability reporting/security advisory flow when available. If a public issue is necessary, provide only a non-sensitive summary and request a private follow-up channel.

## Credential response

If a real credential is ever committed, removing it from the current branch is not sufficient. Revoke or rotate the credential at the provider first, then replace it with an environment-variable reference.
