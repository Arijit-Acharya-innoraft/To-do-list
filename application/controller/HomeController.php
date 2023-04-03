<?php
// Including the dependencies.
require_once "application/model/db_conn.php";
require_once "application/model/InputItem.php";

/**
 * This is the controller class. It controls all the database class with view.
 * It consists of 5 methods including the constructor.
 */
class HomeController {

  /**
   * @var object $input_item
   *   It is used as an object of the InputItem class in the model folder.
   */
  public $input_item;

  /**
  * This constructor creates an object of the InputItem class.
  */
  function __construct() {
    $this->input_item =  new InputItem ;
  }

  /**
   * This method is used to showing the texts entered in the todo list.
   * 
   * @param object $con
   *  It is an object of the mysqli class.
   * 
   * @return array $data
   * It contains the data of the table in the form of associative array.
   *   
   */
  function displayControl($con) {
    $data = $this->input_item->displayInput($con);
    return $data;
  }

  /**
   * This method is used for storing the inputs.
   * 
   * @param object $con
   *   It is an object of the mysqli class.  
   * @param string $text
   *   It stores the user entered string.
   */
  function storeControl($con,$text) {
    $this->input_item->storeInput($con, $text);
  }

  /**
   * This method is used for calling the edit database method of the InputItem class.
   * 
   * @param object $con
   *    It is an object of the mysqli class.
   * @param integer $id
   *   It stores the id of the post which is to be deleted. 
   * @param string $editedText
   *   It stores the new input string that the user wants.
   */
  function editControl($con,$id,$editedText) {
    $this->input_item->editInput($con,$id,$editedText);
  }

  /**
   * This method is used for calling the delete method of the InputItem class.
   * 
   * @param object $con
   *    It is an object of the mysqli class.
   * @param integer $id
   *   It stores the id of the post which is to be deleted. 
   */
  function deleteControl($con,$id) {
    $this->input_item->deleteInput($con, $id);
  }

   /**
   * This method is used for calling the mark method of the InputItem class.
   * 
   * @param object $con
   *    It is an object of the mysqli class.
   * @param integer $id
   *   It stores the id of the post which is to be deleted. 
   */
  function markControl($con,$id){
    $this->input_item->mark($con, $id);
  }

   /**
   * This method is used for calling the unmark method of the InputItem class.
   * 
   * @param object $con
   *    It is an object of the mysqli class.
   * @param integer $id
   *   It stores the id of the post which is to be deleted. 
   */
  function umarkControl($con,$id){
    $this->input_item->unmark($con, $id);
  }

   /**
   * This method is used for calling the checkdone method of the InputItem class.
   * 
   * @param object $con
   *    It is an object of the mysqli class.
   * @param integer $id
   *   It stores the id of the post which is to be deleted. 
   */
  function checkControl($con,$id){
    $this->input_item->checkDone($con,$id);
  }

}

// Creating  an object for the HomeController class.
$homeController = new HomeController;

?>
