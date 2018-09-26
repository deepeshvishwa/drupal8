<?php
namespace Drupal\custom_dev\Controller;
use Drupal\Core\Controller\ControllerBase;
use Drupal\user\Entity\User;

class UpdateUserController extends ControllerBase {

  public function update_user_info() {
    $element = array(
      '#markup' => update_user_info1(),
    );
    return $element;
  }
}

function update_user_info1(){
  $user = \Drupal\user\Entity\User::load(1);
  // Attach only one term
  $tid = 1; // The ID of the term to attach.
  $user->set('field_add_tags', '13');
  $user->save();

  // End of Example 1 />
  // Example 2: attaching multiple terms
  //$node2 = \Drupal\node\Entity\Node::load($nid2);
  // To attach multiple terms, the term IDs must be in an array.
  //$multiple_tids = array(1, 2, 3); // Each is Term ID of an existing term.
  //$node2->set('field_example_name', $multiple_tids);  // Note that field_example_name must allow multiple terms.
  //$node2->save();
  drupal_set_message( "User updated!\n");
}
?>
