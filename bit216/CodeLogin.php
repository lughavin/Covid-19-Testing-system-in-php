<?php
  include "./db.php";
  session_start();

  $username = $_POST['username'];
  $password = $_POST['password'];

$sql="SELECT * FROM user WHERE username ='$username' && password='$password';";



$result = mysqli_query($conn, $sql);

$num=mysqli_num_rows($result);

$row = $result->fetch_assoc();

$_SESSION['findUser']=$username;



  if ($num==1 && $row['userType'] === 'officer') {
  header("Location: /bit216/registerTestCentre.php");

  } else if ($row['userType'] === 'patient') {
    header("Location: /bit216/recordTester.html");
  }else if ($row['userType'] === 'admin') {
       header("Location: /bit216/manageTestKit.html");
     }
  else {
    echo "<script>
    alert('Username or Password Incorect');
    window.location.href='/bit216/index.html';
    </script>";
  }
  if (isset($_SESSION['findUser'])) {
         echo "session is set";
  }


$conn->close();


  ?>
