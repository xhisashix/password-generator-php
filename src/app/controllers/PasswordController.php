<?php
require_once 'app/models/PasswordModel.php';

class PasswordController
{
  public function handle()
  {
    $model = new PasswordModel();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $length = $_POST['length'];
      $includeLowercase = isset($_POST['includeLowercase']);
      $includeUppercase = isset($_POST['includeUppercase']);
      $includeNumbers = isset($_POST['includeNumbers']);
      $includeSymbols = isset($_POST['includeSymbols']);
      $password = $model->generatePassword($length, $includeLowercase, $includeUppercase, $includeNumbers, $includeSymbols);
      include 'app/views/password_result.php';
    } else {
      include 'app/views/password_form.php';
    }
  }
}
