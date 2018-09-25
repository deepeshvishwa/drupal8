<?php
namespace Drupal\custom_dev\Controller;
use Drupal\Core\Controller\ControllerBase;

class HelloController extends ControllerBase {
  public function content() {
    return array(
    '#type' => 'markup',
    '#markup' => $this->t('Welcome to my website!'),
    );
  }
}
?>
