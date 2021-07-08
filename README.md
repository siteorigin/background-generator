# Background Generator

Background image generator web app.

# PHP Coding Standards

You should follow code style [PSR-1](http://www.php-fig.org/psr/psr-1/), [PSR-2](http://www.php-fig.org/psr/psr-2/) and [PSR-12](https://www.php-fig.org/psr/psr-12/).

## PHP-CS-Fixer

PHP-CS-Fixer is a tool to automatically fix PHP Coding Standards issues

To enable automatic formatting, follow the instructions on [the PHP-CS-Fixer page](https://github.com/FriendsOfPHP/PHP-CS-Fixer#editor-integration).

For enable inspection in PhpStorm IDE go to `Preferences -> Editor > Inspections > PHP > Quality tools > PHP CS Fixer Validation -> Custom ruleset` and click on the three dots and set the path to the `.php-cs-fixer.php` file.

Run PHP-CS-Fixer to analyze your codebase

```bash
./vendor/bin/php-cs-fixer --allow-risky=yes
```
