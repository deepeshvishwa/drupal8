<?php
namespace Drupal\example\Controller;

class ExampleController {
  public function myPage() {
    $element = array(
      '#title' => 'Hello world!',
      '#markup' => test_content(),
    );
    return $element;
  }
/*
  public function myform_fun() {
    $element = array(
      '#title' => 'Hello Form!',
      '#markup' => test_form_content(),
    );
    return $element;
  }*/
}


function test_content(){
  $test_con = 'This is first excample module! It is comimg from custom function';
  return $test_con;
}

/*
function test_form_content(){
  $test_form_con = 'Deep Deep Deep Deep Deep Deep Deep Deep Deep';
  return $test_form_con;
}
*/

?>
