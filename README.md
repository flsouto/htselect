# HtSelect

This library can be used to generate `<select>` fields in an easy way.
I recommend you take a look at the documentation of its parent classes in order to grasp all the functionality inherited by this particular one:

- [HtChoice](https://github.com/flsouto/htchoice)
- [HtWidget](https://github.com/flsouto/htwidget)
- [HtField](https://github.com/flsouto/htfield)

## Installation

Via composer:

```
composer require flsouto/htselect
```



## Usage

In the following example we generate a select field with three options.

```php
<?php
require_once('vendor/autoload.php');
use FlSouto\HtSelect;

$select = new HtSelect("id_category");
$select->options([1=>'Category1',2=>'Category2',3=>'Category3']);

echo $select;
```

Outputs:

```html

<div class="widget 58b597bc2668e" style="display:block">
 <select name="id_category">
   <option value="1">Category1
   </option>
   <option value="2">Category2
   </option>
   <option value="3">Category3
   </option>
 </select>
 <div style="color:yellow;background:red" class="error">
 </div>
</div>

```

**Notice**: the `options` method also accepts other formats besides an associative array. Take a look at the documentation of the [HtChoice](https://github.com/flsouto/htchoice#options-as-numeric-arrays) class in order to learn more.


## Selecting an option

If you have read the documentation of the `HtField` and the `HtWidget` parent classes you already know that you are supposed
to use the `context` method in order to set the value of a field/widget: 

```php
<?php
require_once('vendor/autoload.php');
use FlSouto\HtSelect;

$select = new HtSelect('id_category');
$select->options([1=>'Category1',2=>'Category2',3=>'Category3']);
$select->context(['id_category'=>2]);

echo $select;
```

Outputs:

```html

<div class="widget 58b597bc2821a" style="display:block">
 <select name="id_category">
   <option value="1">Category1
   </option>
   <option value="2" selected="selected">Category2
   </option>
   <option value="3">Category3
   </option>
 </select>
 <div style="color:yellow;background:red" class="error">
 </div>
</div>

```

## Setting a caption

The "caption" is the default text which appears on the select field when no option has been selected yet. This is usally a message indicating that the user should choose something:

```php
<?php
require_once('vendor/autoload.php');
use FlSouto\HtSelect;

$select = new HtSelect('id_category');
$select->options([1=>'Category1',2=>'Category2',3=>'Category3']);
$select->caption('CHOOSE A CATEGORY:');

echo $select;
```

Outputs:

```html

<div class="widget 58b597bc288a0" style="display:block">
 <select name="id_category">
   <option value="0">CHOOSE A CATEGORY:
   </option>
   <option value="1">Category1
   </option>
   <option value="2">Category2
   </option>
   <option value="3">Category3
   </option>
 </select>
 <div style="color:yellow;background:red" class="error">
 </div>
</div>

```

Notice that by default the value "0" is used for the caption option. This means that when the form gets sent, if no option has been selected, then the "0" value will be sent as the category id, which in most cases would mean "no category". However, you can change that value if you want by using a second paramenter to the `caption` method:

```php
<?php
require_once('vendor/autoload.php');
use FlSouto\HtSelect;

$select = new HtSelect('id_category');
$select->options([1=>'Category1',2=>'Category2',3=>'Category3']);
$select->caption('CHOOSE A CATEGORY:', 'none'); # change value to 'none'

echo $select;
```

Outputs:

```html

<div class="widget 58b597bc28eef" style="display:block">
 <select name="id_category">
   <option value="none">CHOOSE A CATEGORY:
   </option>
   <option value="1">Category1
   </option>
   <option value="2">Category2
   </option>
   <option value="3">Category3
   </option>
 </select>
 <div style="color:yellow;background:red" class="error">
 </div>
</div>

```