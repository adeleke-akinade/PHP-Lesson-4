<?php

error_reporting(E_ERROR);

function display_value($tag, $value) {
  print "<$tag>$value</$tag>\n";
}

function display_values($tag, $values) {
  foreach($values as $value) {
    if (is_array($value)) {
      display_values($tag, $value);
    }
    else {
      print "<$tag>$value</$tag>\n";
    }
  }
}

function display_value_and_type($tag, $value) {
  print "<$tag>$value is of type <i>" . gettype($value) . "</i></$tag>\n";
}

function display_values_and_types($tag, $values) {
  foreach($values as $value) {
    if (is_array($value)) {
      display_values_and_types($tag, $value);
    }
    else {
      print "<$tag>" . var_export($value, true) . " is of type " . gettype($value) . "</$tag>\n";
    }
  }
}