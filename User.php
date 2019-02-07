<?php
require_once "Database.php";

class User extends Database
{

    public function get_users()
    {
        //query
        $sql = "SELECT * FROM users";
        $result = $this->conn->query($sql);

        //initialize an array
        $rows = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
            return $rows;
        } else {
            return $this->conn->error;
        }
    }
    //Select one value from the table using id
    public function get_user($login_id = 1)
    {
        $sql = "SELECT * FROM users WHERE login_id = $login_id";

        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            return $row;
        } else {
            echo $this->conn->error;
        }
    }

    public function insert($username, $password, $firstname, $lastname, $email, $target_dir, $target_file, $tmp_name)
    {
        $sql = "SELECT * FROM users WHERE username = '$username'";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            return "Username is already taken.";
        } else {

            if (move_uploaded_file($tmp_name, $target_file)) {

                $sql = "INSERT INTO users(username, password, firstname, lastname, email, status, itemPicture) VALUES('$username', '$password', '$firstname', '$lastname', '$email', 1, '$target_file')";
                $result = $this->conn->query($sql);
            } else {

                $loginID = $this->conn->insert_id;

                echo "Error uploading file";
            }
            if ($result) {
                header("Location: userlist.php");
            } else {
                echo $this->conn->error;
            }
        }
    }

    public function update($id, $username, $password, $firstname, $lastname, $email)
    {
        $sql = "SELECT * FROM users WHERE username = '$username' AND user_id != $id";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            echo "Username is already taken.";
        } else {
            $sql = "UPDATE users SET username='$username', password='$password', firstname='$firstname', lastname='$lastname', email='$email' WHERE user_id=$id";
            $result = $this->conn->query($sql);

            if ($result) {
                header("Location: userlist.php");
            } else {
                echo $this->conn->error;
            }
        }
    }

    //Variable
    // : - colon
    // ; - semi-colon
    // / forward slash
    // \ back slash
    // < - less than > - greater than
    // - dash
    // -> arrow
    // => array arrow
}
