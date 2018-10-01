<?php
namespace Drupal\user_step1\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class UserStep1Form extends FormBase {

  public function getFormId() {
    return 'user_step1_form';
  }
  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
        $form['#theme'] = 'user_step1_form';

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
          '#options' => array( 'Female' => t('Female1'), 'male' => t('Male1'), ),
        );

        $form['actions']['#type'] = 'actions';

        $form['actions']['reset'] =  array('#type' => 'reset', '#value' => $this->t('Skip'),);
        $form['actions']['submit'] = array('#type' => 'submit','#value' => $this->t('Next'), '#button_type' => 'primary',);

    return $form;
  }
  /**
   * {@inheritdoc}

  public function validateForm(array &$form, FormStateInterface $form_state) {
    //parent::validateForm($form, $form_state);
  }
 */
  /**
   * {@inheritdoc}

  public function submitForm(array &$form, FormStateInterface $form_state) {
    //parent::submitForm($form, $form_state);

  }*/
}
