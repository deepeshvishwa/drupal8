<?php
namespace Drupal\user_step1\Controller;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
/**
 * Class amNewsletterUpdateForm.
 *
 */
class UserStep1PageController extends FormBase {
  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'user_step1_page';
  }
  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    //try{
        $form['professional_category'] = array (
          '#type' => 'select',
          '#title' => ('Professional'),
          //'#default_value' => 1,
          '#options' => array('Female' => t('Female'), 'male' => t('Male'),),
        );

        $form['personal_category'] = array (
          '#type' => 'select',
          '#title' => ('Personal'),
          //'#default_value' => 1,
          '#options' => array( 'Female' => t('Female'), 'male' => t('Male'), ),
        );

        $form['actions']['#type'] = 'actions';

        $form['actions']['reset'] =  array('#type' => 'reset', '#value' => $this->t('Skip'),);
        $form['actions']['submit'] = array('#type' => 'submit','#value' => $this->t('Next'), '#button_type' => 'primary',);
      //} catch (Exception $e) {
       //   drupal_set_message($e."Some error occured","error");
     // }
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
