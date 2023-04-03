<?php
require_once "controller.php";
if(isset($_POST["text"])){
  $input_item->storeInput($con,$_POST["text"]);
}

if(isset($_POST["wish"])&& isset($_POST["id"])){

  if($_POST["wish"]==1){
    $input_item->editInput($con,$_POST["id"],$_POST["edit"]);
  }
  elseif($_POST["wish"]==2){
    $input_item->deleteInput($con,$_POST["id"]);
  }

}
$data = $input_item ->displayInput($con);


foreach ($data as $d) {
  ?>
  <ul class="list-group list-group-horizontal rounded-0">
                  <li class="list-group-item d-flex align-items-center ps-0 pe-3 py-1 rounded-0 border-0 bg-transparent">
                    <div class="form-check">
                      <input class="form-check-input me-0" type="checkbox" value="" id = "<?php echo $d["slno"]; ?>" aria-label="..." />
                    </div>
                  </li>
                  <li class="list-group-item px-3 py-1 d-flex align-items-center flex-grow-1 border-0 bg-transparent">
                    <p class="lead fw-normal mb-0"><?php echo $d["txt"]; ?></p>
                  </li>
                  <li class="list-group-item px-3 py-1 d-flex align-items-center border-0 bg-transparent">
                    <div class="py-2 px-3 me-2 border border-warning rounded-3 d-flex align-items-center bg-light">
                      <p class="small mb-0">
                        <a href="#!" data-mdb-toggle="tooltip" title="Due on date">
                          <i class="fas fa-hourglass-half me-2 text-warning"></i>
                        </a>
                       <p>
                        Created Time :-
                      </p>
                    </div>
                  </li>
                  <li class="list-group-item ps-3 pe-0 py-1 rounded-0 border-0 bg-transparent">
                    <div class="d-flex flex-row justify-content-end mb-1">
                      <a href="#!" class="text-info" data-mdb-toggle="tooltip" title="Edit todo"><i class="fas fa-pencil-alt me-3"></i></a>
                      <a href="#!" class="text-danger" data-mdb-toggle="tooltip" title="Delete todo"><i class="fas fa-trash-alt"></i></a>
                    </div>
                    <div class="text-end text-muted">
                      <a href="#!" class="text-muted" data-mdb-toggle="tooltip" title="Created date">
                        <p class="small mb-0"><i class="fas fa-info-circle me-2"></i><?php echo $d["create_time"];?></p>
                      </a>
                    </div>
                  </li>
                </ul>
  <?php 
  }
?>
