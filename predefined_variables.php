<h2 style="text-align:center">Learn PHP Programming Lesson 4: Variables and Constants</h2>

<?php
require './helpers.php';
require './menu.php';

/*
 * PHP has a lot of predefined variables.
 */

// Superglobals are predefined variable that are always available in every scope.

// $GLOBALS variable is an associative array of built in values as well as any global scope user defined variables.
display_value('h3', '$GLOBALS variable');
$var = 'This is a global scope variable'; // This variable will now be available within the $GLOBALS variable.
display_value('p', $GLOBALS['var']);

// $_SERVER is an associative array of variables with information such as headers, paths, hostname, IP addresses, etc.
display_value('h3', '$_SERVER variable');
display_value('p', 'HTTP_HOST: ' . $_SERVER['HTTP_HOST']);
display_value('p', 'SERVER_ADDR: ' . $_SERVER['SERVER_ADDR']);
display_value('p', 'SERVER_PORT: ' . $_SERVER['SERVER_PORT']);
display_value('p', 'SERVER_ADMIN: ' . $_SERVER['SERVER_ADMIN']);
display_value('p', 'DOCUMENT_ROOT: ' . $_SERVER['DOCUMENT_ROOT']);
display_value('p', 'SCRIPT_FILENAME: ' . $_SERVER['SCRIPT_FILENAME']);
display_value('p', 'PHP_SELF: ' . $_SERVER['PHP_SELF']);

// $_GET is an associative array of information passed in URL parameters to the current script.
display_value('h3', '$_GET variable');
display_value('p', $_GET['p1']);
display_value('p', $_GET['p2']);

// $_POST is an associative array of variables passed via the HTTP POST method to the current script.
display_value('h3', '$_POST variable');
display_value('div', '<form method="post"><input type="text" name="name"/><input type="submit" name="submit"/></form>');
if (isset($_POST['submit'])) {
  var_dump($_POST);
}

// $_FILES is an associative array of items uploaded to the current script via the HTTP POST method from a posted form.
display_value('h3', '$_FILES variable');
$form = '<form method="post" enctype="multipart/form-data"><input type="file" name="file"/>';
$form .= '<input type="submit" name="upload" value="upload"/></form>';
display_value('div', $form);
if (isset($_POST['upload'])) {
  var_dump($_FILES);
}

// $_COOKIE is an associative array of variables passed via HTTP Cookies to the current script.
display_value('h3', '$_COOKIE variable');
// You can set a cookie on the client side using the setcookie method and then read the value at a later date or time.
//setcookie("SimpleCookie", "Example of setting a cookie.");
if (! empty($_COOKIE)) {
  var_dump($_COOKIE);
}

// $_REQUEST is an associative array that contains the contents of $_GET, $_POST, and $_COOKIE.
display_value('h3', '$_REQUEST variable');
if (! empty($_REQUEST)) {
  var_dump($_REQUEST);
}

// $_COOKIE is an associative array containing session variables available to the current script.
display_value('h3', '$_SESSION variable');
// You must begin a session using the session_start() function before you can add data to the $_SESSION Superglobal.
if (! session_id()) {
  session_start();
}
$_SESSION['session_var'] = 'Example session variable';
if (! empty($_SESSION)) {
  var_dump($_SESSION);
}

// $_ENV is an associative array containing environment variables available to the current script.
display_value('h3', '$_ENV variable');
$_ENV['foo'] = 'bar';
if (! empty($_ENV)) {
  var_dump($_ENV);
}

// PHP also has the putenv() and getenv() functions. However, you cannot access variables created using the putenv() function
// within the $_ENV array.
putenv('bar=foo');
display_value('p', getenv(('foo')));

var_dump($_ENV['bar']); // This is NULL as it is not set.

// $http_response_header in an associative array of variables that contain response headers..
display_value('h3', '$http_response_header variable');
// In the example below, $http_response_header will contain HTTP response headers returned from answers.com.
function response_headers() {
  // $http_response_header is created in the local scope so exists within the function only.
  file_get_contents("http://answers.com");
  var_dump($http_response_header);
}
response_headers();
var_dump($http_response_header); // This will be NULL as $http_response_header is local scope.