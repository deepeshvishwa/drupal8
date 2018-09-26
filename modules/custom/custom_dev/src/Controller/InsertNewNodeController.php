<?php
namespace Drupal\custom_dev\Controller;
use Drupal\Core\Controller\ControllerBase;
use Drupal\node\Entity\Node;

class InsertNewNodeController extends ControllerBase {

  public function insert_new_node() {
    $element = array(
      '#markup' => custom_node_add(),
    );
    return $element;
  }
}

function custom_node_add(){

    $node = Node::create(['type' => 'article']);
    $node->set('title', 'This is first node created by program 1');

    //Body can now be an array with a value and a format.
    //If body field exists.
    $body = [
        'value' => 'Article type node body data-1',
        'format' => 'basic_html',
      ];
    $node->set('body', $body);
    $node->set('uid', 1);
    $node->status = 1;
    $node->enforceIsNew();
    $node->save();
    drupal_set_message( "Node with nid " . $node->id() . " saved!\n");


    $new_term = \Drupal\taxonomy\Entity\Term::create([
              'vid' => 'tags',
              'name' => 'Test T',
        ]);

    $new_term->enforceIsNew();
    $new_term->save();
    drupal_set_message( "Term name saved!\n");
}
?>
