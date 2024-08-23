<?php
  class deactivate extends config {
    public $member_id;

    public function __construct($member_id) {
        $this->member_id = $member_id;
    }

    public function inactive() {
        $con = $this->con();
        $sql = "UPDATE `members` SET `status` = 'inactive', `updated_at`=NOW() WHERE `member_id` = :member_id";
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
  }
  ?>
