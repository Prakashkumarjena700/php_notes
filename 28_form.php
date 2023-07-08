<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact us</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/classes/21_forms.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
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
    <div class="container">
        <?php

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $desc = $_POST['desc'];


            $serverName = "localhost";
            $userName = "root";
            $password = "";
            $dbname = 'contacts';

            $conn = mysqli_connect($serverName, $userName, $password, $dbname);

            //die if connection is not successful
            if (!$conn) {
                echo '<div class="alert alert-denger alert-dismissible fade show" role="alert">
                <strong>Error!</strong>There is some technical error and your data has not been submitted
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                   </div>';
            } else {
                $sql = "INSERT INTO `contacts` ( `name`, `email`, `concern`, `date`) VALUES ('$name', '$email', '$desc', current_timestamp())";

                //Add a new data in the table
                $result = mysqli_query($conn, $sql);

                if ($result) {
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> Your data has been submitted successfully
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                   </div>';
                } else {
                    echo '<div class="alert alert-denger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong>There is some technical error and your data has not been submitted
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                       </div>';
                }
            }
            ;





        }

        ?>

        <h1>Contact us for your concern</h1>
        <form class="row g-3" action="/classes/28_form.php" method="post">
            <div class="col-auto">
                <label for="name" class="visually-hidden">Name</label>
                <input type="text" class="form-control" placeholder="Name" id="name" name="name">
            </div>

            <div class="col-auto">
                <label for="email" class="visually-hidden">Email</label>
                <input type="email" class="form-control" placeholder="Email" id="email" name="email">
            </div>

            <div class="col-auto">
                <label for="desc">Description</label>
                <textarea name="desc" id="desc" cols="30" rows="5" class="form-control"></textarea>
            </div>


            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-3">Submit</button>
            </div>
        </form>
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
    crossorigin="anonymous"></script>

</html>