<?php

use Illuminate\Http\Request;
use Laravel\Vapor\Runtime\HttpKernel;

/**
 * Laravel - A PHP Framework For Web Artisans.
 *
 * @author   Taylor Otwell <taylor@laravel.com>
 */
define('LARAVEL_START', microtime(true));

/*
|--------------------------------------------------------------------------
| Register Core Helpers
|--------------------------------------------------------------------------
|
| We cannot rely on Composer's load order when calculating the weight of
| each package. This line ensures that the core global helpers are
| always given priority one status.
|
*/

$helperPath = __DIR__.'/vendor/october/rain/src/Support/helpers.php';

if (!file_exists($helperPath)) {
    fwrite(STDERR, 'Missing OctoberCMS vendor files.'.PHP_EOL);
    exit(1);
}

require_once $helperPath;

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our application. We just need to utilize it! We'll simply require it
| into the script here so that we don't have to worry about manual
| loading any of our classes later on. It feels great to relax.
|
*/

require __DIR__.'/vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Turn On The Lights
|--------------------------------------------------------------------------
|
| We need to illuminate PHP development, so let us turn on the lights.
| This bootstraps the framework and gets it ready for use, then it
| will load up this application so that we can run it and send
| the responses back to the browser and delight our users.
|
*/

$app = require_once __DIR__.'/bootstrap/app.php';

/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Once we have the application, we can handle the incoming request
| through the kernel, and send the associated response back to
| the client's browser allowing them to enjoy the creative
| and wonderful application we have prepared for them.
|
*/

$handler = new HttpKernel($app);

$response = $handler->handle(Request::capture());

$response->send();
