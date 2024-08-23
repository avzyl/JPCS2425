<?php
require_once 'config.php';

class insert extends config {
    public $name;
    public $student_no;
    public $email;
    public $join_date;
    public $status;
    public $department;
    public $description;
    public $start_date;
    public $end_date;
    public $message;

    // Constructor for member insertion
    public function __construct($name = null, $student_no = null, $email = null, $join_date = null, $status = 'active') {
        $this->name = $name;
        $this->student_no = $student_no;
        $this->email = $email;
        $this->join_date = $join_date;
        $this->status = $status;
    }

    // Method to insert a member
    public function insertMember() {
        $con = $this->con();
        if ($con) {
            $sql = "INSERT INTO members (name, student_no, email, join_date, status) VALUES (:name, :student_no, :email, :join_date, :status)";
            $data = $con->prepare($sql);
            $data->bindParam(':name', $this->name);
            $data->bindParam(':student_no', $this->$student_no);
            $data->bindParam(':email', $this->email);
            $data->bindParam(':join_date', $this->join_date);
            $data->bindParam(':status', $this->status);
            return $data->execute();
        } else {
            return false;
        }
    }

    // Method to insert a collaboration
    // public function insertCollaboration($name, $department, $description, $start_date, $end_date, $status = 'ongoing') {
    //     $con = $this->con();
    //     if ($con) {
    //         $sql = "INSERT INTO collaborations (name, department, description, start_date, end_date, status) VALUES (:name, :department, :description, :start_date, :end_date, :status)";
    //         $data = $con->prepare($sql);
    //         $data->bindParam(':name', $name);
    //         $data->bindParam(':department', $department);
    //         $data->bindParam(':description', $description);
    //         $data->bindParam(':start_date', $start_date);
    //         $data->bindParam(':end_date', $end_date);
    //         $data->bindParam(':status', $status);
    //         return $data->execute();
    //     } else {
    //         return false;
    //     }
    // }

    // Method to insert an inquiry
    public function insertInquiry($name, $email, $dept, $message) {
        $con = $this->con();
        if ($con) {
            $sql = "INSERT INTO inquiries (name, email, dept, message) VALUES (:name, :email, :dept, :message)";
            $data = $con->prepare($sql);
            $data->bindParam(':name', $name);
            $data->bindParam(':email', $email);
            $data->bindParam(':dept', $dept);
            $data->bindParam(':message', $message);
            return $data->execute();
        } else {
            return false;
        }
    }
}
?>
