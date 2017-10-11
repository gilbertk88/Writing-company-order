yii-accounting-module
=====================

Accounting module to Yii

This module requires

1. Treetable [ https://github.com/ludo/jquery-treetable](https://github.com/ludo/jquery-treetable )
2. Bootstrap 2.3
3. Jquery
4. File Random image to place holder

Everything I did not enter because of licensing issues

How to Install :

1. Copy the module to the module directory in yii
2. Create a Directory Accounting / assets / css Accounting / assets / js Accounting / assets / img
3. Put the file of JQuery Treetable there
4. Add Accounting in config / main.php on the modules

```php
'modules'=>array(
    'Accounting'=>array(
        "params"=>array(
             "uploadPath"=>"/var/www/yii_erp/accounting/upload/",
             "uploadUrlPath"=>"/upload/", //relative Url dari direktori upload gambar
         ),
    )
);
```