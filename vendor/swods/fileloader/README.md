Yii 2 FileLoader
============================

This package was made for me, but if you find this useful, you can use it.
It helping me to load files from users, it's include random file name generator and preset settings

INSTALLATION
------------

### Install via Composer

Add this in composer.json

~~~
"swods/fileloader": "*"
~~~

HOW TO USE
------------

`file` - Required, and it must be instance of `yii\web\UploadedFile` class  
`filename` - Name of the file, if not set random name will be used. Note: if you use your name, don't forget file extension  
`dir` - dir where file will located, default is `@webroot/uploads/`  
`chmod` - Default is `0777`  
`length` - Length of the random file name, default is `5`. Note: name generates with 2 parts `$rand_name`_`time()`.`extension`  


```php
$this->file = FileLoader::save([
    'file' => $this->file, // instanceof UploadedFile
]);
```

