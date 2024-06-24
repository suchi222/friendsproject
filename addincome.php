<?php
include("session.php");
include('config.php');
$amount = "";
$idate = date("Y-m-d");
$description = "";
if (isset($_POST['add'])) {
    $amount = $_POST['amount'];
    $idate = $_POST['date'];
    $description = $_POST['des'];

    $income = "INSERT INTO `income`(`amount`, `idate`, `description`, `user_id`) VALUES($amount,'$idate','$description',$userid)";
    $result = mysqli_query($con, $income) or die("Something Went Wrong!".mysqli_error($con));
    if($result){
        header('location: index.php');
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
                    <a class="dropdown-item" href="#">Your Profile</a>
                    <a class="dropdown-item" href="#">Edit Profile</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="logout.php">Logout</a>
                </div>
            </li>
        </ul>
    </div>
</nav>
       
            <div class="col-md-5 offset-md-1">
			<div class="card mt-4">
				<h3 class="text-info">Add Income</h3>
				<div class="card-body">
					<form action="addincome.php" method="post" autocomplete="off">
					<div class="form-group">
					  <label for="usr" class="font-weight-bold">Enter Amount:</label>
					  <input type="number" name="amount" class="form-control" id="usr" required>
					</div>
					<div class="form-group">
					  <label for="usr" class="font-weight-bold">Enter Date:</label>
					  <input type="date" value="<?php echo $idate; ?>" name="date" class="form-control" id="usr" required>
					</div>
					<div class="form-group">
					  <label for="usr" class="font-weight-bold">Enter Description:</label>
					  <input type="text" name="des" class="form-control" id="usr" required>
					</div>
				
				</div>
				<button type="submit" class="btn btn-success text-white" name="add">Add Income</button>
				
			</div>
			</div>
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script>
        $("#menu-toggle").click(function(e) {
            $("#wrapper").toggleClass("toggled");
        });
    </script>
    <script>
        feather.replace();
    </script>
</body>
</html>