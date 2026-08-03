# Youth Justice LA WordPress Theme

A custom WordPress theme for Youth Justice LA, built with [Roots Sage](https://roots.io/sage/) and [Laravel Acorn](https://roots.io/acorn/). The theme combines a flexible ACF page builder with a configuration-driven visual system, reusable Blade components, and lightweight Alpine.js interactions.

## Features

### Flexible page builder

Pages using the **Custom Template** receive an ACF Flexible Content editor with these layouts:

- Standard and campaign-specific heroes
- Page headers
- Accordions
- Calls to action and donation sections
- Form/shortcode sections
- Image cards, image grids, and image-with-text sections
- Multi-column and sticky content layouts
- Testimonial sliders
- General WYSIWYG content

Each block shares reusable content and configuration fields. Editors can apply configured color themes, control spacing and media behavior, and see content headlines in collapsed ACF layout labels.

### Site configuration

The WordPress **Configuration** options page controls site-wide content and presentation:

| Tab | Options |
| --- | --- |
| Logo & Fonts | Brand logo, font embed code, and font families for the theme's typography roles |
| Variables | Global CSS variables, named color modes, responsive type sizes, spacing, and breakpoints |
| Header & Footer | Header/footer themes, footer contact content, and supporting links |
| Donate | Global donation button label, URL, and visibility |
| Pop-Up | Homepage pop-up image, WYSIWYG/embed content, CTA, content theme, and enable toggle |
| Socials | Social heading and profile links |

Named color modes are automatically loaded into relevant ACF theme controls, keeping block and global styling consistent.

### Homepage pop-up

The optional homepage pop-up supports:

- A full-image layout
- A stacked image with content, third-party form embed, and/or CTA
- A configurable content color theme
- Responsive viewport scrolling and background scroll locking
- Keyboard focus trapping and Escape-key dismissal
- Close-button and backdrop-click dismissal

When enabled, the pop-up appears on every homepage load. It does not store a cookie or track visit frequency.

### Frontend and navigation

- Responsive desktop and mobile navigation
- Primary, secondary, upper-footer, lower-footer, and language-switcher menu locations
- Theme-aware headers, footers, sections, cards, and buttons
- Alpine.js interactions with focus, anchor, collapse, and masonry plugins
- Animate On Scroll (AOS) transitions
- Responsive WordPress images and SVG support
- Styled Gravity Forms output plus support for arbitrary shortcodes and embed markup
- Editor styles and a generated WordPress `theme.json`
- Translation tooling for PHP, Blade, and JavaScript strings

## Technology

- WordPress 6.6+
- PHP 8.2+
- Roots Sage and Laravel Acorn 5
- Laravel Blade
- Advanced Custom Fields Pro and Log1x ACF Composer
- Tailwind CSS 4
- Vite 6
- Alpine.js 3
- Yarn 1 and Composer

## Installation

From the theme directory:

```bash
composer install
yarn install
yarn build
```

Then activate the theme and ACF Pro in WordPress.

For local HTTPS development, make sure `detectTls` in `vite.config.js` matches the local WordPress hostname. The Vite configuration is ignored by Git so each developer can retain their local hostname.

## Development

Start the Vite development server with hot module replacement:

```bash
yarn dev
```

Create a production build:

```bash
yarn build
```

Vite builds the frontend and editor assets and generates the production `theme.json` under `public/build/`. Generated build files are ignored by Git and should be produced during deployment.

### Translation

Generate the POT file and update existing PO files:

```bash
yarn translate
```

Compile translations for WordPress and JavaScript:

```bash
yarn translate:compile
```

## Editor workflow

1. Create or edit a WordPress page.
2. Select **Custom Template** under the page template settings.
3. Add and arrange layouts in the **Content** flexible-content field.
4. Configure site-wide design tokens and shared content under **Configuration**.
5. Assign the required menus under **Appearance → Menus**.

To configure the homepage pop-up, open **Configuration → Pop-Up**, upload an image, optionally add WYSIWYG/embed content and a CTA, enable the feature, and save the options page. Leaving both content and CTA empty creates the image-only version.

## Project structure

```text
├── app/
│   ├── Fields/             # ACF page-builder layouts and reusable field partials
│   ├── Options/            # Site-wide Configuration options page
│   ├── Providers/          # Theme service providers
│   ├── View/Composers/     # Data supplied to Blade views
│   ├── filters.php         # WordPress and ACF filters
│   └── setup.php           # Theme support, menus, sidebars, and editor assets
├── config/                 # Acorn and package configuration
├── resources/
│   ├── css/                # Frontend, editor, and form styles
│   ├── js/                 # Alpine, AOS, and editor entry points
│   ├── images/             # Source theme images
│   └── views/
│       ├── blocks/         # Flexible-content layout templates
│       ├── components/     # Reusable Blade UI components
│       ├── layouts/        # Base document layouts
│       ├── partials/       # Shared partial templates
│       └── sections/       # Header, footer, and other major sections
├── public/                 # Generated Vite assets
├── theme.json              # Source WordPress theme configuration
├── composer.json           # PHP dependencies
└── package.json            # Frontend dependencies and scripts
```

## Credits

Built by [Howler Studio](https://howler.studio/) using [Roots Sage](https://roots.io/sage/).
