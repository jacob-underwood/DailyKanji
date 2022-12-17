<?php
use Vtiful\Kernel\Format;

class Account {

    private $errorArray;

    public function __construct() {
        $this->errorArray = array();
    }

    public function register($email, $password) {
        $this->validateEmail($email);
        $this->validatePassword($password);

        if (empty($this->errorArray)) {
            return true;
        } else {
            return $this->errorArray;
        }
    }

    public function validateEmail($email) {

        if (strlen($email) > 50 || strlen($email) < 5) {
            array_push($this->errorArray, Constants::$emailLength);
            return;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($this->errorArray, Constants::$emailInvalid);
            return;
        }

        // TODO: Check if email already exists.

    }

    public function validatePassword($password) {

        if (strlen($password) > 50 || strlen($password) < 5) {
            array_push($this->errorArray, Constants::$passwordLength);
            return;
        }

        if (preg_match('/[A-Za-z0-9!.,-]/', $password)) {
            array_push($this->errorArray, Constants::$passwordInvalid);
            return;
        }

    }

}

?>