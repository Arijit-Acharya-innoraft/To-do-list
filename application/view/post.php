<?php
// Calling the coontroller page.
require_once "application/controller/HomeController.php";

// Checking if the user has set any text input or not.
// If yes then calling methods to store in the data base.
if(isset($_POST["text"])) {
  $homeController->storeControl($con, $_POST["text"]);
}

// Checking if the user has opted for any feature.
if(isset($_POST["wish"]) && isset($_POST["id"])) {

  // Checking if the user has opted for the edit feature.
  // If yes, then calling methods to store the change in the data base.
  if($_POST["wish"] == 1) {
    $homeController->editControl($con, $_POST["id"], $_POST["edit"]);
  } 
  // Checking if the user has opted for the delete feature.
  // If yes, then calling methods to delete that from the data base.
  elseif($_POST["wish"] == 2) {
    $homeController->deleteControl($con, $_POST["id"]);
  }
  else{
    $mark = $_POST["mark"];
    if($mark=="done"){
      $homeController->markControl($con, $_POST["id"]);
    }
    else{
      $homeController->umarkControl($con, $_POST["id"]);
    }
  }

}
// Calling method of the HomeController class, to display item onclick.
$data = $homeController->displayControl($con);

// Calling loop and printing all the list-item.
foreach ($data as $d) {
  if($d["mark"] == "done"){
    $status = "text-decoration-line-through";
  }
  else {
    $status ="text-decoration-none";
  }
?>
  <ul class="list-group list-group-horizontal rounded-0">
    <li class="list-group-item d-flex align-items-center ps-0 pe-3 py-1 rounded-0 border-0 bg-transparent">
      <div class="form-check">
        <input class="form-check-input me-0" type="checkbox" value="" id="<?php echo $d["slno"]; ?>" aria-label="..." />
      </div>
    </li>
    <li class="list-group-item px-3 py-1 d-flex align-items-center flex-grow-1 border-0 bg-transparent">
      <p class="lead fw-normal mb-0 <?php echo $status ;?>"><?php echo $d["txt"]; ?></p>
    </li>
   
    <li class="list-group-item ps-3 pe-0 py-1 rounded-0 border-0 bg-transparent">
      <div class="d-flex flex-row justify-content-end mb-1">
        <a href="#!" class="text-info" data-mdb-toggle="tooltip" title="Edit todo"><i class="fas fa-pencil-alt me-3"></i></a>
        <a href="#!" class="text-danger" data-mdb-toggle="tooltip" title="Delete todo"><i class="fas fa-trash-alt"></i></a>
      </div>
      <div class="text-end text-muted">
        <a href="#!" class="text-muted" data-mdb-toggle="tooltip" title="Created date">
          <p class="small mb-0"><i class="fas fa-info-circle me-2"></i><?php echo $d["create_time"]; ?></p>
        </a>
      </div>
    </li>
  </ul>
<?php
}
?>
