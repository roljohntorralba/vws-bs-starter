# VWS Bootstrap Starter

A WordPress starter theme that is set up to work with the latest version of Bootstrap.

*This theme is not intended for non-developers, but it should be easy to set up.*

## Theme Setup

1. Install `npm` on your machine if it's not already installed.
2. In the theme's root, run `npm install` to install everything (including Bootstrap).
3. Run `npm start` to run file watcher and start editing.
4. Run `npm run build` to process files for produciton.

Running `npm run buld` will create a `dist` folder on the root. The `dist` folder will contain all the asset files inside their own folders. 

### What does `npm start` do?

It watches for `scss` and `js` files and automatically compiles them to the `dist` folder.

If you're pushing assets to production, be sure to run `npm run build` before copying the assets in `dist` since `npm start` doesn't compress the assets.

### What does `npm run build` do?

It compiles and compresses all the assets found in `/js` `/scss` and `/img` to the `/dist` folder.

### Website-Specific Setup

WordPress block editor is disabled by default. You can re-enable it by deleting the code blocks inside `/inc/optimization.php`.

## For Non-Developers

Once you run `npm install` do not upload `node_modules` to your website.

## Credits

* Based on Underscores https://underscores.me/, (C) 2012-2020 Automattic, Inc., [GPLv2 or later](https://www.gnu.org/licenses/gpl-2.0.html)
* normalize.css https://necolas.github.io/normalize.css/, (C) 2012-2018 Nicolas Gallagher and Jonathan Neal, [MIT](https://opensource.org/licenses/MIT)
* Bootstrap https://getbootstrap.com/ (C) 2021-2023 The Bootstrap Authors, [MIT](https://opensource.org/licenses/MIT)
* Bootstrap 5 Navbar Walker https://github.com/AlexWebLab/bootstrap-5-wordpress-navbar-walker (C) 2021 AlexWebLab, [MIT](https://opensource.org/licenses/MIT)

- Requires at least: 4.5
- Tested up to: 5.4
- Requires PHP: 7.4
- Stable tag: 1.0.0
- License: GNU General Public License v2 or later
- License URI: LICENSE
