<?php
namespace Foo {
  print '<h2 style="text-align:center">Learn PHP Programming Lesson 4: Variables and Constants</h2>';
  
  require './helpers.php';
  require './menu.php';

  /*
   * Magic constants are predefined constants available to every script that PHP runs. Which magic constants are available
   * depends on the extensions that are available to your version of PHP, whether they have been dynamically loaded or
   * compiled in.
   */
  display_value('h3', 'Magic Constants');

  // There are nine magic constants that change there value depending on where they are in your script.
  display_value('p', 'Line: ' . __LINE__); // This will output the line on which is resides.
  display_value('p', 'File: ' . __FILE__); // This will output the file in which it resides.
  display_value('p', 'Directory: ' . __DIR__); // This will output the parent directory of the file in which it resides.

  function bar() {
    // This will output the fully qualified name of the function that it exists within.
    display_value('p', 'Function: ' . __FUNCTION__);
  }
  bar();

  trait Bar {
    public function display_name() {
      display_value('p', 'Trait: ' . __TRAIT__); // This will output the name of the trait that it exists within.
    }
  }

  class FooBar {
    use Bar;

    public function __construct() {
      // This will output the fully qualified name of the class that it exists within.
      display_value('p', 'Class: ' . __CLASS__);

      // This will output the fully qualified name of the method that it exists within.
      display_value('p', 'Method: ' . __METHOD__);
    }
  }

  $obj = new FooBar;
  $obj->display_name();

  display_value('p', 'Namespace: ' . __NAMESPACE__); // This will output the name of the namespace that it exists within.

  // This will output the fully qualified name of the class on the left side of FooBar::class (FooBar in this case).
  display_value('p', 'Class name: ' . FooBar::class);

  // There are lots more predefined constants such as PHP_VERSION, PHP_OS, PHP_INT_MAX, etc. You can see a list of them
  // here https://secure.php.net/manual/en/reserved.constants.php.
}

