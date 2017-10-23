<h2 style="text-align:center">Learn PHP Programming Lesson 4: Variables and Constants</h2>

<?php
require './helpers.php';
require './menu.php';

// Variable names must begin with an underscore or letter, followed by any number of alphanumeric characters or underscores
display_value('h3', 'variable names');
$foo = 'foo';
$_foo = '_foo';
$foo123 = 'foo123';
$_1foo = '_1foo';
//$1foo = '1foo'; // This is invalid because it begins with a number.
display_values('p', array($foo, $_foo, $foo123, $_1foo));

// PHP is a loosely type language meaning a variables type is determined by the data they hold. Changing the type of data
// that a variable contains will change the type of that variable.
display_value('h3', 'Variable type');
$var1 = 'string';
$var2 = FALSE;
$var3 = NULL;
display_values_and_types('p', array($var1, $var2, $var3));

$var1 = 1;
$var2 = 2.5;
$var3 = new stdClass();
display_values_and_types('p', array($var1, $var2, $var3));

// Initialising a variable with a default value is not required but is a best practice.
display_value('h2', 'Initialising variables with a default value');

// Bad practice.
$hour_of_day = date('G');
if ($hour_of_day > 12) {
  $greeting = 'Good afternoon';
}
display_value('p', $greeting); // This will emit an E_NOTICE undefined variable notice.

// Good practice.
$greeting = ''; // Initialise variable with default value.
$hour_of_day = date('G');
if ($hour_of_day > 12) {
  $greeting = 'Good afternoon';
}
display_value('p', $greeting);

// Relying on an uninitialised variable is a security risk if you have register_globals turned on.
// Example from the php.net site - https://secure.php.net/manual/en/security.globals.php.

/*
// define $authorized = true only if user is authenticated
if (authenticated_user()) {
  $authorized = true;
}

// Because we didn't first initialize $authorized as false, this might be
// defined through register_globals, like from GET auth.php?authorized=1
// So, anyone can be seen as authenticated!
if ($authorized) {
  include "/highly/sensitive/data.php";
}
*/

// You can check if a variable has been initialised using the isset() function.
display_value('h2', 'Checking if a variable is set and is non-empty.');
if (isset($foo)) {
  display_value_and_type('p', '$foo is set: ' . $foo);
}

$array = array(
  0,
  1,
  NULL,
  'string',
  array(),
  array(1),
);

foreach($array as $item) {
  // Check if $item is set.
  if (isset($item)) {
    display_value('p', '$item is set and contains: <i>' . var_export($item, true) . '</i>');
  }
  else {
    display_value('p', '$item contains <i>' . var_export($item, true) . '</i> which is considered not set.');
  }

  // The ! character negates the if clause meaning it will do the opposite and pass as true if $item is not set.
  if (!isset($item)) {
    display_value('p', '$item contains <i>' . var_export($item, true) . '</i> which is considered not set.');
  }
  else {
    display_value('p', '$item is set and contains: <i>' . var_export($item, true) . '</i>');
  }

  // Check if $item is empty (This will also check if the variable is set so can be used on variables that you are unsure
  // are set or not).
  if (empty($item)) {
    display_value('p', '$item contains <i>' . var_export($item, true) . '</i> which is considered empty.');
  }
  else {
    display_value('p', '$item is not empty and contains: <i>' . var_export($item, true) . '</i>');
  }
}

// If you unset a variable it will have a value of NULL and is considered to be empty.
$var = 1;
unset($var);
if (empty($var)) {
  display_value('p', '$var contains <i>' . var_export($var, true) . '</i> which is considered empty.');
}
else {
  display_value('p', '$var is not empty and contains <i>' . var_export($var, true) . '</i>');
}

// You can also unset a variable by assigning it the NULL constant.
$var = 1;
$var = NULL;
if (isset($var)) {
  display_value('p', '$var is set and contains: <i>' . var_export($var, true) . '</i>');
}
else {
  display_value('p', '$var contains <i>' . var_export($var, true) . '</i> which is considered not set.');
}