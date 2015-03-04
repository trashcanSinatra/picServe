<?php
/**
 * Description of dataSource
 *
 * @author Aaron
 */
class dataLink {
    
    
   private $host = 'localhost';
   private $database = 'pic_server';
   private $username = 'root';
   private $password = null;
   private $connection = "";
   
   
   
   public function __construct() {
       $this->db_connect();
   }
   
   
   public function __destruct() {
       
       
   }
   
    public function __get($name) {
        return $this->$name;
    }  //----------------------------------------------- End  get function.

    public function __set($name, $value) {
       $this->$name=$value;
     } 

   
   
 public function db_connect() 
 {

  $conn = mysqli_connect($this->host, $this->username, $this->password)
                    or die("Could not connect: " . mysqli_error());

  mysqli_select_db($conn, $this->database)
               or die("Could not select database: " . mysqli_error());

  $this->connection = $conn;

 }
 

public function registerID($appID) {

    $db = $this->connection;

    if(!$db) {

        return 2;
        
    } else {

    $appQuery = "Select * FROM registration WHERE app_id = '$appID'";
    $appResult = mysqli_query($db, $appQuery);

     if(mysqli_num_rows($appResult) > 0) {

         return 0;

     } else {

        $regQuery = "INSERT INTO registration (app_id) VALUES ('$appID') ";
        $regResult = mysqli_query($db, $regQuery);

         if(!$regResult || mysqli_affected_rows($db) == 0) 
            {

              return 0;

             } else {

              return 1;

         }  

    }
              mysqli_free_result($appResult);
              mysqli_free_result($regResult);
              mysqli_close($db);
  }
}


function createPushList() 
{
      $pushList = array();

      $conn = $this->connection;
      $query = "Select * FROM registration";
      $result = mysqli_query($conn, $query);

      while($id = mysqli_fetch_assoc($result)) 
      {
          if($id["app_id"] != "")
         {
          array_push($pushList,  $id["app_id"]);
         }
      }

      mysqli_free_result($result);
      mysqli_close($conn);
      return $pushList;
}




public function mysql_text_prep($string)
{

    $escaped_string = mysqli_real_escape_string($this->connection, $string);  
    return $escaped_string;
}




}

