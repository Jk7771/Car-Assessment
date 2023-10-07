<?php
class User {
    private $user_id;
    private $error; 

    public function authenticate($username, $password) {
        global $db;

        try {
            $query = "SELECT * FROM userregistration WHERE username = :username AND password = :password";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->bindParam(':password', $password, PDO::PARAM_STR);
            $stmt->execute();

            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user) {
                $this->user_id = $user['user_id'];
                return true;
            } else {
                $this->error = "Invalid username or password";
                return false;
            }
        } catch (PDOException $e) {
            $this->error = "Database error: " . $e->getMessage();
            return false;
        }
    }
  

    public function registerUser($username, $email, $password) {
        global $db;

        try {
           
            $checkQuery = "SELECT COUNT(*) FROM userregistration WHERE username = :username";
            $stmt = $db->prepare($checkQuery);
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->execute();

            if ($stmt->fetchColumn() > 0) {
                $this->error = "Username already exists.";
                return false;
            }

            // Insert the new user data into the table
            $insertQuery = "INSERT INTO userregistration (username, email, password) VALUES (:username, :email, :password)";
            $stmt = $db->prepare($insertQuery);
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':password', $password, PDO::PARAM_STR);

            if ($stmt->execute()) {
              
                return true;
            } else {
                $this->error = "Database error: Unable to register the user.";
                return false;
            }
        } catch (PDOException $e) {
            $this->error = "Database error: " . $e->getMessage();
            return false;
        }
    }


    public function getUserId() {
        return $this->user_id;
    }

    public function getError() {
        return $this->error;
    }
}
?>