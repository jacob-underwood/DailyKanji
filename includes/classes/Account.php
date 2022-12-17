<?php
use Vtiful\Kernel\Format;

class Account
{

    private $connection;
    private $errorArray;

    public function __construct($connection)
    {
        $this->connection = $connection;
        $this->errorArray = array();
    }

    /**
     * Puts user data into database after validating information.
     * @param string $email
     * @param string $password
     * @return bool True if successful.
     */
    public function register($email, $password)
    {
        $this->validateEmail($email);
        $this->validatePassword($password);

        if (empty($this->errorArray)) {
            return true;
        } else {
            return false;
        }
    }

    private function insertIntoDatabase($email, $password)
    {
        $encryptedPassword = md5($password);
        $today = date();

        $result = mysqli_query($this->connection, "INSERT INTO users (id, email, password, dateJoined, profilePicture) VALUES ('', '$email', '$password');");
    }

    /**
     * Returns the error to check if it is in $errorArray, else returns an empty span element.
     * @param string $errorToCheck From Constants class.
     * @return string Span element containing $errorToCheck.
     */
    public function getError($errorToCheck)
    {

        if (in_array($errorToCheck, $this->errorArray)) {
            $error = $errorToCheck;
        } else {
            $error = '';
        }

        return "<span class='error-message'>$error</span>";
    }

    /**
     * Makes sure email is in length restrictions, not invalid, and not a repeat.
     * @param string $email
     * @return void
     */
    private function validateEmail($email)
    {

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

    /**
     * Makes sure password is in length restrictions and not invalid.
     * @param string $password
     * @return void
     */
    private function validatePassword($password)
    {

        if (strlen($password) > 50 || strlen($password) < 5) {
            array_push($this->errorArray, Constants::$passwordLength);
            return;
        }

        if (preg_match('/[^A-Za-z0-9!.,-]/', $password)) {
            array_push($this->errorArray, Constants::$passwordInvalid);
            return;
        }

    }

}

?>