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

    $income = "INSERT INTO income ('user_id', 'amount','tdate','description') VALUES ('$userid', '$amount','$date','$des')";
    $result = mysqli_query($con, $income) or die("Something Went Wrong!");
    header('location: add_expense.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Expense Manager - Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">

    <!-- Feather JS for Icons -->
    <script src="js/feather.min.js"></script>

</head>

<body>

    <div class="d-flex" id="wrapper">

        <!-- Sidebar -->
        <?php
            include_once("sidebar.php");
        ?>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
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
				<h3 class="text-info">Add Income</h3>
				<div class="card-body">
					<form action="add_income.php" method="post" autocomplete="off">
					<div class="form-group">
					  <label for="usr" class="font-weight-bold">Enter Amount:</label>
					  <input type="number" name="amount" class="form-control" id="usr" required>
					</div>
					<div class="form-group">
					  <label for="usr" class="font-weight-bold">Enter Date:</label>
					  <input type="date" name="date" class="form-control" id="usr" required>
					</div>
					<div class="form-group">
					  <label for="usr" class="font-weight-bold">Enter Description:</label>
					  <input type="text" name="des" class="form-control" id="usr" required>
					</div>
				
				</div>
				<button type="submit" class="btn btn-success text-white" name="add">Add Income</button>
				
			</div>
			</div>
		
			

          <!-- /#wrapper -->

    <!-- Bootstrap core JavaScript -->
    <script src="js/jquery.slim.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/Chart.min.js"></script>
    <!-- Menu Toggle Script -->
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