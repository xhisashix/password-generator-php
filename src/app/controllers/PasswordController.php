<?php
require_once 'app/models/PasswordModel.php';

class PasswordController
{
  public function handle()
  {
    $model = new PasswordModel();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $length = $_POST['length'];
      $password = $model->generatePassword($length);
      include 'app/views/password_result.php';
    } else {
      include 'app/views/password_form.php';
    }
  }
}
