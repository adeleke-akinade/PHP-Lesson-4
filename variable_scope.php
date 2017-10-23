<h2 style="text-align:center">Learn PHP Programming Lesson 4: Variables and Constants</h2>

<?php
require './helpers.php';
require './menu.php';

/*
 * Variables exist within a certain scope. This may be the global scope, in which case the variable will be available
 * to all scripts, or a local scope, in which case the variable will only be available within that scope.
 */

// Global scope.
display_value('h3', 'Global scope');
$var = 'This is a global scope variable available everywhere.';
display_value('p', $var);

// Local scope.
display_value('h3', 'Local scope');
function foo() {
  $var = 'This is a local scope variable available within this function only.';
  display_value('p', $var);
}
foo();

// Global variable is NOT changed.
display_value('p', $var);

// Pass by value
display_value('h3', 'Pass by value');
function bar($var) {
  display_value('p', $var);
  // This will NOT change the global $var because it is passed by value.
  $var = 'Changing the value of a variable passed by value.';
  display_value('p', $var);
}
bar($var);

// Global variable is NOT changed.
display_value('p', $var);

// Pass by reference.
display_value('h3', 'Pass by reference');
function foobar(&$var) {
  // This will change the global $var because it is passed by reference.
  $var = 'Changing the value of a variable passed reference.';
}
foobar($var);

// Global variable is changed.
display_value('p', $var);

// Use global keyword to access global variable within function.
display_value('h3', 'Global keyword.');
function foobarfoo() {
  global $var;
  // This will change the global $var.
  $var = 'Changed the value of $var accessed using the global keyword.';
}
foobarfoo();

// Global variable is changed.
display_value('p', $var);

// Use predefined $GLOBALS variable to access global variables.
display_value('h3', 'Predefined $GLOBALS variable.');
function foobarfoobar() {
  // This will change the global $var.
  $GLOBALS['var'] = 'Changed the value of $var accessed using the predefined $GLOBALS variable.';
}
foobarfoobar();

// Global variable is changed.
display_value('p', $var);

// Variables defined within and included or required file are available wherever that file is included/required.
display_value('h3', 'Variables defined in included file.');
include 'var.inc';
display_value('p', $date);
display_value('p', $time);