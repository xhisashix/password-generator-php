<?php
require_once 'app/models/PasswordModel.php';

class PasswordController
{
  public function handle()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $this->processForm();
    } else {
      $this->showForm();
    }
  }

  /**
   * Process the form submission and generate the password.
   */
  private function processForm()
  {
    $model = new PasswordModel();
    $length = $_POST['length'];
    $includeLowercase = $_POST['includeLowercase'];
    $includeUppercase = $_POST['includeUppercase'];
    $includeNumbers = $_POST['includeNumbers'];
    $includeSymbols = $_POST['includeSymbols'];
    $generateCount = $_POST['generateCount'];

    $options = [
      'useUppercase' => $includeUppercase,
      'useLowercase' => $includeLowercase,
      'useNumbers' => $includeNumbers,
      'useSymbols' => $includeSymbols,
      'generateCount' => $generateCount,
    ];
    $passwords = $model->generatePassword($length, $options, $generateCount);
    $this->showResult($passwords);
  }

  /**
   * Show the password generation form.
   */
  private function showForm()
  {
    include 'app/views/password_form.php';
  }

  /**
   * Show the generated password result.
   *
   * @param string $password The generated password.
   */
  private function showResult($password)
  {
    include 'app/views/password_result.php';
  }
}
