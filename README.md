# Youth Justice LA Theme

Custom WordPress theme for Youth Justice LA, built on the Sage framework by [Roots](https://roots.io/sage/).

## Tech Stack

- 🔧 **Laravel Blade** - Clean, efficient theme templating
- ⚡️ **Vite** - Modern front-end development workflow with instant HMR
- 🎨 **Tailwind CSS v4** - Utility-first CSS framework
- 🚀 **Laravel Acorn** - Harness the power of Laravel in WordPress
- 🧩 **Alpine.js** - Lightweight JavaScript framework for interactivity
- 📦 **Advanced Custom Fields (ACF)** - Flexible content management

## Key Features

- Dynamic color theme system with configurable color modes
- Custom Blade components for reusable UI elements
- ACF-powered flexible content blocks
- Responsive header with mobile navigation
- Custom font configuration system
- AOS (Animate On Scroll) integration
- Masonry layout support

## Requirements

- PHP >= 8.2
- WordPress >= 6.6
- Node.js >= 20.0.0
- Composer

## Development

### Installation

```bash
# Install PHP dependencies
composer install

# Install JavaScript dependencies
yarn install
```

### Development Workflow

```bash
# Start development server with hot reload
yarn dev

# Build for production
yarn build
```

### Translation

```bash
# Generate POT file and update PO files
yarn translate

# Compile MO and JSON files
yarn translate:compile
```

## Project Structure

```
├── app/                    # Theme PHP logic
│   ├── filters.php        # WordPress filters and ACF field loaders
│   └── setup.php          # Theme setup and configuration
├── resources/
│   ├── views/             # Blade templates
│   │   ├── components/    # Reusable Blade components
│   │   ├── partials/      # Partial templates
│   │   └── sections/      # Major section templates
│   ├── scripts/           # JavaScript files
│   └── styles/            # Stylesheets
└── public/                # Compiled assets (generated)
```

## Custom Features

### Color Theme System
The theme includes a dynamic color theming system powered by ACF options that allows editors to:
- Define custom color modes (White, Blue, Gold, Black, Purple, etc.)
- Apply themes to sections and components
- Configure CSS custom properties for consistent theming

### ACF Integration
Custom ACF field loaders populate select fields with available color themes from the options page, ensuring consistency across the site.

## Credits

Built by [Howler Studio](https://howler.studio/) using the [Sage](https://roots.io/sage/) WordPress starter theme.
