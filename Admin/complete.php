<?php
// Start the session
session_start();
$_SESSION['admin_email'];
$_SESSION['admin_name'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Result</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="CSS/viewResultsStyle.css">
  </head>
    <body>
      <!-- Navbar Design -->
     <div class="navbar" style="height:68px ">
      <p><img src="Images/aptitech.png" class="imgdisplay"></p>
      <a href="adminHomePage.php">Home</a>
      <div class="dropdown">
        <button class="dropbtn">Modules<i class="fa fa-caret-down" ></i></button>
        <div class="dropdown-content">
          <a href="manageCategory.php"><i class="fa fa-gear" ></i>Manage Category</a>
          <a href="addCategory.php"><i class="fa fa-plus-circle" ></i>Add Category</a>
          <a href="manageTopics.php"><i class="fa fa-gear" ></i>Manage Topics</a>
          <a href="addTopics.php"><i class="fa fa-plus-circle" ></i>Add Topics</a>
        </div>
      </div> 
      <a href="viewUsers.php">Users</a>
      <a href="viewResults.php">Exam Results</a>
      <div class="dropdown" style="float: right;padding-right: 40px">
        <button class="dropbtn"><i class="fa fa-user" ></i><?php echo $_SESSION['admin_name'];
        ?><i class="fa fa-caret-down" ></i>
        </button>
        <div class="dropdown-content">
          <a href="manageProfile.php">Manage Profile</a>
          <a href="logout.php"> <i class="fa fa-sign-out" ></i>Logout</a>
        </div>
      </div> 
    </div>
    <?php
        $con =mysqli_connect("localhost","root","")or die("unable to   connect");
        mysqli_select_db($con,'aptitech');
         $usn = $_POST['view-details'];
         $query1 = "select * from result where student_usn = '$usn' ";
         $query2 = "select * from student where usn = '$usn' ";
         $tdata = mysqli_query($con,$query1);
         $tdata1 = mysqli_query($con,$query2);
         $r = mysqli_fetch_array($tdata1);
         $sname=$r['name'];
         echo "<br><br><br><br><table class='mainTable' align='center'>
              <tr>
              <th align='center' style='background-color: #005461; padding: 18px 20px;'>" .$sname. " - " .$usn. "</th>
              </tr>
              <tr>
              <th style='padding:40px 30px'>
              <table class='customers' align='center'>
              <tr>
              <th style='text-align:center;'>Topic Name</th>
              <th style='text-align:center;'>Total Marks</th>
              <th style='text-align:center;'>Time Taken</th>
              <th style='text-align:center;'>Date-Time</th>
              <tr>";
         while($res = mysqli_fetch_array($tdata))
        {
         echo"<tr align='center'>";
            echo "<td>".$res['topic_name']."</td>";
            echo "<td>".$res[2]."</td>";
            echo "<td>".$res[3]."</td>";
            echo "<td>".$res[4]."</td>";     
        echo"</tr>";
        }
    ?>
      
    </body>
 </html>
 

