RandString
============================

This package was made for me, but if you find this useful, you can use it.
It helping me to generate random string

INSTALLATION
------------

### Install via Composer

Add this in composer.json

~~~
"swods/randstring": "*"
~~~

HOW TO USE
------------

`chars` - chars that will be used for generating, default is [A-Za-z0-9]. Note: chars must be set like this - `abcdeAbcde1234`  
`length` - Length of the random sting, default is `5`  

```php
echo RandString::generate([
    'length' => 10
]);
```