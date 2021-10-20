<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Building a REST API with Laravel

An API (Application Programming Interface) is a set of defined rules that explain how computers or applications communicate with one another. APIs sit between an application and the web server, acting as an intermediary layer that processes data transfer between systems.

Representational State Transfer (REST) is an architectural style for distributed hypermedia systems.

## Setting Up a Laravel project

If Composer is already installed:

```sh
composer create-project laravel/laravel example-app
```

If using MariaDB, make a change in App\Providers\AppServiceProvider. Inside boot() function, add:

```sh
Schema::defaultStringLength(191)
```

This will set default db field length to 191. Otherwise, in some cases, there can be 'field too long' exception thrown.

## Create models and migration

```sh
php artisan make:model myModel -m
```

-m stands for migration

Inside database\migration\[latest migration] there are two importent functions : up() and down(). up() is where you set columns of the table that will be created in the database.

Inside the model, we can add a fillable variable for mass charging data.

## Create factories

Factory is where you create a faker for a model.

```sh
php artisan make:factory MyModelFactory --model=MyModel
```

--model option helps associate imediatly the factory and the related model. The factory must have the same name as the model plus the suffix 'Factory'.

Inside database\factory\MyFactory the definition() function returns a array containing fakers.

## Create seeders

You call the factory from the seeder and define how many data you want to create in the database

```sh
php artisan make:seeder MySeeder
```

Then, inside database\seeders\DatabaseSeeder, call newly created seeders.

## Implement a custom Faker provider

In some cases, you would like to create your own faker provider. Inside `app` folder, create Faker folder. This is where all custom Faker provider files will be stored. A custom provider usually extends the \Faker\Provider\Base class. Here's an example :

```sh
namespace App\Faker;
use Faker\Provider\Base;

class AlphabetProvider extends Base
{
    protected static $letters = [
        'a',
        'b',
        'c',
        'd',
    ];
    public function alphabet(): string
    {
        return static::randomElement(static::$letters);
    }
}
```

Laravel autoloads the file via Composer. Faker will later use the method name as the name of the formatter. The method returns a random element from a given array of strings.

In order to register the class in Laravel, we can use this command :

```sh
php artisan make:provider FakerServiceProvider
```

Also, we nned to include the additional Laravel service provider inside config\app :

```sh
'providers' => [
    ...
    App\Providers\FakerServiceProvider::class,
],
```

In `FakerServiceProvider`, use the register() method to bind into the service container :

```sh
use App\Faker\AlphabetProvider;
use Faker\{Factory, Generator};
use Illuminate\Support\ServiceProvider;
class FakerServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(Generator::class, function () {
            $faker = Factory::create();
            $faker->addProvider(new AlphabetProvider($faker));
            return $faker;
        });
    }
}
```

Now you can use the new formatter like the other Faker formatters. In a Laravel factory, the syntax for the custom formatter looks like this :

```sh
public function definition(): array
{
    return [
        'name' => $this->faker->alphabet,
    ];
}
```

## Create controllers

```sh
php artisan make:controller MyController --resource
```

--resource creates CRUD functions inside the controller

## Routing

API routes are defined in routes\api.php. We can use apiResource() to create API URLs.

## Migration

```sh
php artisan migrate:fresh --seed
```

fresh means drop db and create new db.
--seed means add seeders in the database.

## Setting a correct 404 response

If you tried to fetch a non-existent resource, you’ll be thrown an exception and you’ll receive the whole stacktrace. We can fix that by editing our exception handler class, located in app/Exceptions/Handler.php, to return a JSON response:

```sh
public function register()
{
    $this->renderable(function (NotFoundHttpException $e, $request) {
        if ($request->is('api/*')) {
            return response()->json([
                'message' => 'Record not found.'
            ], 404);
        }
    });
}
```

renderable() method helps return a custom error message. In this case, a json response.

[`Laravel documentation`](https://laravel.com/docs/8.x/errors#renderable-exceptions)

## Security with Laravel Passport

Install Laravel passport package using composer command:

```sh
composer require laravel/passport
```

Run database migration:

```sh
php artisan migrate
```

Next, run the command to generate encryption keys for creating secure access tokens:

```sh
php artisan passport:install
```

Laravel Passport is an OAuth2 server and API authentication package. It offers a competent OAuth2 server implementation.

['Laravel passport documentation'](https://laravel.com/docs/8.x/passport)

['Laravel API-passport tutorial'](https://www.remotestack.io/how-to-create-secure-rest-api-in-laravel-with-passport)

After updating the databasde, a RuntimeException may occur: Personal access client not found. In that case, **install passport again**.

## Resource

```sh
php artisan make:resource MyResource
```

Creates a resource in which we can define how response data will be displayed. Inside `toArray()` we can define the array of what we want to return. Here is an example :

```sh
public function toArray($request)
{
    return [
        'id' => (string)$this->id,
        'type' => 'articles',
        'attributes' => [
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'status' => $this->status,
            'image_url' => $this->image_url,
            'shop_id' => $this->shop_id,
            'article_cathegory_id' => $this->article_cathegory_id
        ]
    ];
}
```

Notice the `id` is casted as a `string`. As a protocol, `json` requires the `id` to be of type `string`.

## Form Request Validation

Form requests are custom request classes that encapsulate their own validation and authorization logic.

```sh
php artisan make:request MyRequest
```

Inside the `authorize()` function, we have to set the return value to `true` :

```sh
public function authorize()
{
    return true;
}
```

The rules method returns the validation rules that should apply to the request's data:

```sh
public function rules()
{
    return [
    'name' => 'required|alpha_num|min:1|max:255',
    'description' => 'max:255'
    ];
}
```

Now we can replace `Illuminate\Http\Request` by the new request that we have created everywhere we want to use our validation.

['Laravel API tutorial'](https://www.youtube.com/watch?v=xvqPEEpRBJ4)
