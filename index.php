<?php

$insert = false;
$update = false;
$delete = false;

//connect to the db
$serverName = "localhost";
$userName = "root";
$password = "";
$dbname = 'notes';

$conn = mysqli_connect($serverName, $userName, $password, $dbname);


if (!$conn) {
    echo 'Not connected to db' . mysqli_connect_error();
}
//  else {
//     echo 'Connected to ' . $dbname . ' data base <br> ';
// }

$method = $_SERVER['REQUEST_METHOD'];

// if (isset($_GET['delete'])) {
//     $sno = $_GET['delete'];
   
//     $sql="DELETE FROM `notes` WHERE `notes`.`sno` = $sno";

//     $result=mysqli_query($conn,$sql);

//     if($result){
//         $delete=true;
//     }else{
//         echo 'Data has not been deleted'.mysqli_error($conn);
//     }

// }

if ($method == 'POST') {

    if (isset($_POST['editId'])) {

        $sno = $_POST['editId'];
        $title = $_POST['titleEdit'];
        $description = $_POST['descriptionEdit'];

        $sql = "UPDATE `notes` SET `title` = '$title', `description` = '$description' WHERE `notes`.`sno` = $sno";

        $result = mysqli_query($conn, $sql);

        if ($result) {
            $update = true;
        } else {
            echo "We could not updated" . mysqli_error($conn);
        }

    } else {
        $title = $_POST['title'];
        $description = $_POST['description'];

        $sql = "INSERT INTO `notes` ( `title`, `description`) VALUES ('$title', '$description')";

        $result = mysqli_query($conn, $sql);

        if ($result) {
            $insert = true;
        } else {
            echo 'Not posted' . mysqli_error($conn);
        }

    }


}


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">

</head>

<body>
    <!-- Edit Modal -->
    <!-- Button trigger modal -->
    <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">
        Edit modal
    </button> -->

    <!-- Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/classes/crud/index.php" method="post">
                        <h1>Edit your note</h1>
                        <input type="text" name="editId" id="editId">
                        <div class="mb-3">
                            <label for="title" class="form-label">Note title</label>
                            <input type="text" class="form-control" id="titleEdit" name="titleEdit"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="desc" class="form-label">Note Description</label>
                            <textarea class="form-control" placeholder="Leave a comment here" id="descriptionEdit"
                                name="descriptionEdit"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">CRUD</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact us</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <?php
    if ($insert) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your data has been added successfully.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
    if ($update) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your data has been updated successfully.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
    if ($delete) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your data has been Deleted successfully.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }


    ?>

    <div class="container my-4">
        <h2>Add a note</h2>
        <form action="/classes/crud/index.php" method="post">
            <div class="mb-3">
                <label for="title" class="form-label">Note title</label>
                <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="desc" class="form-label">Note Description</label>
                <textarea class="form-control" placeholder="Leave a comment here" id="description"
                    name="description"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <div class="container">
        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th scope="col">Sl. no</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM `notes` ";

                $result = mysqli_query($conn, $sql);

                $count = 1;

                while ($row = mysqli_fetch_assoc($result)) {

                    echo "
                    <tr>
                    <th scope='row'>" . $count . "</th>
                    <td>" . $row['title'] . "</td>
                    <td>" . $row['description'] . "</td>
                    <td><button class='edit' id=" . $row['sno'] . ">Edit</button>
                     <button class='delete'  id=d" . $row['sno'] . " >Delete</button></td>
                    </tr> ";
                    $count++;

                }

                ?>
            </tbody>
        </table>

    </div>
    <hr>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
    crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
    crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script>
    let table = new DataTable('#myTable');
</script>

<script>
    edits = document.getElementsByClassName('edit');
    Array.from(edits).forEach((ele) => {
        ele.addEventListener('click', (e) => {
            tr = e.target.parentNode.parentNode;
            title = tr.getElementsByTagName('td')[0].innerText;
            description = tr.getElementsByTagName('td')[1].innerText;
            descriptionEdit.value = description
            titleEdit.value = title
            editId.value = e.target.id

            $('#editModal').modal('toggle')

        })
    })

    deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((ele) => {
        ele.addEventListener('click', (e) => {
            sno = e.target.id.substr(1)

            if (confirm("Are you sure you want to delete this note!")) {
                window.location = `/classes/crud/index.php?delete=${sno}`
            } else {
                console.log('No')
            }
        })
    })


</script>

</html>