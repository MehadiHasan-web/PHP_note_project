<?php
include_once 'function.php';
$objAdmin = new crudApp();
// insert 
if (isset($_POST['addNote'])) {
  $return_msg = $objAdmin->insert_data($_POST);
}
// show 
// $all_notes = $objAdmin->display();
if(isset($_POST['search_btn'])){
   $all_notes = $objAdmin->display($_POST);
  }


// delate 
if (isset($_GET['status'])) {
  if ($_GET['status'] = 'delate') {
    $delate_id = $_GET['id'];
    $objAdmin->delate_data($delate_id);
  }
}
// update 
if (isset($_GET['status'])) {
  if ($_GET['status'] = 'edit') {

    $data = $_GET['id'];
    $returnNotes = $objAdmin->display_data_by_id($data);
  }
}
// all delate 
if (isset($_POST['allDelate'])) {

  $data = $_POST['delateMark'];
  $objAdmin->allDelate($data);
}
// search
// if(isset($_POST['search_btn'])){
//  $all_notes = $objAdmin->display($data);
// }

?>










<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <!-- datatables css -->
  <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">


</head>

<body>
  <!-- navbar  -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Dropdown
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled">Disabled</a>
          </li>
        </ul>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>
  <!-- form  -->
  <div class="container mt-5">
    <h2 class="my-4">Add a Note</h2>
    <form action="" method="POST" action="index.php" enctype="multipart/form-data">
      <div class="row mb-3">
        <label for="noteTitle" class="col-sm-2 col-form-label">Note Title</label>
        <div class="col-sm-10">
          <input name="title" type="text" class="form-control" id="noteTitle">
        </div>
      </div>
      <div class="row mb-3">
        <label for="noteDesc" class="col-sm-2 col-form-label">Note Description</label>
        <div class="col-sm-10">
          <input name="desc" type="text" class="form-control" id="noteDesc">
        </div>
      </div>

      <div class="row mb-3">
        <label for="noteDesc" class="col-sm-2 col-form-label">Multiple image input</label>
        <div class="col-sm-10">
        <input name="imgs" class="form-control" type="file" id="formFileMultiple" >
        </div>
      </div>

      <div class="row mb-3">
        <div class="col-sm-10 offset-sm-2">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck1">
            <label class="form-check-label" for="gridCheck1">
              Example checkbox
            </label>
          </div>
        </div>
      </div>

      <button name="addNote" type="submit" class="btn btn-primary" value="add information">Add Note</button>
      <!-- search  -->
     
      <p><?php if (isset($return_msg)) {
            echo $return_msg;
          } ?></p>
    </form>


    <div class="d-flex justify-content-end">
    <form  class="d-flex"  role="search" method="POST" >
            <input name="search" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button name="search_btn" class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
    <!-- table  -->
    <table id="myTable" class="table table-striped table-hover  shadow  ">
      <thead>
        <tr>
          <th class="py-3" scope="col">Serial</th>
          <th class="py-3" scope="col">Profile</th>
          <th class="py-3" scope="col">Title</th>
          <th class="py-3" scope="col">Description</th>
          <th class="py-3" scope="col">Time</th>
          <th class="py-3 ps-5" scope="col">Action</th>
          <th scope="col">
            <button name="allDelate" type="submit" class="btn btn-info fs-6 " value="add information" data-bs-toggle="modal" data-bs-target="#allDelate">All Delate</button>
          </th>
        </tr>
      </thead>
      <tbody>
        <?php $si = 1; ?>
        <?php while ($all_note = mysqli_fetch_assoc($all_notes)) { ?>
          <tr>
            <th class="pt-3" scope="row"><?php echo $si; ?></th>
            <th scope="row">
              <div class="rounded-circle bg-dark border-none" style="width:38px ; height: 38px;">
                <img src="upload/<?php echo $all_note['note_imgs']; ?>" class="rounded-circle img-fluid"   style="width:38px ; height: 38px;">
              </div>
            </th>
            <td class="pt-3 text-info"><?php echo $all_note['title']; ?></td>
            <td class="pt-3"><?php echo $all_note['description']; ?></td>
            <td class="pt-3"><?php echo $all_note['time']; ?></td>
            <td>
              <a type="button" class="btn btn-primary" href="edit.php?status=edit&&id=<?php echo $all_note['sno']; ?>">Edit</a>
              <a type="button" class="btn btn-danger ms-3" href="?status=delate&&id=<?php echo $all_note['sno']; ?>">Delate</a>
            </td>
            <td>
              <div class="form-check form-switch ps-5 ms-3 pt-2">
                <input name="delateMark[]
                " class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" value="<?php echo $all_note['sno']; ?>">

              </div>
            </td>
          </tr>
        <?php $si++;
        }; ?>
      </tbody>


      <!-- Modal -->
      <div class="modal fade" id="allDelate" tabindex="-1" aria-labelledby="allDelateLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="allDelateLabel">Delate All Notes !!</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <p>Are you sure ..?</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

              <!-- <button  >Yes</button> -->
              <input name="allDelate" type="submit" class="btn btn-primary" value="Yes">
            </div>
          </div>
        </div>
      </div>
      <!-- modal all delate end  -->

    </table>
    <!-- model -->
    <!-- data-bs-toggle="modal" data-bs-target="#editmodal" data-bs-whatever="@fat" -->
    <div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="editmodalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editmodalLabel">Edit Your Note</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form>
              <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Title:</label>
                <input type="text" class="form-control" id="recipient-name" value="<?php echo $returnNotes['title']; ?>">
              </div>
              <div class="mb-3">
                <label for="message-text" class="col-form-label">Description:</label>
                <textarea class="form-control" id="message-text" value="<?php echo $returnNotes['description']; ?>"></textarea>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Update</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
  <!-- data table js  -->
  <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
  <script>
    $(document).ready(function() {
      $('#myTable').DataTable();
    });
  </script>

</body>

</html>