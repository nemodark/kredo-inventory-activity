<?php
require_once "Database.php";

class User extends Database
{


    public function get_user_course($user_id){
        $sql = "SELECT * FROM user_course 
                INNER JOIN courses ON user_course.course_id=courses.course_id 
                WHERE user_course.user_id=$user_id";
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
}
