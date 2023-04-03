<?php
// Requiring the database connection file.
require_once "db_conn.php";

/**
 * This class contains the database queries.
 * It has got 5 methods including constructor.
 */
class InputItem {

  /**
   * @var [string]
   * It is used for storing the time in which the user has written the todo list.
   */
  public $create_time;

  /**
   * This constructor is responsible for generating the time ,
   * in which the user has made a post.
   */
  function __construct() {
    $this->create_time = date('Y-m-d H:i:s', time());
  }

  /**
   * This method is responsible for storing the user entered input.
   * @param object $con
   *   It is an object of the mysqli class.
   * @param string $text
   *  It stores the user entered text.
   */
  function storeInput($con,$text) {
    $qry = "INSERT INTO to_do (create_time,txt) VALUES ('" . $this->create_time."','" .  $text ."');";
    $con ->query($qry);
  }

  /**
   * This method is responsible for displaying the user entered input.
   * @param object $con
   *   It is an object of the mysqli class.
   * @return array $result.
   *  It stores all the database elements of different rows and columns. 
   */
  function displayInput($con) {
    $qry = "SELECT * FROM to_do  ORDER BY create_time ;" ;
    $data = $con->query($qry);
    $result = $data->fetch_all(MYSQLI_ASSOC);
    return $result;
  }

  /**
   *This method is responsible for editing the user entered input.
   * @param object $con
   *   It is an object of the mysqli class.
   * @param string $slno
   *   It stores the serial no of the text.
   * @param string $text
   *   It stores the user entered text.
   */
  function editInput($con,$slno,$text) {
    $qry = "UPDATE to_do SET txt = '" . $text . "' WHERE slno = " . $slno . ";";
    $con->query($qry);
  }

  /**
   *@param object $con
   *   It is an object of the mysqli class.
   * @param string $slno
   *   It stores the serial no of the text.
   */
  function deleteInput($con,$slno) {
    $qry = "DELETE FROM to_do WHERE slno = " . $slno . ";";
    $con->query($qry);
  }

}

// Creating an object of the above class InputItem.
$input_item = new InputItem;
?>