## FAuth (Framgia Authentication)

### Installation

To get started with FramgiaAuth, use Composer to add the package to your project's dependencies:

`composer require framgia/fauth-php`

Run the following command:

`composer update`

### Configuration
After installing the Fauth library, register the Framgia\Fauth\FAuthServiceProvider in your config/app.php configuration file:
`Framgia\Fauth\FAuthServiceProvider::class,`

Also, add the Fauth facade to the aliases array in your app configuration file:
`'Fauth' => Framgia\Fauth\Facades\Fauth::class,`

You will also need to add credentials for the OAuth services your application utilizes. These credentials should be placed in your config/services.php configuration file, and should use the key framgia for  the framgia provider. For example:

```
'framgia' => [
    'client_id' => 'your-auth-framgia-app-id',
    'client_secret' => 'your-auth-framgia-app-secret',
    'base_url' => 'http://domain-auth-server',
    'redirect' => 'http://your-callback-url',
],
```

Add the following to your composer.json (autoload-dev -> psr-4)
`"Framgia\\Fauth\\": "vendor/framgia/fauth/"`

Run below command:
`composer dump-autoload`

### Basic Usage
Next, you are ready to authenticate users! You will need two routes: one for redirecting the user to the OAuth provider, and another for receiving the callback from the provider after authentication. We will access Fauth using the Fauth facade:

```
<?php

namespace App\Http\Controllers\Auth;

use Fauth;

class LoginController extends Controller
{
    /**
     * Redirect the user to the Auth-Framgia authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Fauth::driver('framgia')->redirect();
    }

    /**
     * Obtain the user information from Auth-Framgia.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        $user = Fauth::driver('framgia')->user();
    }
}
```

Of course, you will need to define routes to your controller methods:

```
Route::get('login/framgia', 'Auth\LoginController@redirectToProvider');
Route::get('login/framgia/callback', 'Auth\LoginController@handleProviderCallback');
```

Once you have a user instance, you can grab a few more details about the user:

```
$user = Fauth::driver('framgia')->user();
$token = $user->token;
$refreshToken = $user->refreshToken; // not always provided
$expiresIn = $user->expiresIn;
```
If you already have a valid access token for a user, you can retrieve their details using the userFromToken method:

`$user = Fauth::driver('framgia')->userFromToken($token);`

# Pull requests are welcome.
