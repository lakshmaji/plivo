# plivo

# laravel plivo


## Installation

Download package form  https://github.com/lakshmajim/plivo . 
Place it in vendor directory of your project.


edit composer.json file
```bash
 "autoload": {
        "classmap": [
            "database"
        ],
        "psr-4": {
            "App\\": "app/",
            "lakshmajim\\plivo\\": "vendor/lakshmajim/plivo/src"   
        }
    },
```
    
Run this command from the Terminal:

```bash
    composer dumpautoload
    composer update
```

## Laravel integration

you need to add the service provider. Open `app/config/app.php`, and add a new item to the providers array.

```php
 lakshmajim\plivo\PlivoServiceProvider::class,
```

Then, add a Facade for more convenient usage. In `app/config/app.php` add the following line to the `aliases` array:

```php
'Plivo'     => lakshmajim\plivo\Facade\Plivo::class,
```



Sending a SMS Message

```php
<?php

Use Plivo;

Plivo::sendMessagePlivo($auth_id,$auth_token);
```

miscellaneous

```php
<?php

  Use Plivo;
  //setting source mobile number
  Plivo::setSourceMobile("918179278096");
  //setting destination mobile number
  Plivo::setDestinationMobile("919966567886");
  //setting text message
  Plivo::setMessagePlivo(" is!");
  //setting call back url
  Plivo::setCallBackUrl("http://localhost/");```

