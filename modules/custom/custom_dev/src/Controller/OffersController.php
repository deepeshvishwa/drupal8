<?php
namespace Drupal\custom_dev\Controller;
use Drupal\Core\Controller\ControllerBase;

class OffersController extends ControllerBase {
  public function offers_controller($count) {
    return [
      '#type' => 'markup',
      '#markup' => $this->t('You will get %count% discount!!', array('%count' => $count)),];
  }
}
?>
