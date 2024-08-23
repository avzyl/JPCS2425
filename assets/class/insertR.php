<?php
require_once 'config.php';

class insertR extends config {
    public $receipt_no;
    public $name;
    public $student_no;
    public $email;
    public $items;
    public $notes;

    // Constructor for receipt insertion
    public function __construct($receipt_no = null, $name = null, $student_no = null, $email = null, $items = [], $notes = null) {
        $this->receipt_no = $receipt_no;
        $this->name = $name;
        $this->student_no = $student_no;
        $this->email = $email;
        $this->items = $items;
        $this->notes = $notes;
    }

    // Method to insert a receipt
    public function insertReceipt() {
        $con = $this->con();
        if ($con) {
            try {
                // Start a transaction
                $con->beginTransaction();

                // Insert receipt
                $sql = "INSERT INTO receipts (receipt_no, student_no, notes) VALUES (:receipt_no, :student_no, :notes)";
                $stmt = $con->prepare($sql);
                $stmt->bindParam(':receipt_no', $this->receipt_no);
                $stmt->bindParam(':student_no', $this->student_no);
                $stmt->bindParam(':notes', $this->notes);
                $stmt->execute();

                // Get the ID of the inserted receipt
                $receipt_id = $con->lastInsertId();

                // Insert items
                foreach ($this->items as $item) {
                    $sql = "INSERT INTO receipt_items (receipt_id, item, price, quantity, total) VALUES (:receipt_id, :item, :price, :quantity, :total)";
                    $stmt = $con->prepare($sql);
                    $stmt->bindParam(':receipt_id', $receipt_id);
                    $stmt->bindParam(':item', $item['item']);
                    $stmt->bindParam(':price', $item['price']);
                    $stmt->bindParam(':quantity', $item['quantity']);
                    $stmt->bindParam(':total', $item['total']);
                    $stmt->execute();
                }

                // Commit the transaction
                $con->commit();
            } catch (Exception $e) {
                // Rollback the transaction on error
                $con->rollBack();
                throw $e; // Or handle the exception as needed
            }
        }
    }
}
?>
