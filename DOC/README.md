# Database and data-source boundary

Raw development or historical database exports are intentionally **not**
tracked in this public commercial-use source repository.

Use Laravel migrations and synthetic fixtures for an isolated evaluation.
When adopting this source for a real deployment, design and verify a
non-destructive migration plan for **your own** database, including data
backup/restore, schema reconciliation across six connections, rehearsal and
rollback. Never import previous developers' SQL dumps or customer data.

See [commercial integration handoff](../INTEGRATION_GUIDE.md) and
[acceptance checklist](../ACCEPTANCE_TESTING.md).
