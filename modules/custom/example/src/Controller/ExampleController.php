<?php
namespace Drupal\example\Controller;

class ExampleController {
  public function myPage() {
    $element = array(
      '#title' => 'Hello world!',
      '#markup' => 'This is first excample module!',
    );
    return $element;
  }
}
?>
