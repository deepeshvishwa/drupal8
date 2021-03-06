<?php
namespace Drupal\user_step1\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\user\Entity\User;
class UserStep1Form extends FormBase {

  public function getFormId() {
    return 'user_step1_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

$user_load = User::load(\Drupal::currentUser()->id());

//$email = $user_load->get('mail')->value;
//$name = $user_load->get('name')->value;
//$full_name = $user_load->get('field_fullname')->value;
//$mobile = $user_load->get('field_mobile_number')->value;

//$picture = ['#theme' => 'image_style', '#style_name' => 'image_64x64', '#uri' => $user_load->get('user_picture')->entity->url(),];
//$picture = $picture['#uri'];

//print"DEEP----<pre>";
//print_r($picture);
/*
    $form['user_fullname'] = array(
      '#type' => 'markup',
      '#markup' => $full_name,
    );

    $form['user_picture'] = array(
      '#type' => 'markup',
      '#markup' => $picture,
    );
*/
    $form['professional_category'] = array (
      '#type' => 'select',
      '#title' => ('Professional'),
      '#options' => array('Female' => t('Female'), 'male' => t('Male'),),
    );

    $form['personal_category'] = array (
      '#type' => 'select',
      '#title' => ('Personal'),
      '#options' => array( 'Female' => t('Female1'), 'male' => t('Male1'), ),
    );

    $form['button'] =  array('#type' => 'button', '#value' => $this->t('Skip'),);
    $form['submit'] = array('#type' => 'submit','#value' => $this->t('Next'), '#button_type' => 'primary',);

    return $form;
  }

  /**
   * {@inheritdoc}
  */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    //parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
  */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    //parent::submitForm($form, $form_state);

  }
}
