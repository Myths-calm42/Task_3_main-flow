<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login_process.php");
    exit();
}

include 'database.php';
$email = $_SESSION['email'];
$sql = "SELECT name, email, experience,gender FROM users WHERE email='$email'";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    echo "User not found.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile</title>
    <link rel="stylesheet" href=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <style>
        .card{
            postion:relative;
            left: 500px;
            top:30px;
        }
        body{
            background-image: url(8.jpg);
            background-size:2200px;
        }
    </style>
</head>
<body >


    <div class="card" style="width: 18rem;">
        <img src="profile.jpg" hight="300px" width="400px" class="card-img-top" alt="profile">
        <div class="card-body">
          <h5 class="card-title">Profile</h5>
          <p class="card-text">
    <b>Name:-</b> <?php echo htmlspecialchars($user['name']); ?><br>
    <b>Email:-</b><?php echo htmlspecialchars($user['email']); ?><br>
    <b>Gender:-</b> <?php echo htmlspecialchars($user['gender']); ?><br>
    <b>Experience:-</b> <?php echo htmlspecialchars($user['experience']); ?><br>
        </p>

          <a href="logout.php" class="btn btn-primary">Logout</a>
        </div>
    </div>
   
</body>
</html>




