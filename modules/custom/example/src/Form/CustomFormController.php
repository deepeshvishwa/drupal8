<?php
namespace Drupal\example\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Component\Utility\UrlHelper;

/**
 * Contribute form.
 */
class CustomFormController extends FormBase {

  public function getFormId() {
    return 'custom_form';
  }

  public function buildForm(array $form, FormStateInterface $form_state) {
    $account = \Drupal\user\Entity\User::load(\Drupal::currentUser()->id());

    $mail = $account->mail->value;
    $fullname = $account->field_fullname->value;
    $gender = $account->field_gender->value;
    $above18 = $account->field_are_you_above_18_years_old->value;
    $dob = $account->field_date_of_birth->value;
    $mobile = $account->field_mobile_number->value;
    $sendacopy = $account->field_send_me_a_copy_of_the_appl->value;

    $form['candidate_name'] = array(
      '#type' => 'textfield',
      '#title' => t('Candidate Name:'),
      '#value' => $fullname,
      '#required' => TRUE,
    );
    $form['candidate_mail'] = array(
      '#type' => 'email',
      '#title' => t('Email ID:'),
      '#value' => $mail,
      '#required' => TRUE,
    );
    $form['candidate_number'] = array (
      '#type' => 'tel',
      '#title' => t('Mobile no'),
    );
    $form['candidate_dob'] = array (
      '#type' => 'date',
      '#title' => t('DOB'),
      '#required' => TRUE,
    );
    $form['candidate_gender'] = array (
      '#type' => 'select',
      '#title' => ('Gender'),
      '#default_value' => 1,
      '#options' => array(
        'Female' => t('Female'),
        'male' => t('Male'),
      ),
    );
    $form['candidate_confirmation'] = array (
      '#type' => 'radios',
      '#title' => ('Are you above 18 years old?'),
      '#default_value' => t($above18),
      '#options' => array(
        'Yes' =>t('Yes'),
        'No' =>t('No')
      ),
    );
    $form['candidate_copy'] = array(
      '#type' => 'checkbox',
      '#title' => t('Send me a copy of the application.'),
    );
    $form['actions']['#type'] = 'actions';
    $form['actions']['submit'] = array(
      '#type' => 'submit',
      '#value' => $this->t('Save'),
      '#button_type' => 'primary',
    );

    return $form;
  }

  public function validateForm(array &$form, FormStateInterface $form_state) {

    if (strlen($form_state->getValue('candidate_name')) < 0) {
        $form_state->setErrorByName('candidate_name', $this->t('Name should not empty.'));
    }

    if (!filter_var($form_state->getValue('candidate_mail', FILTER_VALIDATE_EMAIL))) {
       $form_state->setErrorByName('candidate_mail', $this->t('The Email Address you have provided is invalid.'));
    }
    if (strlen($form_state->getValue('candidate_number')) < 10) {
        $form_state->setErrorByName('candidate_number', $this->t('Mobile number is too short.'));
    }
  }

  public function submitForm(array &$form, FormStateInterface $form_state) {
    drupal_set_message($this->t('Your Email Address is @email', array('@email' => $form_state->getValue('email_address'))));
  }
}
?>
