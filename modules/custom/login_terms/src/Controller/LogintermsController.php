<?php

namespace Drupal\login_terms\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class LogintermsController.
 */
class LogintermsController extends ControllerBase {

  /**
   * Login_terms_page.
   *
   * @return string
   *   Return Hello string.
   */
  public function login_terms_page() {
    $login_terms_body = \Drupal::config('login_terms.loginterms')->get('terms_and_condition');
    return [
      '#theme' => 'login_terms',
      '#test_var' => $this->t($login_terms_body),
    ];
  }

}
