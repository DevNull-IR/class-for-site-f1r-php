# Documention
php class for f1r.ir ( shourt link )


# Usage
source : in **src/class-f1r.php**

سورس : در **src/class-f1r.php**

**version 2.0**

# Get Started
one- include class:

اول : کلاس رو به پروزه اضافه میکنیم
```php
<?php 
include_once 'class-f1r.php';

```
Now we need to create an object from the class

حالا یک شیء از کلاس ایجاد می کنیم : 
```php
<?php 
include_once 'class-f1r.php';
$result = new F1r_php();

```
or 
```php
<?php 
include_once 'class-f1r.php';
use F1r_php as shourtlink;
```
Now you can write the rest of your code

حالا می توانید بقیه کد خود را بنویسید

# Get View
You can do this to get the information of a shortened link

برای دریافت اطلاعات یک لینک کوتاه شده می توانید این کار را انجام دهید

```php
<?php
include_once 'class-f1r.php';
use F1r_php as shourtlink;
print_r(shourtlink::getview("$name"));
```
# How To Create New Link
You can use this to create a new shortened link

می توانید از این برای ایجاد یک پیوند کوتاه شده جدید استفاده کنید

```php 
<?php 
include_once 'class-f1r.php';
use F1r_php as shourtlink;
$url = @$_GET['url'];
$name = @$_GET['name'];
$token = @$_GET['token'];
print_r(shourtlink::creat_link($url,$name,$token));
```
# Version History

**First version :**

version : **1.0**

**Description :**

The first version of the link shortener class for the f1r site in php

**The second version :**

version : **2.0**

**Description :**

Web services changed. To use, you need to receive your token from your panel.
panel : f1r.ir/panel

# The End
