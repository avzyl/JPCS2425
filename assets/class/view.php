<?php
class view extends config {
    public function countActive() {
        $con = $this->con();
        $sql = "SELECT COUNT(*) as total FROM `members` WHERE `status` = 'active'";
        $data = $con->prepare($sql);
        $data->execute();
        $result = $data->fetch(PDO::FETCH_ASSOC);

        echo "{$result['total']}";
    }

    public function countPendingMembers() {
        $con = $this->con();
        $sql = "SELECT COUNT(*) as total FROM `members` WHERE `status` = 'pending'";
        $data = $con->prepare($sql);
        $data->execute();
        $result = $data->fetch(PDO::FETCH_ASSOC);

        echo "{$result['total']}";
    }

    public function countInquiries() {
        $con = $this->con();
        $sql = "SELECT COUNT(*) as total FROM `inquiries` WHERE `status` = 'pending'";
        $data = $con->prepare($sql);
        $data->execute();
        $result = $data->fetch(PDO::FETCH_ASSOC);

        echo "{$result['total']}";
    }

    public function viewPending() {
        $con = $this->con();
        $sql = "SELECT * FROM `members` WHERE `status` = 'pending'";
        $data = $con->prepare($sql);
        $data->execute();
        $result = $data->fetchAll(PDO::FETCH_ASSOC);

        echo "<h3 class='mb-4 mt-5'>Pending Members</h3>";
        echo "<table class='table table-dark table-striped table-sm'>";
        echo "<thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Department</th>
                    <th>Year and Section</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead><tbody>";

        foreach ($result as $row) {
            echo "<tr>";
            echo "<td>{$row['name']}</td>";
            echo "<td>{$row['email']}</td>";
            echo "<td>{$row['dept']}</td>";
            echo "<td>{$row['program']}</td>";
            echo "<td>{$row['status']}</td>";
            echo "<td>
                    <form method='POST' action='admin.php'>
                        <input type='hidden' name='edit' value='{$row['member_id']}'>
                        <button type='submit' class='btn btn-info btn-sm'>Paid</button>
                    </form>
                    <form method='POST' action='admin.php'>
                        <input type='hidden' name='delete' value='{$row['member_id']}'>
                        <button type='submit' class='btn btn-danger btn-sm'>Delete</button>
                    </form>
                </td>";
            echo "</tr>";
        }

        echo "</tbody></table>";
    }

    public function viewPaid() {
        $con = $this->con();
        $sql = "SELECT * FROM `members` WHERE `status` = 'active'";
        $data = $con->prepare($sql);
        $data->execute();
        $result = $data->fetchAll(PDO::FETCH_ASSOC);

        echo "<h3 class='mb-4 mt-5'>Registered Members</h3>";
        echo "<table class='table table-dark table-striped table-sm'>";
        echo "<thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Department</th>
                    <th>Year and Section</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead><tbody>";

        foreach ($result as $row) {
            echo "<tr>";
            echo "<td>{$row['name']}</td>";
            echo "<td>{$row['email']}</td>";
            echo "<td>{$row['dept']}</td>";
            echo "<td>{$row['program']}</td>";
            echo "<td>{$row['status']}</td>";
            echo "<td>
                    <form method='POST' action='admin.php'>
                        <input type='hidden' name='deactivate' value='{$row['member_id']}'>
                        <button type='submit' class='btn btn-danger btn-sm'>Deactivate</button>
                    </form>
                </td>";
            echo "</tr>";
        }

        echo "</tbody></table>";
    }

    public function viewInactive() {
        $con = $this->con();
        $sql = "SELECT * FROM `members` WHERE `status` = 'inactive'";
        $data = $con->prepare($sql);
        $data->execute();
        $result = $data->fetchAll(PDO::FETCH_ASSOC);

        echo "<h3 class='mb-4 mt-5'>Inactive Members</h3>";
        echo "<table class='table table-dark table-striped table-sm'>";
        echo "<thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Department</th>
                    <th>Year and Section</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead><tbody>";

        foreach ($result as $row) {
            echo "<tr>";
            echo "<td>{$row['name']}</td>";
            echo "<td>{$row['email']}</td>";
            echo "<td>{$row['dept']}</td>";
            echo "<td>{$row['program']}</td>";
            echo "<td>{$row['status']}</td>";
            echo "<td>
                    <form method='POST' action='admin.php'>
                        <input type='hidden' name='edit' value='{$row['member_id']}'>
                        <button type='submit' class='btn btn-danger btn-sm'>Reactivate</button>
                    </form>
                </td>";
            echo "</tr>";
        }

        echo "</tbody></table>";
    }

}
 ?>
