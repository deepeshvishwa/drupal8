<?php

namespace Drupal\loggedin_users_list\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class LoggedinUsersListController.
 */
class LoggedinUsersListController extends ControllerBase {

  /**
   * Loggedin_users.
   *
   * @return string
   *   Return Hello string.
   */
  public function loggedin_users() {
    $element = array(
      '#markup' => show_users_list(),
    );
    return $element;
  }
  /**
   * Logout_user.
   *
   * @return string
   *   Return Hello string.

  public function logout_user() {
    return [
      '#type' => 'markup',
      '#markup' => $this->t('Implement method: logout_user')
    ];
  }
*/
}


function show_users_list(){
  // Count currently, how many number of users are logged-in on the website.
  $query_count = \Drupal::database()->select('sessions', 's');
  $query_count->addExpression('COUNT(DISTINCT(uid))');
  $count_rc = $query_count->execute()->fetchField();

  // Display List of currently loggedin users.
  // Use this link (https://www.drupal.org/project/drupal/issues/2939760) to remove ",ONLY_FULL_GROUP_BY" word
  // from location "\core\lib\Drupal\Core\Database\Driver\mysql\Connection.php" at line no. 455
  // OR it can be setting into settings.php
  $query_list = \Drupal::database()->select('sessions', 's');
  $query_list->addExpression('COUNT(s.uid)','count_uid');
  $query_list->fields('s',['uid', 'sid', 'hostname', 'timestamp']);
  $query_list->groupBy('s.uid');
  $query_list->orderBy('s.uid', 'ASC');
  $result_rc = $query_list->execute()->fetchAll();

  $header = [
    'userid' => t('User id'),
    'username' => t('Username'),
    'nod' => t('Number of logged-in (Devices or Browser)'),
    'hostname' => t('Hostname'),
    'loggedin' => t('Loggedin Time'),
    'operation'=> t('Operation'),
  ];

  $row_data = array();
  foreach ($result_rc as $result) {
    $row_data[] = [
     'userid' => $result->uid,
     'username' => $result->name,
     'nod' => $result->count_uid,
     'hostname' => $result->hostname,
     'loggedin' => $result->timestamp,
     'operation' => $result->sid,
   ];
  }

 // $template = $twig->loadTemplate(drupal_get_path('module', 'loggedin_users_list') . '/templates/loggedin-users-list.html.html.twig');
 // $html_agreed = $template->render($variables);
/* https://www.flipkart.com/samsung-253-l-frost-free-double-door-4-star-refrigerator/p/itmf3h7bzgdnwfhk?pid=RFRFFZGE2XYRTBBF
  $form['table'] = [
    '#type' => 'tableselect',
    '#header' => $header,
    '#options' => $output,
    '#empty' => t('No users found'),
  ];
*/
  //print_r($html_agreed);
}
