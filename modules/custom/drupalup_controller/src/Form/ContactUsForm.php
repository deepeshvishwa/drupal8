<?php
namespace Drupal\drupalup_controller\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Contribute form.
*/
class ContactUsForm extends FormBase {

  public function getFormId() {
    return 'contact_us_form';
  }

  public function buildForm(array $form, FormStateInterface $form_state) {

    $form['candidate_name'] = array(
      '#type' => 'textfield',
      '#title' => t('Candidate Name:'),
      //'#value' => $fullname,
      '#required' => TRUE,
    );

    $form['candidate_mail'] = array(
      '#type' => 'email',
      '#title' => t('Email ID:'),
      //'#value' => $mail,
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
      //'#default_value' => t($above18),
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

    //return $form;
/*
    $data1 = array(
      '#theme' => 'contact-us',
      '#title' => 'Contact Us Form',
      '#items' => $form,
    );
*/
    return $form;
  }

  public function validateForm(array &$form, FormStateInterface $form_state) {
/*
    if (strlen($form_state->getValue('candidate_name')) < 0) {
        $form_state->setErrorByName('candidate_name', $this->t('Name should not empty.'));
    }

    if (!filter_var($form_state->getValue('candidate_mail', FILTER_VALIDATE_EMAIL))) {
       $form_state->setErrorByName('candidate_mail', $this->t('The Email Address you have provided is invalid.'));
    }
    if (strlen($form_state->getValue('candidate_number')) < 10) {
        $form_state->setErrorByName('candidate_number', $this->t('Mobile number is too short.'));
    }*/
  }

  public function submitForm(array &$form, FormStateInterface $form_state) {
    //drupal_set_message($this->t('Your Email Address is @email', array('@email' => $form_state->getValue('email_address'))));
  }
}


?>
