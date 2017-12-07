<?php
/**
 * Created by PhpStorm.
 * User: Huu Ty
 * Date: 22/09/2017
 * Time: 5:07 PM
 */

namespace App\Models;


use App\Mail;
use Core\Model;
use App\Token;
use Core\View;
use mysqli;
use PDO;

class User extends Model
{
    public $errors = [];

    /**
     * User constructor.
     */
    public function __construct($data = [])
    {
        foreach ($data as $key => $value) {
            $this->$key = $value;
        }
    }

    public static function emailExists($email, $ignore_id = null)
    {
//        $sql = 'SELECT * FROM users WHERE email = :email';
//
//        $db = static::getDB();
//        $stmt = $db->prepare($sql);
//        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
//
//        $stmt->execute();
//
//        return $stmt->fetch() !== false;
        $user = static::findByEmail($email);

        if ($user) {
            if ($user->id != $ignore_id) {
                return true;
            }
        }
        return false;
    }

    public function save()
    {
        $this->validate();
        if (empty($this->errors)) {
            /*Them hinh anh */
            if ($_FILES['hinhAnh']) {
                $file_max_weight = 1000000; //limit the maximum size of file allowed (20Mb)
                $ok_ext = array('jpg', 'png', 'gif', 'jpeg'); // allow only these types of files
                $destination = '../public/images/AnhDaiDien/'; // where our files will be stored
                $file = $_FILES['hinhAnh'];
                $fileNewName = '';
                if (!isset($_FILES['hinhAnh']['error']) ||
                    is_array($_FILES['hinhAnh']['error'])
                ) {
                    throw new \RuntimeException('Invalid parameters.');
                } else {
                    $filename = explode(".", $file["name"]);
                    $file_name = $file['name']; // file original name
                    $file_name_no_ext = isset($filename[0]) ? $filename[0] : null; // File name without the extension
                    $file_extension = $filename[count($filename) - 1];
                    $file_weight = $file['size'];
                    $file_type = $file['type'];
                    if ($file['error'] == 0) {
                        // check if the extension is accepted
                        if (in_array($file_extension, $ok_ext)):

                            // check if the size is not beyond expected size
                            if ($file_weight <= $file_max_weight):


                                // rename the file
                                $fileNewName = md5($file_name_no_ext[0] . microtime()) . '.' . $file_extension;


                                // and move it to the destination folder
                                if (move_uploaded_file($file['tmp_name'], $destination . $fileNewName)):

                                    echo " File uploaded !";

                                else:

                                    echo "can't upload file.";

                                endif;


                            else:

                                echo "File too heavy.";

                            endif;
                        else:

                            echo "File type is not supported.";

                        endif;
                    }
                }
            }
            /* Ma hoa mat khau MD5 */
            $password_hash = password_hash($this->password, PASSWORD_DEFAULT);
            $token = new Token();
            $hash_token = $token->getHash();
            $this->activation_token = $token->getValue();
            $sql = 'INSERT INTO users (name, email, password_hash,activation_hash,is_active, HinhAnh)
            VALUES (:name, :email, :password_hash, :activation_hash, :is_active,:hinhAnh)';
            $db = static::getDB();
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':name', $this->name, PDO::PARAM_STR);
            $stmt->bindValue(':email', $this->email, PDO::PARAM_STR);
            $stmt->bindValue(':password_hash', $password_hash, PDO::PARAM_STR);
            $stmt->bindValue(':activation_hash', $hash_token, PDO::PARAM_STR);
            $stmt->bindValue(':is_active', 1, PDO::PARAM_INT);
            $stmt->bindValue(':hinhAnh', $fileNewName, PDO::PARAM_STR);
            return $stmt->execute();
        }
        return false;
    }

    public function validate()
    {
        if ($this->name == '') {
            $this->errors[] = 'Name is required';
        }

        // email address
        if (filter_var($this->email, FILTER_VALIDATE_EMAIL) === false) {
            $this->errors[] = 'Invalid email';
        }
        if (static::emailExists($this->email, $this->id ?? null)) {
            $this->errors[] = 'email already taken';
        }

//        if (isset($this->password)) {
//            if (strlen($this->password) < 6) {
//                $this->errors[] = 'Please enter at least 6 characters for the password';
//            }
//
//            if (preg_match('/.*[a-z]+.*/i', $this->password) == 0) {
//                $this->errors[] = 'Password needs at least one letter';
//            }
//
//            if (preg_match('/.*\d+.*/i', $this->password) == 0) {
//                $this->errors[] = 'Password needs at least one number';
//            }
//        }
        // Password

    }

    public static function findByEmail($email)
    {
        $sql = 'SELECT * FROM users WHERE email =:email';
        $db = static::getDB();
        $stmt = $db->prepare($sql);
//        $stmt->setFetchMode(PDO::FETCH_CLASS, 'App\Models\User');
        $stmt->setFetchMode(PDO::FETCH_CLASS, get_called_class());
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch();
    }

    public static function findByID($id)
    {
        $sql = 'SELECT * FROM users WHERE id =:id';
        $db = static::getDB();
        $stmt = $db->prepare($sql);
//        $stmt->setFetchMode(PDO::FETCH_CLASS, 'App\Models\User');
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->setFetchMode(PDO::FETCH_CLASS, get_called_class());

        $stmt->execute();
        return $stmt->fetch();
    }

    public static function authenticate($email, $password)
    {
        $user = static::findByEmail($email);
        if ($user && $user->is_active) {
            if (password_verify($password, $user->password_hash)) {
                return $user;
            }
            return false;

        }
    }

    public function rememberLogin()
    {
        $token = new Token();
        $hashed_token = $token->getHash();
        $this->remember_token = $token->getValue();

        //$expiry_timestamp = time() + 60 * 60 * 24 * 30;  // 30 days from now
        $this->expiry_timestamp = time() + 60 * 60 * 24 * 30;  // 30 days from now

        $sql = 'INSERT INTO remembered_logins (token_hash, user_id, expires_at)
                VALUES (:token_hash, :user_id, :expires_at)';

        $db = static::getDB();
        $stmt = $db->prepare($sql);

        $stmt->bindValue(':token_hash', $hashed_token, PDO::PARAM_STR);
        $stmt->bindValue(':user_id', $this->id, PDO::PARAM_INT);
        //$stmt->bindValue(':expires_at', date('Y-m-d H:i:s', $expiry_timestamp), PDO::PARAM_STR);
        $stmt->bindValue(':expires_at', date('Y-m-d H:i:s', $this->expiry_timestamp), PDO::PARAM_STR);

        return $stmt->execute();
    }

    public static function sendPasswordReset($email)
    {
        $user = static::findByEmail($email);

        if ($user) {

            if ($user->startPasswordReset()) {

                // Send email here...
                $user->sendPasswordResetEmail();
            }
        }
    }

    /**
     * Start the password reset process by generating a new token and expiry
     *
     * @return void
     */
    protected function startPasswordReset()
    {
        $token = new Token();
        $hashed_token = $token->getHash();
        $this->password_reset_token = $token->getValue();
        $expiry_timestamp = time() + 60 * 60 * 2;  // 2 hours from now

        $sql = 'UPDATE users
                SET password_reset_hash = :token_hash,
                    password_reset_expires_at = :expires_at
                WHERE id = :id';

        $db = static::getDB();
        $stmt = $db->prepare($sql);

        $stmt->bindValue(':token_hash', $hashed_token, PDO::PARAM_STR);
        $stmt->bindValue(':expires_at', date('Y-m-d H:i:s', $expiry_timestamp), PDO::PARAM_STR);
        $stmt->bindValue(':id', $this->id, PDO::PARAM_INT);

        return $stmt->execute();
    }

    protected function sendPasswordResetEmail()
    {
        $url = 'http://' . $_SERVER['HTTP_HOST'] . '/password/reset/' . $this->password_reset_token;

        $text = View::getTemplate('Password/reset_email.txt', ['url' => $url]);
        $html = View::getTemplate('Password/reset_email.html', ['url' => $url]);

        Mail::send($this->email, 'Password reset', $text, $html);
    }

    public static function findByPasswordReset($token)
    {
        $token = new Token($token);
        $hashed_token = $token->getHash();

        $sql = 'SELECT * FROM users WHERE
password_reset_hash =:token_hash';

        $db = static::getDB();
        $stmt = $db->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_CLASS, get_called_class());
        $stmt->bindValue(':token_hash', $hashed_token, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch();
        if ($user) {
            if (strtotime($user->password_reset_expires_at) > time()) {
                return $user;
            }
        }
    }

    public function resetPassword($password)
    {
        $this->password = $password;

        $this->validate();

        if (empty($this->errors)) {

            $password_hash = password_hash($this->password, PASSWORD_DEFAULT);

            $sql = 'UPDATE users
                    SET password_hash = :password_hash,
                        password_reset_hash = NULL,
                        password_reset_expires_at = NULL
                    WHERE id = :id';

            $db = static::getDB();
            $stmt = $db->prepare($sql);

            $stmt->bindValue(':id', $this->id, PDO::PARAM_INT);
            $stmt->bindValue(':password_hash', $password_hash, PDO::PARAM_STR);

            return $stmt->execute();
        }

        return false;
    }

    public function sendActivationEmail()
    {
        $url = 'http://' . $_SERVER['HTTP_HOST'] . '/signup/activate/' . $this->activation_token;

        $text = View::getTemplate('Signup/activation_email.txt', ['url' => $url]);
        $html = View::getTemplate('Signup/activation_email.html', ['url' => $url]);

        Mail::send($this->email, 'Account activation', $text, $html);
    }

    public static function activate($value)
    {
        $token = new Token($value);
        $hashed_token = $token->getHash();

        $sql = 'UPDATE users
                SET is_active = 1,
                    activation_hash = null
                WHERE activation_hash = :hashed_token';

        $db = static::getDB();
        $stmt = $db->prepare($sql);

        $stmt->bindValue(':hashed_token', $hashed_token, PDO::PARAM_STR);

        $stmt->execute();
    }

    public function updateProfile($data)
    {
        $this->name = $data['name'];
        $this->email = $data['email'];

        // Only validate and update the password if a value provided
        if ($data['password'] != '') {
            $this->password = $data['password'];
        }

        $this->validate();
        if (empty($this->errors)) {
            $file_max_weight = 1000000; //limit the maximum size of file allowed (20Mb)
            $ok_ext = array('jpg', 'png', 'gif', 'jpeg'); // allow only these types of files
            $destination = '../public/images/AnhDaiDien/'; // where our files will be stored
            $file = $_FILES['hinhAnh'];
            $fileNewName = '';
            if (!isset($_FILES['hinhAnh']['error']) ||
                is_array($_FILES['hinhAnh']['error'])
            ) {
                throw new \RuntimeException('Invalid parameters.');
            } else {
                $filename = explode(".", $file["name"]);
                $file_name = $file['name']; // file original name
                $file_name_no_ext = isset($filename[0]) ? $filename[0] : null; // File name without the extension
                $file_extension = $filename[count($filename) - 1];
                $file_weight = $file['size'];
                $file_type = $file['type'];
                if ($file['error'] == 0) {
                    // check if the extension is accepted
                    if (in_array($file_extension, $ok_ext)):

                        // check if the size is not beyond expected size
                        if ($file_weight <= $file_max_weight):


                            // rename the file
                            $fileNewName = md5($file_name_no_ext[0] . microtime()) . '.' . $file_extension;


                            // and move it to the destination folder
                            if (move_uploaded_file($file['tmp_name'], $destination . $fileNewName)):

                                echo " File uploaded !";

                            else:

                                echo "can't upload file.";

                            endif;


                        else:

                            echo "File too heavy.";

                        endif;


                    else:

                        echo "File type is not supported.";

                    endif;
                }
            }
            $sql = 'UPDATE users
                    SET name = :name,
                        email = :email, hinhanh =:hinhAnh';

            // Add password if it's set
            if (isset($this->password)) {
                $sql .= ', password_hash = :password_hash';
            }

            $sql .= "\nWHERE id = :id";


            $db = static::getDB();
            $stmt = $db->prepare($sql);

            $stmt->bindValue(':name', $this->name, PDO::PARAM_STR);
            $stmt->bindValue(':email', $this->email, PDO::PARAM_STR);
            $stmt->bindValue(':id', $this->id, PDO::PARAM_INT);
            $stmt->bindValue(':hinhAnh', $fileNewName, PDO::PARAM_STR);
            // Add password if it's set
            if (isset($this->password)) {

                $password_hash = password_hash($this->password, PASSWORD_DEFAULT);
                $stmt->bindValue(':password_hash', $password_hash, PDO::PARAM_STR);

            }

            return $stmt->execute();
        }

        return false;
    }

    public static function getAll()
    {
        $db = static::getDB();
        $stmt = $db->query('SELECT * FROM users');
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function capNhatHoSoQuanLy($maHoSo, $maCapQuanTri)
    {
        $sql = 'UPDATE users
                SET MaHoSo = :mahoso,
                MaCapQuanTri = :maCapQuanTri
                WHERE id = :id';
        $db = static::getDB();
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':id', $this->id, PDO::PARAM_STR);
        $stmt->bindValue(':mahoso', $maHoSo, PDO::PARAM_STR);
        $stmt->bindValue(':maCapQuanTri', $maCapQuanTri, PDO::PARAM_STR);
        $stmt->execute();
    }

    function checkUser($userData = array())
    {
        $dbHost = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbName = "giaphadb";
        $userTbl = 'users';
        if (!isset($this->db)) {
            // Connect to the database
            $conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
            if ($conn->connect_error) {
                die("Failed to connect with MySQL: " . $conn->connect_error);
            } else {
                $this->db = $conn;
            }
        }
        if (!empty($userData)) {
            // Check whether user data already exists in database
            $prevQuery = "SELECT * FROM users WHERE oauth_uid = " . $userData['oauth_uid'];
            $this->db->query("SET NAMES utf8");
            $prevResult = $this->db->query($prevQuery);
            if ($prevResult->num_rows > 0) {
                // Update user data if already exists
                $query = "UPDATE " . $userTbl . " SET name ='" . $userData['first_name'] . "' WHERE oauth_uid = '" . $userData['oauth_uid'] . "'";
                $update = $this->db->query($query);
            } else {
                // Insert user data
                $sql = 'INSERT INTO users (name, email, password_hash, oauth_uid)
                VALUES (:name, :email, 1, :oauth_uid)';
                $db = static::getDB();
                $stmt = $db->prepare($sql);
                $stmt->bindValue(':name', $userData['first_name'] . " " . $userData['last_name'], PDO::PARAM_STR);
                $stmt->bindValue(':email', $userData['email'], PDO::PARAM_STR);
                $stmt->bindValue(':oauth_uid', $userData['oauth_uid'], PDO::PARAM_STR);
                $stmt->execute();
            }

            // Get user data from the database
            $result = $this->db->query($prevQuery);
            $userData = $result->fetch_assoc();

        }
        // Return user data
        return $userData;
    }

}