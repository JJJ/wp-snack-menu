# WP Snack Menu

Put the WordPress admin menu in your admin toolbar.

WP Snack Menu comes with a few filters to let you customize the menu if needed.

# Installation

* Download and install using the built in WordPress plugin installer.
* Activate in the "Plugins" area of your admin by clicking the "Activate" link.
* No further setup or configuration is necessary.

# FAQ

### Does this create new database tables?

No. It creates a new `wp_termmeta` database table for each site it's activated on.

### Does this modify existing database tables?

No. All of WordPress's core database tables remain untouched.

### Does this work with other plugins and themes?

Maybe. This depends on how those plugins and themes were designed to work. Many plugins use `is_admin()` checks to make sure their code only executes within the dashboard, which means their menus will not appear when visiting the front-end of your site.

### Where can I get support?

The WordPress support forums: https://wordpress.org/tags/wp-snack-menu/

### Can I contribute?

Yes, please! Having an easy-to-use API and powerful set of functions is critical to managing complex WordPress installations. If this is your thing, please help us out!
