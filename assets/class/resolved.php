<?php
  class resolved extends config {
    public $inquiry_id;

    public function __construct($inquiry_id) {
        $this->inquiry_id = $inquiry_id;
    }

    public function updateInquiry() {
        $con = $this->con();
        $sql = "UPDATE `inquiries` SET `status` = 'resolved' WHERE `inquiry_id` = :inquiry_id";
        $data = $con->prepare($sql);
        $data->bindParam(':inquiry_id', $this->inquiry_id);
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
