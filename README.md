LaravelODBC============Adds an ODBC driver to Laravel 4, usable with Fluent and Eloquent.Installation============Add `jtgrimes\laravelodbc` as a requirement to composer.json:```javascript{    "require": {        "jtgrimes/laravelodbc": "0.1.*"    }}```Update your packages with `composer update` or install with `composer install`.Once Composer has installed or updated your packages you need to register LaravelODBC and the package it uses (extradb) with Laravel itself. Open up `app/config/app.php` and find the providers key towards the bottom.Replace ```php'Illuminate\Database\DatabaseServiceProvider'``` with ```php'jtgrimes\Extradb\DatabaseServiceProvider'```  Add the following to the list of providers:```php'jtgrimes\Laravelodbc\ODBCServiceProvider'```You won't need to add anything to the aliases section.Configuration=============There is no separate package configuration file for LaravelODBC.  You'll just add a new array to the `connections` array in `app/config/database.php`.```		'odbc' => array(			'driver'   =>   'odbc',            'dsn'      =>   'odbc:datasource',            'database' =>   'database',            'username' =>   'user',            'password' =>   'password',		),```The ODBC driver is different from the pre-installed ones in that you're going to pass in the DSN instead of having Laravel build it for you.  There are just too many ways to configure an ODBC database for this package to do it for you.Some sample configurations are at [php.net](http://php.net/manual/en/ref.pdo-odbc.connection.php).**Don't forget to update your default database connection.**