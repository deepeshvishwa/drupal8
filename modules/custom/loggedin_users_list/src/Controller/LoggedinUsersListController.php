<?php

namespace Drupal\loggedin_users_list\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Component\Render\FormattableMarkup;
use Symfony\Component\HttpFoundation\RedirectResponse;
/**
 * Class LoggedinUsersListController.
 */
class LoggedinUsersListController extends ControllerBase {

  public function loggedin_users() {
    // Count currently, how many number of users are logged-in on the website.
    $query_count = \Drupal::database()->select('sessions', 's');
    $query_count->addExpression('COUNT(DISTINCT(uid))');
    $count_rc = $query_count->execute()->fetchField();

    // Display List of currently loggedin users.
    // Use this link (https://www.drupal.org/project/drupal/issues/2939760) to remove ",ONLY_FULL_GROUP_BY" word
    // from location "\core\lib\Drupal\Core\Database\Driver\mysql\Connection.php" at line no. 455
    // OR it can be setting into settings.php
    $query_list = \Drupal::database()->select('sessions', 's');
    $query_list->leftJoin('users_field_data', 'u', 'u.uid = s.uid');
    $query_list->addExpression('COUNT(s.uid)','count_uid');
    $query_list->fields('s',['uid', 'sid', 'hostname', 'timestamp']);
    $query_list->fields('u',['name']);
    $query_list->groupBy('s.uid');
    $query_list->orderBy('s.uid', 'ASC');
    $result_rc = $query_list->execute()->fetchAll();

    $header = [
      'userid' => t('User id'),
      'username' => t('Username'),
      'nod' => t('Number of Logged-in (Devices or Browser)'),
      'hostname' => t('Hostname'),
      'loggedin' => t('Loggedin Time'),
      'operation'=> t('Operation'),
    ];

    $header_inner = [
      'hostname'  => '',
      'timestamp' => '',
      'operation'=> '',
    ];

    $rows_data = array();
    foreach ($result_rc as $result) {
      if ($result->count_uid > 1){
        /* Begin - Inner content */
        $query_list_inner = '';
        $query_list_inner = \Drupal::database()->select('sessions', 's');
        $query_list_inner->fields('s',['sid', 'hostname', 'timestamp']);
        $query_list_inner->fields('s',['sid', 'hostname', 'timestamp']);
        $query_list_inner->condition('uid', $result->uid, '=');
        $query_list_inner->orderBy('s.timestamp', 'ASC');
        $result_rc_inner = $query_list_inner->execute()->fetchAll();

        $rows_data_inner = array();
        foreach ($result_rc_inner as $result_inner) {
          $rows_data_inner[] = [
           'hostname' => $result_inner->hostname,
           'loggedin' => date("Y-m-d H:i:s", $result_inner->timestamp),
           'operation'=> array(
                'data' => new FormattableMarkup('<a href=":link">Log out</a>',
                [
                  ':link' => '/admin/config/people/loggedin-users-list/'.$result_inner->sid,
                ]
              )
            ),
          ];
        }
        /* Begin - Inner content */

        $build_inner = ['#markup' => '',];
        $build_inner['table'] = [
          '#theme' => 'table',
          '#header' => '',
          '#rows' => $rows_data_inner,
        ];

        $rows_data[] = [
         'userid'   => $result->uid,
         'username' => array(
              'data' => new FormattableMarkup('<a href=":link">'.$result->name.'</a>',
              [
                ':link' => '/user/'.$result->uid,
              ]
            )
          ),
         'nod'      => $result->count_uid,
         'hostname' => array('data' => $build_inner, 'colspan' => 3,),
        ];
      } else {
        $rows_data[] = [
         'userid'   => $result->uid,
         'username' => array(
              'data' => new FormattableMarkup('<a href=":link">'.$result->name.'</a>',
              [
                ':link' => '/user/'.$result->uid,
              ]
            )
          ),
         'nod'      => $result->count_uid,
         'hostname' => $result->hostname,
         'loggedin' => date("Y-m-d H:i:s", $result->timestamp),
         'operation'=> array(
              'data' => new FormattableMarkup('<a href=":link">Log out</a>',
              [
                ':link' => '/admin/config/people/loggedin-users-list/'.$result->sid,
              ]
            )
          ),
        ];
      }
    }

    $build = ['#markup' => '',];

    $build['table'] = [
      '#prefix'=> '<div><b>Currently number of logged-in users: '.$count_rc.'</b></div>',
      '#theme' => 'table',
      '#header' => $header,
      '#rows' => $rows_data,
    ];
    return $build;
  }


  public function logout_user($logout) {
    $query_delete = \Drupal::database()->delete('sessions');
    $query_delete->condition('sid', $logout);
    $query_delete->execute();
    drupal_set_message(t('User log out successfully.'));
    $response = new RedirectResponse('/admin/config/people/loggedin-users-list');
    $response->send();
  }

}
