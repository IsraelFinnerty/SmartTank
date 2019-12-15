<?php
    $servername = "192.168.5.3";
    $username = "root";
    $password = "";
    $dbname = "SmartTank";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM OilProviders";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<br> id: ". $row["id"]. " - Name: ". $row["name"]. " " . $row["email"] . "<br>";
        }
    } else {
        echo "0 results";
    }

    $conn->close();
    ?>