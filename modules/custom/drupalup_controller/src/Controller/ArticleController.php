<?php
namespace Drupal\drupalup_controller\Controller;

class ArticleController {

  public function page() {

    $items = array(
      array('name' => 'Article one'),
      array('name' => 'Article two'),
      array('name' => 'Article three'),
      array('name' => 'Article four'),
    );

    $data = array(
      '#theme' => 'article_list',
      '#title' => 'Our Article List',
      '#items' => $items,
    );

    return $data;
  }
}
