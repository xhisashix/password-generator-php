<?php
class PasswordModel
{
  /**
   * Generates a password based on the provided criteria.
   *
   * @param int $length The length of the password to generate.
   * @param bool $includeLowercase Whether to include lowercase letters in the password.
   * @param bool $includeUppercase Whether to include uppercase letters in the password.
   * @param bool $includeNumbers Whether to include numbers in the password.
   * @param bool $includeSymbols Whether to include symbols in the password.
   * @return string The generated password.
   * @throws Exception Thrown if no character sets are selected for password generation.
   */
  public function generatePassword($length, $includeLowercase, $includeUppercase, $includeNumbers, $includeSymbols)
  {
    $lowercase = 'abcdefghijklmnopqrstuvwxyz';
    $uppercase = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $numbers = '0123456789';
    $symbols = '!@#$%^&*()_-=+;:,.?';

    $chars = '';
    if ($includeLowercase) {
      $chars .= $lowercase;
    }
    if ($includeUppercase) {
      $chars .= $uppercase;
    }
    if ($includeNumbers) {
      $chars .= $numbers;
    }
    if ($includeSymbols) {
      $chars .= $symbols;
    }

    if (empty($chars)) {
      throw new Exception('No character sets selected for password generation.');
    }
    $password = '';
    for ($i = 0; $i < $length; $i++) {
      $password .= $chars[random_int(0, strlen($chars) - 1)];
    }
    return $password;
  }
}
