<h2 style="text-align:center">Learn PHP Programming Lesson 4: Variables and Constants</h2>

<?php
require './helpers.php';
require './menu.php';

/*
 * Constant names must begin with a letter or underscore followed by any number of alphanumeric characters and
 * underscores. By default, constant names are case-sensitive and it's a best practice to use uppercase characters.
 * to easily differentiate them from variables.
 *
 * There are two ways to creating a constant.
 */
display_value('h3', 'Constant names');

// The first way of creating a constant is using the define() function. This is available in all versions of PHP and
// allows you to assign scalar data (boolean, integer, float, and string), NULL, or the result of a scalar expression.
display_value('h3', 'Using the define() function');
define('_FOO', '_foo');
define('_FOO123', 'foo123');
define('FOO', 'foo');
define('FOO101', NULL);
//define(1FOO, '1FOO'); // This is invalid as it begins with a number.
display_value('p', _FOO);
display_value('p', _FOO123);
display_value('p', FOO);
display_value('p', var_export(FOO101, true));

// When using the define() function, you can make a constant case-insensitive by passing a value of true as the third
// argument to the function.
define('FOO2', 'case-insensitive constant.', true);
display_value('p', FOO2);
display_value('p', foo2);

// Scalar expressions.
define('FOO3', FOO . ', foo3');
display_value('p', FOO3);
define('FOO4', 3 * 3);
display_value('p', FOO4);
define('FOO5', 1.7 * 4.6);
display_value('p', FOO5);
define('FOO6', (FOO4 > FOO5));
display_value('p', var_export(FOO6, true));

// As of PHP 7.0.0, you can assign arrays to constants created using the define function.
define('FOO7', array(1, 2, 3));
define('FOO8', range(1, 3));
display_values('p', FOO7);
display_values('p', FOO8);

// It's possible to assign a resource to a constant. However, it is discouraged as the behaviour can be unpredictable
// You can read more about it on the php.net site, https://secure.php.net/manual/en/language.constants.syntax.php, if
// you like.

// The second way of creating a constant is using the const keyword. This is available outside of class definitions only
// and requires PHP 5.3.0 or later.
display_value('h3', 'Using the const keyword');
const BAR = 'bar';
display_value('p', BAR);

// Prior to PHP 5.6.0, creating a constant using the const keyword only allowed you to assign scalar data or NULL to the.
// constant As of PHP 5.6.0, you can assign the result of a scalar expression, or, an array, to a constant when created
// using the const keyword.
const BAR2 = BAR . ', bar2';
display_value('p', BAR2);
const BAR3 = 3 * 3;
display_value('p', BAR3);
const BAR4 = 1.7 * 4.6;
display_value('p', BAR4);
const BAR5 = (BAR3 > BAR4);
display_value('p', var_export(BAR5, true));

const BAR6 = array('car', 'bike', 'truck');
display_values('p', BAR6);
display_value('p', BAR6[0]);
display_value('p', BAR6[1]);
display_value('p', BAR6[2]);

// Unlike variables, constants do not have scoping rules and are available everywhere.
display_value('h3', 'Constant scope');
define('FOOBAR', 'foobar');
display_value('p', FOOBAR);
function foo() {
  display_value('p', FOOBAR);
}
foo();

// There are a few ways to check if a constant is defined.
display_value('h3', 'Checking if a constant is defined');

// You can use the defined() function to check if a constant is defined. It will return true if it is, or false otherwise.
if (defined('FOOBAR')) {
  display_value('p', FOOBAR . ': ' . __LINE__);
}
else {
  display_value('p', 'FOOBAR is undefined: ' . __LINE__);
}

display_value('p', var_export(defined('FOOBAR2'), true) . ': ' . __LINE__);

// You can use the constant() function to get the contents of a constant. This returns NULL if the constant is not defined.
display_value('p', FOOBAR . ': ' . __LINE__);
display_value('p', constant('FOOBAR') . ': ' . __LINE__); // The same thing as the previous line.

// You can use it to check if a constant exists as NULL is considered false. However, it will cause an E_WARNING couldn't
// find constant error if the constant does not exist so it not advised.
if ( constant('FOOBAR20')) {
  display_value('p', FOOBAR20 . ': ' . __LINE__);
}
else {
  display_value('p', 'FOOBAR is undefined: ' . __LINE__);
}

// You can get all defined constants using get_defined_constants() function. It returns an associative array.
$defined_constants = get_defined_constants();
if ($defined_constants['FOOBAR']) {
  display_value('p', FOOBAR . ': ' . __LINE__);
}
else {
  display_value('p', 'FOOBAR is undefined: ' . __LINE__);
}