# Sensitive-data remediation

On 2026-10-25, the owner used git-filter-repo to remove historical SQL backups under DOC/backup_V02 through DOC/backup_V06 and replace Google API key patterns on both public branches. The owner reported verifying the sanitized history and an independent restored clone. Finalization confirmed that the documentation branch descends directly from sanitized master.

## Pending external actions

- The owner submitted a private GitHub Support request to assess removal of affected historical PR references and cached objects. The rewrite report lists 11 PR head refs and one PR merge ref; server-side purging is not confirmed.
- The owner reports cancelling Google Cloud. It is not independently verified that all historically exposed API keys were revoked or rendered unusable. Source removal and service cancellation alone are not evidence of credential revocation.
- Existing clones must not merge or push pre-cleanup history back into this repository. Reclone the sanitized repository when needed.

Use migrations and synthetic records for isolated local inspection. Never post raw database records, key values or other sensitive evidence in public issues or pull requests. Native archival does not erase historical objects, revoke credentials or resolve dependency vulnerabilities.

## Obligations for commercial adopters

Obtain new provider credentials under your own accounts and keep them outside
Git. Verify revocation of any potentially exposed historical values before
integrating third-party services. Never import old database dumps or
reintroduce pre-sanitization Git history. This historical disclosure response
is independent of software functionality, provider testing and go-live
approval; source reuse does not imply all historical references were purged.
