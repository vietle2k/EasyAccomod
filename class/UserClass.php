<?php

/**
 * Class UserClass
 */
class UserClass
{
    /**
     * Xử lý User đăng nhập
     *
     * @param $usernameEmail
     * @param $password
     * @return bool
     */
    public function userLogin($usernameEmail, $password)
    {
        $db = connectDB();
        $hash_password = hash('sha256', $password);
        $stmt = $db->prepare("SELECT id FROM users WHERE  (username=:usernameEmail or email=:usernameEmail) AND  password=:hash_password");
        $stmt->bindParam("usernameEmail", $usernameEmail, PDO::PARAM_STR);
        $stmt->bindParam("hash_password", $hash_password, PDO::PARAM_STR);
        $stmt->execute();
        $count = $stmt->rowCount();
        $data = $stmt->fetch(PDO::FETCH_OBJ);
        $db = null;
        if ($count) {
            $_SESSION['userId'] = $data->id;
            return true;
        } else {
            return false;
        }
    }


    /**
     * User đăng ký
     *
     * @param $username
     * @param $password
     * @param $email
     * @param $name
     * @return bool
     */
    public function userRegistration($username, $password, $email, $name)
    {
        try {
            $db = connectDB();
            $st = $db->prepare("SELECT id FROM users WHERE username=:username OR email=:email");
            $st->bindParam("username", $username, PDO::PARAM_STR);
            $st->bindParam("email", $email, PDO::PARAM_STR);
            $st->execute();
            $count = $st->rowCount();
            if ($count < 1) {
                $stmt = $db->prepare("INSERT INTO users(username,password,email,name) VALUES (:username,:hash_password,:email,:name)");
                $stmt->bindParam("username", $username, PDO::PARAM_STR);
                $hash_password = hash('sha256', $password);
                $stmt->bindParam("hash_password", $hash_password, PDO::PARAM_STR);
                $stmt->bindParam("email", $email, PDO::PARAM_STR);
                $stmt->bindParam("name", $name, PDO::PARAM_STR);
                $stmt->execute();
                $id = $db->lastInsertId();
                $db = null;
                $_SESSION['userId'] = $id;
                return true;

            } else {
                $db = null;
                return false;
            }
        } catch (PDOException $e) {
            echo '{"error":{"text":' . $e->getMessage() . '}}';
        }
    }

    /**
     * User chi tiết
     *
     * @param $id
     * @return mixed
     */
    public function userDetails($id)
    {
        try {
            $db = connectDB();
            $stmt = $db->prepare("SELECT email,username,name FROM users WHERE id=:id");
            $stmt->bindParam("id", $id, PDO::PARAM_INT);
            $stmt->execute();
            $data = $stmt->fetch(PDO::FETCH_OBJ);
            return $data;
        } catch (PDOException $e) {
            echo '{"error":{"text":' . $e->getMessage() . '}}';
        }
    }
}