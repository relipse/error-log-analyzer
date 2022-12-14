# error-log-analyzer
```
$ php elanalyze.php --datafile data/php.error.log
Errors and Times They Occur
PHP Warning:  count(): Parameter must be an array or an object that implements Countable in /home/foobar/public_html/wp-content/plugins/wpcom-tools/mapping.php on line 177: 1
PHP Warning:  count(): Parameter must be an array or an object that implements Countable in /home/foobar/public_html/api/procurement-reporting/index.php on line 79: 3
PHP Warning:  Invalid argument supplied for foreach() in /home/foobar/public_html/wp-content/themes/foobar/includes/components/mapbounds.php on line 20: 3
PHP Warning:  count(): Parameter must be an array or an object that implements Countable in /home/foobar/public_html/wp-content/plugins/wpcom-tools/mapping.php on line 253: 89
PHP Warning:  array_keys() expects parameter 1 to be array, null given in /home/foobar/public_html/wp-content/themes/foobar/includes/components/stop-routes.php on line 161: 252
PHP Warning:  Invalid argument supplied for foreach() in /home/foobar/public_html/wp-content/themes/foobar/includes/components/stop-routes.php on line 164: 252
PHP Warning:  call_user_func_array() expects parameter 1 to be a valid callback, function '_return_false' not found or invalid function name in /home/foobar/public_html/wp-includes/class-wp-hook.php on line 307: 426

Files and Num Errors occurred
/home/foobar/public_html/api/procurement-reporting/index.php: 3
/home/foobar/public_html/wp-content/themes/foobar/includes/components/mapbounds.php: 3
/home/foobar/public_html/wp-content/plugins/wpcom-tools/mapping.php: 90
/home/foobar/public_html/wp-includes/class-wp-hook.php: 426
/home/foobar/public_html/wp-content/themes/foobar/includes/components/stop-routes.php: 504
```
