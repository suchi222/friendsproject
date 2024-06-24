<?php
include("session.php");
include('config.php');
$update = false;
$del = false;
$amount = "";
$idate = date("Y-m-d");
$description = "";

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $update = true;
    $record = mysqli_query($con, "SELECT * FROM income WHERE user_id='$userid' AND income_id=$id");
    if (mysqli_num_rows($record) == 1) {
        $n = mysqli_fetch_array($record);
        $amount = $n['amount'];
        $idate= $n['idate'];
        $description = $n['description'];
    } else {
        echo ("WARNING: AUTHORIZATION ERROR: Trying to Access Unauthorized data");
    }
}
if (isset($_POST['update'])) {
    $id = $_GET['edit'];
    $amount = $_POST['amount'];
    $idate= $_POST['date'];
    $description = $_POST['des'];

    $sql = "UPDATE income SET amount='$amount', idate='$idate', description='$description' WHERE user_id='$userid' AND income_id='$id'";
    if (mysqli_query($con, $sql)) {
        echo "Records were updated successfully.";
        header('location: manage_income.php');
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
        header('location: dashboard.php');
    }
}
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $del = true;
    $record = mysqli_query($con, "SELECT * FROM income WHERE user_id='$userid' AND income_id=$id");
    if (mysqli_num_rows($record) == 1) {
        $n = mysqli_fetch_array($record);
        $amount = $n['amount'];
        $idate= $n['idate'];
        $description = $n['description'];
    } else {
        echo ("WARNING: AUTHORIZATION ERROR: Trying to Access Unauthorized data");
    }
}

if (isset($_POST['delete'])) {
    $id = $_GET['delete'];
    $amount = $_POST['amount'];
    $idate= $_POST['idate'];
    $description = $_POST['description'];

    $sql = "DELETE FROM income WHERE user_id='$userid' AND income_id='$id'";
    if (mysqli_query($con, $sql)) {
        echo "Records were updated successfully.";
        header('location: manage_income.php');
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
    }
}




?>
<!DOCTYPE html>
<html lang="en">

<head>

    <title>Expense Manager - Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="css/style.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>

</head>

<body>

    <div class="d-flex" id="wrapper">
        <?php
            include_once("sidebar.php");
        ?>
        <div id="page-content-wrapper">

            <nav class="navbar navbar-expand-lg navbar-light  border-bottom">


                <button class="toggler" type="button" id="menu-toggle" aria-expanded="false">
                    <span data-feather="menu"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="img img-fluid rounded-circle" src="<?php echo $userprofile ?>" width="25">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="profile.phcol-mdp">Your Profile</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="col-md-5 offset-md-1">
			<div class="card mt-4">
				<h3 class="text-info">Edit Income</h3>
				<div class="card-body">
					<form action="" method="post" autocomplete="off">
					<div class="form-group">
					  <label for="usr" class="font-weight-bold">Enter Amount:</label>
					  <input type="number" name="amount" value="<?php echo $amount; ?>" class="form-control" id="usr" required>
					</div>
					<div class="form-group">
					  <label for="usr" class="font-weight-bold">Enter Date:</label>
					  <input type="date" name="date" value="<?php echo $idate; ?>" class="form-control" id="usr" required>
					</div>
					<div class="form-group">
					  <label for="usr" class="font-weight-bold">Enter Description:</label>
					  <input type="text" name="des" value="<?php echo $description; ?>" class="form-control" id="usr" required>
					</div>
				
				</div>
                <?php if ($update == true) : ?>
                    <button class="btn btn-lg btn-block btn-warning" style="border-radius: 0%;" type="submit" name="update">Update</button>
                    <?php elseif ($del == true) : ?>
                        <button class="btn btn-lg btn-block btn-danger" style="border-radius: 0%;" type="submit" name="delete">Delete</button>
                    <?php else : ?>
                        <button type="submit" name="add" class="btn btn-lg btn-block btn-success" style="border-radius: 0%;">Add Income</button>
                    <?php endif ?>
				
			</div>
			</div>
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>
    <script>
        feather.replace();
    </script>
</body>
</html>