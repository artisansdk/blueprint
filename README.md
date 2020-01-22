# API Blueprint Docs

A render for API Blueprints compatible with Laravel.

## Table of Contents

- [Installation](#installation)
- [Usage Guide](#usage-guide)
    - [Blueprint Development](#blueprint-development)
- [Licensing](#licensing)

# Installation

Blueprint can be installed as a standalone application, capable of developing
locally and serving the static assets:

```bash
composer create-project artisansdk/blueprint
```

The Blueprint package installs into a PHP application like any other PHP package:

```bash
composer require artisansdk/blueprint
```

# Usage Guide

If setup as a standalone application the following commands are available:

```bash
bin/blueprint export [--format=html]
bin/blueprint serve [--host=127.0.0.1] [--port=8000] [--tries=10]
```

If installed into a Laravel project the following commands are registered:

```bash
php artisan blueprint:export [--format=html]
php artisan blueprint:serve [--host=127.0.0.1] [--port=8000] [--tries=10]
```

Additionally there are Composer scripts that wrap these commands:

```bash
composer export
composer serve
composer watch
```

> **Note**: The `composer watch` script relies upon
[`watchman-make`](https://facebook.github.io/watchman/docs/install.html)
in order to watch the Blade and config file changes and then automatically
re-export the API Blueprint as HTML.

## Blueprint Development

Typically during development of the API Blueprint, developers will be tweaking
the contents of the API Blueprint itself but will also make changes to the Blade
templates and corresponding stylesheets. Open 3 separate terminals and run each
of the following to watch for asset changes and template changes and to host a
development PHP server:

```bash
yarn watch
composer watch
composer serve
```

# Licensing

Copyright (c) 2018-2020 [Artisans Collaborative](https://artisanscollaborative.com)

This package is released under the MIT license. Please see the LICENSE file
distributed with every copy of the code for commercial licensing terms.
