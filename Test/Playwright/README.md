# Playwright functional tests

Before you run these tests, make sure to configure the account credentials first, using the following environment variables:

- `MULTISAFEPAY_TEST_API_KEY`: API key of your MultiSafepay test account

If a required environment variable is missing or empty, the tests are skipped with a message listing the missing variables. The list of required variables is defined in `config/config.ts` (`requiredEnv`) and checked with `requireEnv()` from `helpers/env.ts`.
