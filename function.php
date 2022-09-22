<?php
  Class crudApp{
    private $conn;

    public function __construct()
    {
    //connection to the Database.
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "notes";

    // create a connection 
    $this->conn = mysqli_connect($server, $username, $password, $database);
    //Die if connection was not successfully
    if(!$this->conn){
      die("Sorry we failed to connection: " . mysqli_connect_error());
    }else{
      // echo "Connection was Successfully <br>";
    }
    }

    // insert data 
    public function insert_data($data)
    {
      $title = $data['title'];
      $desc = $data['desc'];
      $img = $_FILES['imgs']['name'];
      $tmp_img = $_FILES['imgs']['tmp_name'];
      $time = date('Y-m-d H:i:s');
      // query 
      $query = "INSERT INTO `notes` (`sno`, `title`, `description`, `time`, `note_imgs`) VALUES (NULL, '$title' , '$desc', '$time', '$img')";

      if(!(empty($title) || empty($desc))){
        if(mysqli_query($this->conn, $query)){
          move_uploaded_file($tmp_img, 'upload/'.$img);
          // move_uploaded_file($tmp_img,'upload/$img);
          return "Information Added Successfully.";
          $title = $desc = $img ="";
          header('location:index.php');
        }
      }else{
        echo '
         <div class="container">
         <div class="alert alert-warning alert-dismissible fade show" role="alert">
         <strong>fill form</strong>
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>
         </div>
        ';
      }

      
    }
    // display data 
    public function display($data)
    {
      $src = $data['search'];
      $query = "SELECT * FROM notes WHERE title like '%$src%' || description like '%$src%%'  ";
     
     if(mysqli_query($this->conn, $query)){
      $return_data = mysqli_query($this->conn, $query);
      return $return_data;
     }
    }
    // delate data 
    public function delate_data($id)
    {
      $query =" DELETE FROM `notes` WHERE `notes`.`sno` = $id";
      if(mysqli_query($this->conn, $query)){
        return "Deleted Successfully";
      }
    }
    // display data by id
    public function display_data_by_id($id)
    {
      $query = "SELECT * FROM `notes` WHERE  `sno` = $id";
      if(mysqli_query($this->conn, $query)){
        $return_data = mysqli_query($this->conn, $query);
        $nots = mysqli_fetch_assoc($return_data);
        return $nots;
      }
    }
    // update data 
    public function update($data)
    {
      $id = $data['id'];
      $title = $data['title'];
      $desc = $data['desc'];
      $query = "UPDATE `notes` SET `title`='$title',`description`='$desc' WHERE sno = $id";

      if(!(empty($title) || empty($desc))){
        if(mysqli_query($this->conn, $query)){
          mysqli_query($this->conn, $query);
          return "Update is Success.";
         }
      }else{
        echo '
         <div class="container">
         <div class="alert alert-warning alert-dismissible fade show" role="alert">
         <strong>এই হারামির বাচ্ছা !! আগে ফরমটা ফিলাপ কর 👺👺👺👺</strong>
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>
         </div>
        ';
      }
      
    }
    // all delate 
    public function allDelate($data)
    {
      $multiple_id = $data['delateMark'];
      $extract = implode(",", $multiple_id); 
      echo $extract;
      $query = "SELECT  FROM `notes` WHERE sno IN($extract)";

      if(mysqli_query($this->conn, $query)){
        mysqli_query($this->conn, $query);
        
      }
      
    }

    //search 
    // public function search($data)
    // {
    //   $src = $data['search'];
    //   $search = "SELECT * FROM notes WHERE title like '%$src%' ";
    //   return $search;
    // }
  }

?>

