<?php

namespace Drupal\login_terms\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class LoginTermsForm.
 */
class LoginTermsForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'login_terms.loginterms',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'login_terms_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('login_terms.loginterms');
    $form['login_terms_and_condition'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Login Terms and Condition'),
      '#default_value' => $config->get('login_terms_and_condition'),
    ];
    $form['terms_and_condition'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Terms and condition'),
      '#description' => $this->t('This is terms and condition after form page.'),
      '#default_value' => $config->get('terms_and_condition'),
    ];
    return parent::buildForm($form, $form_state);
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
    parent::submitForm($form, $form_state);

    $this->config('login_terms.loginterms')
      ->set('login_terms_and_condition', $form_state->getValue('login_terms_and_condition'))
      ->set('terms_and_condition', $form_state->getValue('terms_and_condition'))
      ->save();
  }

}
