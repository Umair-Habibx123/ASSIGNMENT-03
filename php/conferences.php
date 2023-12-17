<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "umair_projects";

$conn = new mysqli($servername, $username, $password, $dbname);


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql2 = "SELECT * FROM conference";

$result2 = $conn->query($sql2);

// Check for query execution errors
if (!$result2) {
    die("Query failed: " . $conn->error);
}

if ($result2->num_rows > 0) {

    while ($row = $result2->fetch_assoc()) {
        echo '<div class="conferences" style="text-align:center">';
        echo "<b>Conf_id: </b>" .  htmlspecialchars($row["Conf_id"]) . "<br>";
        echo "<b>Name: </b>" . htmlspecialchars($row["Name"]) . "<br>";
        //echo "<b>Name: </b>" . $row["Name"] . "<br>";
        echo "<b>Title: </b>" . htmlspecialchars( $row["Title"]) . "<br>";
        echo "<b>Work Produced: </b>" .  htmlspecialchars($row["Work Produced"]) . "<br>";
        echo "<b>Date: </b>" . htmlspecialchars( $row["Date"]) . "<br><br>";
        echo '</div>';
    }

}
else {
    echo "<p style='margin: 1rem; color: white;'>0 results</p>";
}

$conn->close();