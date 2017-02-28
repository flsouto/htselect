<?php

use PHPUnit\Framework\TestCase;

#mdx:h al
require_once('vendor/autoload.php');

#mdx:h use
use FlSouto\HtSelect;

/* 
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

*/
class HtSelectTest extends TestCase{

/*

## Usage

In the following example we generate a select field with three options.

#mdx:Render

Outputs:

#mdx:Render -o httidy

**Notice**: the `options` method also accepts other formats besides an associative array. Take a look at the documentation of the [HtChoice](https://github.com/flsouto/htchoice#options-as-numeric-arrays) class in order to learn more.

*/
	function testRender(){
		#mdx:Render
		$select = new HtSelect("id_category");
		$select->options([1=>'Category1',2=>'Category2',3=>'Category3']);
		#/mdx echo $select
		$this->expectOutputRegex("/select.*?id.*?name.*?option.*?1.*?Category1.*?3.*?Category3.*?select/s");
		echo $select;
	}

/*
## Selecting an option

If you have read the documentation of the `HtField` and the `HtWidget` parent classes you already know that you are supposed
to use the `context` method in order to set the value of a field/widget: 

#mdx:SelectedOption

Outputs:

#mdx:SelectedOption -o httidy
*/
	function testSelectedOption(){
		#mdx:SelectedOption
		$select = new HtSelect('id_category');
		$select->options([1=>'Category1',2=>'Category2',3=>'Category3']);
		$select->context(['id_category'=>2]);
		#/mdx echo $select
		$this->expectOutputRegex("/option.*?2.*selected/");
		echo $select;
	}

/*
## Setting a caption

The "caption" is the default text which appears on the select field when no option has been selected yet. This is usally a message indicating that the user should choose something:

#mdx:Caption

Outputs:

#mdx:Caption -o httidy
*/
	function testCaption(){
		#mdx:Caption
		$select = new HtSelect('id_category');
		$select->options([1=>'Category1',2=>'Category2',3=>'Category3']);
		$select->caption('CHOOSE A CATEGORY:');
		#/mdx echo $select
		$this->expectOutputRegex("/select.*?CHOOSE A CATEGORY.*?/s");
		echo $select;
	}

/*
Notice that by default the value "0" is used for the caption option. This means that when the form gets sent, if no option has been selected, then the "0" value will be sent as the category id, which in most cases would mean "no category". However, you can change that value if you want by using a second paramenter to the `caption` method:

#mdx:CaptionValue

Outputs:

#mdx:CaptionValue -o httidy
*/
	function testCaptionValue(){
		#mdx:CaptionValue
		$select = new HtSelect('id_category');
		$select->options([1=>'Category1',2=>'Category2',3=>'Category3']);
		$select->caption('CHOOSE A CATEGORY:', 'none'); # change value to 'none'
		#/mdx echo $select
		$this->expectOutputRegex("/select.*?option.*?none.*?CHOOSE A CATEGORY.*?/s");
		echo $select;
	}

}