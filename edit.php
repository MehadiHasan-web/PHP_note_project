<?php

include 'function.php';
$objAdmin = new crudApp();
// Show data  
if(isset($_GET['status'])){
  if($_GET['status'] = 'edit'){
    $data = $_GET['id'];
    $returnNotes = $objAdmin->display_data_by_id($data);
  }
}
// update data 
if(isset($_POST['update'])){
  $returnMsg = $objAdmin->update($_POST);
}

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>

  <div class="container">

    <form action="" method="POST">

    <input name="id"  type="hidden" value="<?php echo $returnNotes['sno']; ?>" >
    <h2 class="">Edit Note</h2>
    <!-- msg  -->
        <p><?php if(isset($returnMsg)){ echo '
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>Update is success!</strong>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        '; } ?></p>

      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Note Title</label>
        <input name="title" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $returnNotes['title']; ?>">
        
      </div>
      
      
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label" >Description</label>
        <input name="desc" type="text" class="form-control" id="exampleInputPassword1" value="<?php echo $returnNotes['description']; ?>" >
      </div>
      <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
      </div>
      <button type="submit" class="btn btn-primary" name="update">Update</button>
      <a href="index.php" class="btn btn-success">Home</a>
      

      
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>