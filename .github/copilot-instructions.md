## Purpose
Short, actionable guidance to help AI coding agents be productive in this Sage-based WordPress theme.

## Big picture (what this repo is)
- Roots Sage theme scaffold using Laravel Blade for templating, Tailwind CSS for styling, Vite for assets, and Acorn to provide a Laravel-style container in WordPress.
- Key runtime pieces: PHP (>=8.2) code in `app/`, Blade templates in `resources/views/`, and frontend assets under `resources/js` and `resources/css`. Built assets are emitted to `public/build`.

## Where to look (high-value files)
- `functions.php` — bootstraps Composer autoload and Acorn, loads `app/setup.php` & `app/filters.php`.
- `app/setup.php` — theme setup, menus, block-editor integration, and examples of using `Vite` helper.
- `app/Providers/ThemeServiceProvider.php` — central place for registering providers.
- `resources/js/app.js` and `resources/css/app.css` — frontend entry points listed in `vite.config.js`.
- `vite.config.js` — Vite inputs, plugins (wordpressThemeJson, laravel plugin), alias map and `detectTls` (set to `youthjustice.test` in this tree).
- `package.json` / `composer.json` — exact Node and PHP requirements and dev/build scripts.
- `public/build/manifest.json` and `public/build/assets/` — generated assets; `theme.json` is generated to `public/build/assets/theme.json` and used by `app/setup.php`.

## How to run and common dev flows
- Install PHP deps: `composer install` (if missing, `functions.php` will halts with a helpful message).
- Install JS deps: project uses Yarn v1 (see `package.json.packageManager`); `yarn install` or `npm install` will work.
- Start dev server (Vite HMR):
  ```bash
  yarn dev
  # or
  npm run dev
  ```
- Build production assets:
  ```bash
  yarn build
  # or
  npm run build
  ```
- PHP / Acorn utilities: use the shipped binary in vendor, e.g. `./vendor/bin/acorn` for Acorn/Artisan-like commands and `./vendor/bin/pint` for formatting if installed.

Notes: Node engine declared `>=20.0.0` and `package.json` is `type: module` — prefer Yarn per `packageManager` but npm works for scripts.

## Asset & template conventions (examples)
- PHP uses the Vite helper to reference built assets. Example from `app/setup.php`:
  ```php
  $style = Vite::asset('resources/css/editor.css');
  echo Vite::withEntryPoints(['resources/js/editor.js'])->toHtml();
  ```
- Vite config sets `base: '/app/themes/sage/public/build/'` and aliases like `@scripts -> /resources/js`. Use these aliases in JS imports.
- Theme JSON: `wordpressThemeJson` plugin generates `public/build/assets/theme.json`; `app/setup.php` overrides `theme_file_path` to point to it. When modifying Tailwind config or theme.json, expect the generated theme.json to change.

## Project-specific patterns and gotchas
- TLS / local domain: `vite.config.js` sets `detectTls: 'youthjustice.test'`. Local dev host / TLS mismatch is a common source of HMR issues — match your /etc/hosts or adjust `detectTls`.
- ACF fields and options: repository includes `app/Fields/` and `app/Options/` (uses `log1x/acf-composer`). Add field definitions there rather than sprinkling raw ACF code.
- Blade components: templates use components and `@includeFirst(['partials.content-' . get_post_type(), 'partials.content'])` patterns — follow `partials.*` naming and component-first resolution.
- Generated dependency files: editor integration expects `editor.deps.json` and other Vite-generated JSON files present in `public/build`. If editor assets aren't loading, verify the build output contains those files.

## Integrations and external dependencies
- Composer packages to know: `roots/acorn` (Acorn/Laravel container), `log1x/acf-composer`, `log1x/navi`, `log1x/poet`, `mallardduck/blade-lucide-icons`, `owenvoke/blade-fontawesome` — these drive ACF field registration, navigation helpers, block/poet features, and icon rendering.
- NPM packages: Vite, Tailwind, Alpine and several Alpine plugins; `@roots/vite-plugin` and `laravel-vite-plugin` are used to wire PHP <> Vite behavior.

## Quick troubleshooting checklist
- "Error locating autoloader" in `functions.php`: run `composer install`.
- HMR/asset 404s: run `yarn dev` and confirm `vite` output shows no TLS/host errors. Inspect `vite.config.js.detectTls` and `base`.
- Blade rendering errors: check `resources/views` partial names and `app/setup.php` registrations.

## Where to make small changes
- Frontend: edit `resources/js` or `resources/css` and update `vite.config.js` inputs if you add entries.
- PHP: add service providers or bindings in `app/Providers` and small helpers in `app/` files.

---
If anything in this file is unclear or you want additional examples (specific routes, a deeper dive into `app/Fields` or how icons are wired), tell me which area to expand and I will update the file.
