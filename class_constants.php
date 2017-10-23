<h2 style="text-align:center">Learn PHP Programming Lesson 4: Variables and Constants</h2>

<?php
require './helpers.php';
require './menu.php';

/*
 * Class constants are just like regular constants. Accept for they are declared within a class and are therefore
 * also accessed through that specific class.
 *
 * If you use the define() function to create a constant within a class, then the constant will be available outside
 * of the class. For this reason, it is best to use the const keyword to create a constant inside of a class if you
 * want that constant to be available within that class only.
 */
display_value('h3', 'Class Constants');

define('FOOBAR', 'Constant: ' . __LINE__);
define('FOOBAR2', 'Constant: ' . __LINE__);

class Foo {
  // This will not affect the FOOBAR constant outside of the class as it is visible within this class only.
  const FOOBAR = 'Class Constant: ' . __LINE__;

  public function __construct() {
    // This will fail and cause an E_NOTICE constant already defined warning as the define() function will attempt to
    // create a constant that is visible everywhere as opposed to a class constant and FOOBAR2 has already been defined.
    define('FOOBAR2', 'Class Constant:' . __LINE__);

    // This will be available outside of the class.
    define('FOOBAR3', 'Class Constant:' . __LINE__);
  }

  public function display_constant() {
    display_value('p', self::FOOBAR);
  }
}

$obj = new Foo();

display_value('p', FOOBAR); // This will output the FOOBAR constant.
$obj->display_constant(); // This will output the FOOBAR class constant.

display_value('p', Foo::FOOBAR); // You can access class constants statically.

// As of PHP 5.3.0, you can use a variable to reference a class, or, a variable containing an instantiated class.
$classname = 'Foo';
display_value('p', $classname::FOOBAR);
display_value('p', $obj::FOOBAR);

// This is visible everywhere even though it is created within a class as it uses the define() function rather than
// the const keyword.
display_value('p', FOOBAR3);