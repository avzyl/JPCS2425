<?php
function waiter(){
  insertR();
  deactivate();
  editStatus();
//   inquiry
  insertI();
  delete();
  updateInquiry();
}

// Members
// Define the function insertI
function insertI() {
    if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['message'])) {
        $insert = new insert(); // Instantiate the insert class

        // Attempt to insert inquiry
        if ($insert->insertInquiry($_POST['name'], $_POST['email'], $_POST['dept'], $_POST['message'])) {
            echo '<script>swal("Inquiry Successfully Entered!", "", "success");</script>';
        } else {
            echo '<script>swal("Failed to add inquiry!", "", "error");</script>';
        }
    } else {
        echo '<script>swal("All fields are required!", "", "warning");</script>';
    }
}

function insertR() {
    if (!empty($_POST['name']) && !empty($_POST['student_no']) && !empty($_POST['email']) && !empty($_POST['items'])) {
        // Prepare items data
        $items = [];
        foreach ($_POST['item'] as $index => $item) {
            $items[] = [
                'item' => $item,
                'price' => $_POST['price'][$index],
                'quantity' => $_POST['quantity'][$index],
                'total' => $_POST['total'][$index]
            ];
        }

        $insertR = new insertR(
            $_POST['receipt_no'],
            $_POST['name'],
            $_POST['student_no'],
            $_POST['email'],
            $items,
            $_POST['notes']
        ); // Instantiate the insertR class

        // Attempt to insert receipt
        try {
            $insertR->insertReceipt();
            echo '<script>swal("Receipt Successfully Entered!", "", "success");</script>';
        } catch (Exception $e) {
            echo '<script>swal("Failed to add receipt: ' . $e->getMessage() . '", "", "error");</script>';
        }
    } else {
        echo '<script>swal("All fields are required!", "", "warning");</script>';
    }
}


function delete(){
  if (!empty($_POST['delete'])) {
    $delete = new delete($_POST['delete']);
    if ($delete->inactive()) {
      echo '<div class=" col-md-12 alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Holy guacamole!</strong> You have Deleted Task Successfully.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
    }else{
      echo '<div class=" col-md-12 alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Holy guacamole!</strong> Delete Task Error!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
    }
  }
}

function deactivate(){
  if (!empty($_POST['deactivate'])) {
    $deactivate = new deactivate($_POST['deactivate']);
    if ($deactivate->inactive()) {
      echo '<div class=" col-md-12 alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Holy guacamole!</strong> You have Deleted Task Successfully.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
    }else{
      echo '<div class=" col-md-12 alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Holy guacamole!</strong> Delete Task Error!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
    }
  }
}

function editStatus() {
    if (!empty($_POST['edit'])) {
        $edit = new edit($_POST['edit']);
        if ($edit->editStatus()) {
            echo '<div class="col-md-12 alert alert-info alert-dismissible fade show" role="alert">
                <strong>Holy guacamole!</strong> You have completed the task successfully.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>';
        } else {
            echo '<div class="col-md-12 alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Holy guacamole!</strong> Task completion error!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>';
        }
      }
}

function updateInquiry() {
    if (!empty($_POST['resolved'])) {
        $resolved = new resolved($_POST['resolved']);
        if ($resolved->updateInquiry()) {
            echo '<div class="col-md-12 alert alert-info alert-dismissible fade show" role="alert">
                <strong>Holy guacamole!</strong> You have completed the task successfully.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>';
        } else {
            echo '<div class="col-md-12 alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Holy guacamole!</strong> Task completion error!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>';
        }
      }
}

function edit(){
  if (!empty($_POST['edit'])) {
    $editO = new editO($_POST['edit']);
    if ($edit->editMember()) {
      echo '<div class=" col-md-12 alert alert-info alert-dismissible fade show" role="alert">
            <strong>Holy guacamole!</strong> You have Completed the Task Successfully.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
    }else{
      echo '<div class=" col-md-12 alert alert-dismissible alert-dismissible fade show" role="alert">
            <strong>Holy guacamole!</strong> Task Completion Error!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
    }
  }
}

function view(){
  $view = new view();
  $view->viewPending();
  $view->viewPaid();
  $view->viewInactive();
}

function viewPending(){
  $view = new view();
  $view->viewPending();
}

function countActive(){
  $view = new view();
  $view->countActive();
}

function countPendingMembers(){
  $view = new view();
  $view->countPendingMembers();
}

function countInquiries(){
  $view = new view();
  $view->countInquiries();
}

 ?>
