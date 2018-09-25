<?php
namespace Drupal\custom_dev\Controller;
use Drupal\Core\Controller\ControllerBase;
use Drupal\node\Entity\Node;

class DeleteNodeController extends ControllerBase {

  public function delete_node() {
    $element = array(
      '#markup' => custom_node_del(),
    );
    return $element;
  }
}

function custom_node_del(){
  $result = \Drupal::entityQuery("node")
    ->condition('nid', 4, '=')
    ->execute();

  $storage_handler = \Drupal::entityTypeManager()->getStorage("node");
  $entities = $storage_handler->loadMultiple($result);
  $storage_handler->delete($entities);
  drupal_set_message( "Node with nid  Deleted !\n");
}
?>
