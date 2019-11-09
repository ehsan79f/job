<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include "components.php";
     require_once "../db.php";
    session_start();

    if (!(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true && $_SESSION['type'] == 1)) {
        header("location: ../login.php");
    }else{
    $projectName = $description = $name = $family = $avatar = $projectPictureName = "";
    $type = 0;
    $name_err = $disc_err = $pic_err =  $target_file="";
    $hasImage = false;
    $error='';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $id = $_SESSION['id'];
        // Check if name is empty
        if (empty(trim($_POST["projectName"]))) {
            $name_err = "Please enter project name.";
            $error.="Please enter project name.<br/>";
        } else {
            $projectName = trim($_POST["projectName"]);
        }

        // Check if Description is empty
        if (empty(trim($_POST["projectDescription"]))) {
            $disc_err = "Please enter your description.";
            $error.="Please enter your description.<br/>";
        } else {
            $description = trim($_POST["projectDescription"]);
        }

        if (isset($_FILES["projectPicture"])) {

            // for the database

            $projectPictureName = time() . '-' . $_FILES["projectPicture"]["name"];
            // For image upload
            $target_dir = "../images/profiles/";
            $target_file = $target_dir . basename($projectPictureName);
            // VALIDATION
            // validate image size. Size is calculated in Bytes

            // check if file exists
            if (file_exists($target_file)) {
                $pic_err = "File already exists";
                $error .= "File already exists<br/>";

            }

        }
        if (empty($name_err) && empty($disc_err) && empty($pic_err)) {

            // Upload image only if no errors
            if (move_uploaded_file($_FILES["projectPicture"]["tmp_name"], $target_file)) {
                $hasImage = true;
            }
            $sql = "INSERT INTO projects (title, description,creator) VALUES ('" . $projectName . "','" . $description . "','" . $id . "')";
            if ($hasImage===TRUE) {
                $sql = "INSERT INTO projects (title, description,creator,picture) VALUES ('" . $projectName . "','" . $description . "','" . $id . "','" . $projectPictureName . "')";
            }



            if ($conn->query($sql) === FALSE) {
                $error = $conn->error;
            }else{
                $error='0';
            }


        }

    }
    ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
          rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <?php
    echo sidebar();
    ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <?php echo topbar() ?>

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Add Project</h1>
                </div>
                <div class="row">
                    <div class="col-md-12 col-lg-6">
                        <?php
                            if($error!=0){
                                echo "<div class='alert-danger'> ".$error."</div>";
                            }else{
                                echo "<div class='alert-success'>Project Added Successfully </div>";
                            }
                        ?>
                        <form method="post" enctype="multipart/form-data" action="">
                            <div class="form-group">
                                <label for="project-name">Project Name</label>
                                <input type="text" class="form-control" id="projectName" name="projectName"
                                       placeholder="Name">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Project Description</label>
                                <textarea rows="3" type="text" class="form-control" id="projectDescription"
                                          name="projectDescription"
                                          placeholder="Description"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="project-name">Project Picture</label>
                                <input type="file" class="form-control-file" id="projectPicture" name="projectPicture"
                                       placeholder="Name">
                            </div>
                            <div class="form-group">
                                <input type="submit">
                            </div>
                        </form>
                    </div>
                </div>


            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.html">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/chart-area-demo.js"></script>
<script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
<?php
}
?>