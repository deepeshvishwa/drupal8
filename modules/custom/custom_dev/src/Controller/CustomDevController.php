<?
//Calling from the Controller
/**
* @file
* Contains \Drupal\lotus\Controller\LotusController.php
*/
namespace Drupal\custom_dev\Controller;

use Drupal\Core\Controller\ControllerBase;

class CustomDevController extends ControllerBase {
  public function content() {

    return array(
      '#theme' => 'custom_dev_template',
      '#test_var' => $this->t('Test Value'),
    );

  }
}
