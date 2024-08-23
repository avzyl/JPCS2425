<?php
class edit extends config {
    public $member_id;

    public function __construct($member_id) {
        $this->member_id = $member_id;
    }

    public function editStatus() {
        $con = $this->con();
        $sql = "UPDATE `members` SET `status` = 'active', `updated_at`=NOW() WHERE `member_id` = :member_id";
        $data = $con->prepare($sql);
        $data->bindParam(':member_id', $this->member_id);
        if ($data->execute()) {
            return true;
        } else {
            // Output error info for debugging
            var_dump($data->errorInfo());
            return false;
        }
    }

//   Member
    public function updateMember($member_id) {
        $con = $this->con();
        if ($con) {
            $sql = "UPDATE members SET name = :name, student_no = :student_no, email = :email, join_date = :join_date, status = :status WHERE member_id = :member_id";
            $data = $con->prepare($sql);
            $data->bindParam(':name', $this->name);
            $data->bindParam(':student_no', $this->student_no);
            $data->bindParam(':email', $this->email);
            $data->bindParam(':join_date', $this->join_date);
            $data->bindParam(':status', $this->status);
            $data->bindParam(':member_id', $member_id);
            return $data->execute();
        } else {
            return false;
        }
    }


}
 ?>
