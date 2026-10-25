# Modernization workstream (not yet merged)

**Baseline:** Laravel 9.52.22, Livewire 2.12.8, Laravel Mix 6.0.49, Tailwind 2.2.19. Current main-branch CI passes but the independent security workflow fails on 6 non-ignored Composer advisories and 69 full-graph npm vulnerabilities (snapshot: 2026-10-25). This branch is for controlled modernization; it is **not** a production-ready release.

## Target and constraints

- Aim for a maintained framework (Laravel 13 and PHP >=8.3), Livewire 4 through an intermediate Livewire 3 review, and Vite to replace the unsupported Mix toolchain. Version compatibility must be solved and tested; these targets are not claims of current compatibility.
- Never bulk-force dependency resolution, silently ignore security advisories, remove the audits, or weaken authentication/payment verification.
- Preserve marketplace routes and all customer, seller and admin flows. Do not import historical SQL exports or production data. Use generated synthetic fixtures only.
- Keep current `master` and its legacy source intact until modernization passes CI and focused integration tests.

## Gates

1. **Baseline compatibility** (this branch): check PHP 8.3 locked install/boot/tests and Node 22 locked install/build. Record failures before changing constraints.
2. **Composer dependency solver**: review all direct constraints and incompatible plugins; upgrade Laravel sequentially (9→10→11→12→13), updating Livewire and Jetstream at tested milestones, lockfiles reproducibly with `composer update --with-all-dependencies`. Every milestone must pass Composer validation, clean install, Laravel boot, route discovery, tests and full locked security audit. Do not commit an unresolvable composer.json or a fabricated lockfile.
3. **Application compatibility**: update config, auth/session, Livewire directives, model binding, event dispatch, Alpine inclusion, file uploads, localization, and payment callback integration with tests for authorization, order totals, idempotency and provider verification.
4. **Frontend migration**: replace Mix with Vite, migrate Tailwind/tooling only with working Blade asset references. Reproduce `npm ci` and production build on maintained Node; full `npm audit --audit-level=high` must pass without ignore rules, and browser smoke must confirm customer/seller/admin assets.
5. **Release decision**: verify safety contract, PHP lint, Laravel boot/routes, tests, frontend build, both full security audits and representative end-to-end user flows before merging. Existing one-assertion unit test is not meaningful functional coverage.

## Existing security remediation

History has been sanitized. Do not reintroduce old SQL dumps, API keys, PR refs or pre-rewrite commits. GitHub Support ticket #4902394 remains pending regarding historical PR refs and cached objects. Owner reports cancelling Google Cloud; credential revocation is not independently verified.

See the official Laravel 13, Livewire 3→4, and Vite migration guides before applying breaking changes.
