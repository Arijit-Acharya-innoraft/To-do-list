  <?php
  // Calling the dependencies. 
  require_once "application/controller/HomeController.php";

  // Calling a method of the HomeController class, and store the values.
  $data = $homeController->displayControl($con);
  ?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>local-todo-app</title>
    <link rel="stylesheet" href="public/assets/css/index.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  </head>

  <body>
    <section class="vh-100">
      <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col">
            <div class="card" id="list1" style="border-radius: .75rem; background-color: #eff1f2;">
              <div class="card-body py-4 px-4 px-md-5">

                <p class="h1 text-center mt-3 mb-4 pb-3 text-primary">
                  <i class="fas fa-check-square me-1"></i>
                  <u>My Todo-list</u>
                </p>

                <div class="pb-2">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex flex-row align-items-center">
                        <input type="text" class="form-control form-control-lg" id="exampleFormControlInput1" placeholder="Add new...">
                        <a href="#!" data-mdb-toggle="tooltip" title="Set due date"><i class="fas fa-calendar-alt fa-lg me-3"></i></a>
                        <div>
                          <button type="button" class="btn btn-primary" id="button">Add</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <hr class="my-4">

                <div class="d-flex justify-content-end align-items-center mb-4 pt-2 pb-3">
                  <p class="small mb-0 me-2 text-muted">Features</p>
                  <select class="select">
                    <option value="1">Edit</option>
                    <option value="2">Delete</option>
                    <option value="3">Mark</option>
                  </select>

                  <a href="#!" style="color: #23af89;" data-mdb-toggle="tooltip" title="Ascending"><i class="fas fa-sort-amount-down-alt ms-2"></i></a>
                </div>
                <div class="post-section">


                  <?php
                  // Calling loop and printing the data values of list on reload.
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
                        <p id="t-<?php echo $d["slno"]; ?>" class="lead fw-normal mb-0 <?php echo $status ;?>"><?php echo $d["txt"]; ?></p>
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
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <div class="card-body" id="pop-up">
      <input type="text" class="form-control form-control-lg pop-inp" id="exampleFormControlInput1 " placeholder="Add new...">
      <a href="#!" data-mdb-toggle="tooltip" title="Set due date"><i class="fas fa-calendar-alt fa-lg me-3"></i></a>
      <div>
        <button type="button" class="btn btn-primary" id="pop-button">Add</button>
      </div>
    </div>

    <script src="public/assets/js/ajax.js"></script>
    <script src="public/assets/js/UserOption.js"></script>
  </body>
  <style>

  </style>

  </html>
