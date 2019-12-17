<?php
    $servername = "172.17.0.31";
    $username = "u1535530_root";
    $password = "9029Izzo";
    $dbname = "db1535530_SmartTank";

   // Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT email FROM OilProviders";
$dbemails = mysqli_query($conn, $sql);
$localemails = array();

if (mysqli_num_rows($dbemails) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($dbemails)) {
        $localemails[] = $row["email"];
    }
}


    if(isset($_POST['submit'])){
    
    $to = $localemails; //emails in DB of local oil providers
    $from = $_POST['email']; // this is the users Email address
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $location = $_POST['location'];
    $quantity = $_POST['quantity'];
    $subject = "Smart Tank Oil Refill Quote Request";
    $subject2 = "Copy of your Smart Tank Oil Refill Quote Request";
    $message = $first_name . " " . $last_name . " is looking for a refill of oil in " . $location . " to the value of " . $quantity . "\n\n" . "Could you please provide them with a quote for " . $quantity . " of oil by emailing " . $from . "\n\n Many thanks, \n Smart Tank";
    $message2 = "Here is a copy of your message.\n" . $message;

    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    mail($to,$subject,$message,$headers);
    mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
    echo "Oil refill quote request sent. Thank you " . $first_name . ", your local oil providers will be in contact with you soon.";
    header('Location: quote.php'); 
    }
  ?>


<!DOCTYPE html>
<html>
<head>
  <script type="text/javascript">
    var theSubmitButton = document.getElementById('formSubmit');

    theSubmitButton.onclick = function() {
        var theFormItself = 
            document.getElementById('theForm');
        theFormItself.style.display = 'none';
        var theSuccessMessage = 
            document.getElementById('successMessage');  
        theSuccessMessage.style.display = 'block';          
    }
</script>
  
<title>Smart Tank</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
input[type=text] {
  width: 100%;
  padding: 5px 5px;
  margin: 8px 0;
  box-sizing: border-box;
}
input[type=button], input[type=submit], input[type=reset] {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 16px 32px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
}
</style>
</head>
<body class="w3-light-grey">

<!-- Top container -->
<div class="w3-bar w3-top w3-white w3-large" style="z-index:4">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
  <span class="w3-bar-item w3-right"><img src = "smart tank logo.png" style="width:75px"></span>
</div>

<!-- Sidebar/menu -->

<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div style="padding: 25px">
  </div>
    <div class="w3-col s4">
      <img src="user.png" class="w3-circle w3-margin-right" style="width:46px">
    </div>
    <div class="w3-col s8 w3-bar">
      <span>Welcome, <strong>User</strong></span><br>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i></a>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-user"></i></a>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-cog"></i></a>
    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h5>Dashboard</h5>
  </div>
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
    <a href="#" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-users fa-fw"></i>  Overview</a>
    
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bullseye fa-fw"></i>  Geo</a>
    
   <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-history fa-fw"></i>  Usage</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-cog fa-fw"></i>  Settings</a><br><br>
  </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i> My Dashboard</b></h5>
  </header>

  <div class="w3-row-padding w3-margin-bottom">
    <iframe width="450" height="260" style="border: 1px solid #cccccc;" src="https://thingspeak.com/channels/920200/widgets/122737"></iframe>

    
    <iframe width="450" height="260" style="border: 1px solid #cccccc;" src="https://thingspeak.com/channels/920200/charts/1?bgcolor=%23ffffff&color=%23d62020&dynamic=true&results=60&type=line&update=15"></iframe>

  </div>

  <div class="w3-row">
  <div class="w3-col s6">
        <h5>Local Oil Providers</h5>
        
        
     
    

   <?php 
    $servername = "172.17.0.31";
    $username = "u1535530_root";
    $password = "9029Izzo";
    $dbname = "db1535530_SmartTank";

   // Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT id, name, location FROM OilProviders";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "Oil Provider " . $row["id"]. " - Name: " . $row["name"]. " - Location: " . $row["location"]. "<br>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);

?>
<img src="oil tank.png" style="width:40%" alt="Oil Tank">
</div>
<div class="w3-col s6">
                <h5>Request Quotes</h5>
                Fill out the form below to request oil quotes from the local oil providers. <br>
     


<form action="" method="post">
First Name: <input type="text" name="first_name"><br>
Last Name: <input type="text" name="last_name"><br>
Location: <input type="text" name="location"><br>
Email: <input type="text" name="email"><br>
Quantity of Oil requested in €: <input type="text" name="quantity"><br>
<input type="submit" name="submit" value="Submit">
</form>
 </div>
  
</div>
  

  <!-- Footer -->
  <footer class="w3-container w3-padding-16 w3-light-grey">
    
  </footer>

  <!-- End page content -->
</div>

<script>
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
    overlayBg.style.display = "none";
  } else {
    mySidebar.style.display = 'block';
    overlayBg.style.display = "block";
  }
}

// Close the sidebar with the close button
function w3_close() {
  mySidebar.style.display = "none";
  overlayBg.style.display = "none";
}
</script>

</body>
</html>
