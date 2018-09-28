<?php
namespace Drupal\acme\Controller;
use Drupal\Core\Controller\ControllerBase;
class DefaultController extends ControllerBase
{
  /**
   * hello
   * @param  string $name
   * @return string
   */
  public function hello($name)
  {
    return [
      '#theme' => 'hello_page',
      '#name' => $name,
      //'#attached' => [
      //  'css' => [
      //    drupal_get_path('module', 'acme') . '/assets/css/acme.css'
      //  ]
      //]
    ];
  }
}
