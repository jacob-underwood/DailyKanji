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

    public function loginAttempt($email, $password)
    {
        $encryptedPassword = md5($password);

        $checkUserQuery = mysqli_query($this->connection, "SELECT * FROM users WHERE email = '$email' AND password = '$encryptedPassword';");

        if (mysqli_num_rows($checkUserQuery)) {
            return true;
        } else {
            array_push($this->errorArray, Constants::$loginUnsuccessful);

        }
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
            return $this->insertIntoDatabase($email, $password);
        } else {
            return false;
        }
    }

    /**
     * Inserts email and password into users database, along with their date of joining and a default profile picture.
     * Encrypts password using md5.
     * @param string $email
     * @param string $password
     * @return bool|mysqli_result True if successful insert.
     */
    private function insertIntoDatabase($email, $password)
    {
        $encryptedPassword = md5($password);
        $today = date('Y-m-d');

        $successfulUserQuery = mysqli_query($this->connection, "INSERT INTO users (id, email, password, dateJoined, profilePicture) VALUES ('', '$email', '$encryptedPassword', '$today', 'assets/images/default-profile-picture.jpeg');");

        return $successfulUserQuery;
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

        if (strlen($email) > 100 || strlen($email) < 5) {
            array_push($this->errorArray, Constants::$emailLength);
            return;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($this->errorArray, Constants::$emailInvalid);
            return;
        }

        // Check if email already exists in users table.
        $checkEmailQuery = mysqli_query($this->connection, "SELECT email FROM users WHERE email = '$email';");

        if (mysqli_num_rows($checkEmailQuery)) {
            array_push($this->errorArray, Constants::$emailAlreadyExists);
            return;
        }

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