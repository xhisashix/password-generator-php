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
    $includeLowercase = isset($_POST['includeLowercase']);
    $includeUppercase = isset($_POST['includeUppercase']);
    $includeNumbers = isset($_POST['includeNumbers']);
    $includeSymbols = isset($_POST['includeSymbols']);

    $option = [
      'useUppercase' => $includeUppercase,
      'useLowercase' => $includeLowercase,
      'useNumbers' => $includeNumbers,
      'useSymbols' => $includeSymbols,
    ];

    $password = $model->generatePassword($length, $option);
    $this->showResult($password);
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
