<h2 style="text-align:center">Learn PHP Programming Lesson 4: Variables and Constants</h2>

<?php
require './helpers.php';
require './menu.php';

// As well as naming variables statically, you can also name them dynamically using the contents of another variable.
$foo = 'bar';
display_value('p', $foo);

$$foo = 'foo';
display_value('p', $bar);

// Both instructions below are the same
display_value('p', $foo . ' ' . $bar);
display_value('p', $foo . ' ' . ${$foo});

// You can access arrays using variable variables.
$bar = array(1, 2, 3, 4, 5);
display_value('p', ${$foo}[0]);

// You can also use variable variables to access class properties.
class foo {
  public $bar = 'Inside of <i>' . __CLASS__ . '</i>';
  public $array = array(1, 2, 3, 4, 5);
}

$obj = new foo;
$array = 'array';
display_value('p', $obj->$foo);
display_value('p', $obj->$array[1]);
display_value('p', ($obj->$array[1] * $obj->$array[2]));