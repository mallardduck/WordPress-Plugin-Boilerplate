# WordPress Plugin Boilerplate

A standardized, organized, object-oriented, namespaced, autoloading foundation for building high-quality WordPress Plugins.

## Contents

The WordPress Plugin Boilerplate includes the following files:

* `.gitignore`. Used to exclude certain files from the repository.
* `CHANGELOG.md`. The list of changes to the core project.
* `README.md`. The file that you’re currently reading.
* A `wp-plugin-bp` directory that contains the source code - a fully executable WordPress plugin.

### Base Plugin Layout

The base structure of the plugins root folder:

* `wp-plugin-bp/lib` is where functionality shared between the admin area and the public-facing parts of the site reside
* `wp-plugin-bp/admin` is for all admin-specific functionality
* `wp-plugin-bp/front` is for all public-facing functionality
* `wp-plugin-bp/includes` is where the autoloader lives
* `wp-plugin-bp/languages` is where translation files are stored

## Features

* The Boilerplate is based on the [Plugin API](http://codex.wordpress.org/Plugin_API), [Coding Standards](http://codex.wordpress.org/WordPress_Coding_Standards), and [Documentation Standards](https://make.wordpress.org/core/handbook/best-practices/inline-documentation-standards/php/); though it may deviate in subtle ways when the situation calls for it.
* All classes, functions, and variables are documented so that you know what you need to be changed.
* The Boilerplate uses a strict file organization scheme that correspond both to the WordPress Plugin Repository structure, and that make it easy to organize the files that compose the plugin.
* The project includes a `.pot` file as a starting point for internationalization.

## Installation

The Boilerplate can be installed directly into your plugins folder "as-is". You will want to rename it and the classes inside of it to fit your needs.

Note that this will activate the source code of the Boilerplate, but because the Boilerplate has no real functionality not much will be added when activated. That's what you next adventure is, now go forth and build!

### Getting Started - Updating the boilerplate variables

First things first, download the reposityr and rename the `wp-plugin-bp` folder to one matching the name of the plugin you're creating. Something like `'my-awesome-plugin'` would match the plugin called `My Awesome Plugin`. Then proceed by following the seven-stop process that follows:

1. Search for `'wp-plugin-bp'` and replace with `'my-awesome-plugin'`
2. Search for `'Wp_Plugin_Bp'` and replace with `'My_Awesome_Plugin'`
3. Search for `'wp_plugin_bp'` and replace with `'my_awesome_plugin'`
4. Search for `'WordPress Plugin Boilerplate'` and replace with `'My Awesome Plugin'`
5. Search for `'Your Name or Your Company'` and replace with `'Awesome Guy'`
6. Search for `'Your Name <email@example.tld>'` and replace with `'Awesome Guy <guy@awesome.tld>'`
7. Search for `'http://example.tld/'` and replace with `'http://awesome.tld/'`
8. Finally, open your main plugin file and update the `Plugin URI` field to match the specific URL for the plugin.

Then, you can finally begin updating the various plugin files with your code to create your plugin!

Obviously you'll want to track your plugin in revision control like Git of SVN. The best way to handle this is by initializing your plugin repository in the base plugin folder after you rename it. You can choose to do this initially when you start (before step one), or after you have completed the setup steps above.

## WordPress.org Preparation

Coming Soon

## Recommended Tools

### i18n Tools

The WordPress Plugin Boilerplate uses a variable to store the text domain used when internationalizing strings throughout the Boilerplate. To take advantage of this method, there are tools that are recommended for providing correct, translatable files:

* [Loco Translate](https://wordpress.org/plugins/loco-translate/)
* [Poedit](http://www.poedit.net/)
* [makepot](http://i18n.svn.wordpress.org/tools/trunk/)
* [i18n](https://github.com/grappler/i18n)

Any of the above tools should provide you with the proper tooling to internationalize the plugin.

### Git Deploy Workflow

By default, officially published WordPress plugins are tracked in the WordPress SVN repository. If you are choosing Git for managing your code revisions then you'll need a solution to keep SVN in sync.

One of the best solutions out there is the wp-deploy script. Using this repository you can set up your plugin in a way that allows easy syncing and deploying form GitHub to the official WordPress SVN after your plugin is accepted.

You can find the `wp-deploy` repository here on GitHub [kasparsd/wp-deploy](https://github.com/kasparsd/wp-deploy). When you've reached this pint the best way to 'convert' to this setup is as follows:

1. Start in the directory above your plugins root. Rename the plugin folder name to `git`.
2. Make a new folder with the same name as your plugin folder's original name.
3. Move the newly named `git` folder into the folder created in Step 2.
4. Clone the `kaspard/wp-deploy` repository into a folder called `wp-deploy` inside the same folder where the `git` folder exists.
5. Make an empty `svn` folder in the same folder as above.
6. Verify your folder structure matches that descrived in the `wp-deploy` readme file.
7. Finally, initialize the Git Submoldules via commandline. First, enter the wp-deploy in CLI and then run `git submodule init`.

As long as you've recieved the confirmation email that your plugin was approved and the SVN is setup you should be able to run the wp-deploy scripts and deploy your plugin to the SVN from your Git repo seamlessly. It even includes a very useful script to push tags to SVN which control the plugin versions published on WordPress.org!

#### WordPress Required readme.txt
Another beneifit of using `wp-deploy` is that the script can automatically generate the required `readme.txt` from a `readme.md` file. This means can change your plugins `readme.txt` file to a `readme.md` for better GitHub experience.

When deployig to SVN via the wp-deploy `deploy.sh` script the MarkDown syntax will be converted to the required WordPress syntax and renamed to `readme.txt`.

Tag Conversion Examples:

```
Main Headings (Plugin Name):
# This Main Heading

Convert to:
=== This Main Heading ===

Secondary Headings (Description, Installation, Changelog, etc):
## This Secondary Heading

Convert to:
== This Secondary Heading ==

Sub Headings (Versions in Changelog, Single Question from FAQ section, etc):
# This Sub Heading

Convert to:
= This Sub Heading =
```

## License

The WordPress Plugin Boilerplate is licensed under the GPL v2 or later.

> This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License, version 2, as published by the Free Software Foundation.

> This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

> You should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA

A copy of the license is included in the root of the plugin’s directory. The file is named `LICENSE`.

## Important Notes

### Licensing

The WordPress Plugin Boilerplate is licensed under the GPL v2 or later; however, if you opt to use third-party code that is not compatible with v2, then you may need to switch to using code that is GPL v3 compatible.

For reference, [here's a discussion](http://make.wordpress.org/themes/2013/03/04/licensing-note-apache-and-gpl/) that covers the Apache 2.0 License used by [Bootstrap](http://twitter.github.io/bootstrap/).

### Includes

Note that if you include your own classes, or third-party libraries, there are three locations in which said files may go:

* `plugin-name/lib` is where functionality shared between the admin area and the public-facing parts of the site reside
* `plugin-name/admin` is for all admin-specific functionality
* `plugin-name/front` is for all public-facing functionality

Note that previous versions of the Boilerplate did not include `Wp_Plugin_Bp_Loader` but this class is used to register all filters and actions with WordPress.

The example code provided shows how to register your hooks with the Loader class.

### What About Other Features?

Tools like Grunt, Composer, etc, are all fantastic tools, but not everyone uses them. In order to  keep the core Boilerplate as light as possible, these features have been removed and will be introduced in other editions, and will be listed and maintained on the project homepage.

# Credits

This WordPress Plugin Boilerplace adaption has been created by [Dan Pock](https://github.com/mallardduck) to include Namespaces and Autoloading into a what is an already excellent boilerplate.

The WordPress compatible autoloader included was created in 2017 by [Tom McFarlin](http://twitter.com/tommcfarlin/) for a presentation at WordCamp Atlanta 2017.

The original WordPress Plugin Boilerplate, which this is forked from, was started in 2011 by [Tom McFarlin](http://twitter.com/tommcfarlin/) and has since included a number of great contributions.

In March of 2015 the project was handed over by Tom to Devin Vinson. This version of the Boilerplate was developed in conjunction with [Josh Eaton](https://twitter.com/jjeaton), [Ulrich Pogson](https://twitter.com/grapplerulrich), and [Brad Vincent](https://twitter.com/themergency).
