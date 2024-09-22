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
    $chars = $this->getCharacterSet($includeLowercase, $includeUppercase, $includeNumbers, $includeSymbols);
    if (empty($chars)) {
      throw new Exception('No character sets selected for password generation.');
    }
    return $this->generateRandomPassword($length, $chars);
  }

  /**
   * Get the character set based on the provided criteria.
   *
   * @param bool $includeLowercase
   * @param bool $includeUppercase
   * @param bool $includeNumbers
   * @param bool $includeSymbols
   * @return string The character set.
   */
  private function getCharacterSet($includeLowercase, $includeUppercase, $includeNumbers, $includeSymbols)
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
    return $chars;
  }

  /**
   * Generate a random password from the character set.
   *
   * @param int $length
   * @param string $chars
   * @return string The generated password.
   */
  private function generateRandomPassword($length, $chars)
  {
    $password = '';
    for ($i = 0; $i < $length; $i++) {
      $password .= $chars[random_int(0, strlen($chars) - 1)];
    }
    return $password;
  }
}
