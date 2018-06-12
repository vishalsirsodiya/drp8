<?php

namespace Drupal\login_terms\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class LoginTermsPageForm.
 */
class LoginTermsPageForm extends FormBase {


  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'login_terms_page_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $login_terms_body = \Drupal::config('login_terms.loginterms')->get('terms_and_condition');
    $form['login_terms_and_condition'] = [
      '#type' => 'details',
      '#title' => $this->t('Terms and condition'),
      '#weight' => '0',
      '#description' => t($login_terms_body),
      '#open' => TRUE, // Controls the HTML5 'open' attribute. Defaults to FALSE.
    ];
    $form['back'] = [
      '#type' => 'submit',
      '#title' => $this->t('Cancel'),
      '#default_value' => $this->t('Cancel'),
      '#weight' => '0',
    ];
    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Agree'),
      '#default_value' => $this->t('Agree'),
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Display result.
    foreach ($form_state->getValues() as $key => $value) {
      drupal_set_message($key . ': ' . $value);
    }

  }

}
