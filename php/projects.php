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

$sql = "SELECT * FROM projects";

$result = $conn->query($sql);

// Check for query execution errors
if (!$result) {
    die("Query failed: " . $conn->error);
}

if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
        echo '<div class="project" style="text-align:center">';
        echo "<b>project-id: </b>" .  htmlspecialchars($row["project_id"]) . "<br>";
        echo "<b>Name: </b>" . htmlspecialchars( $row["Name"]) . "<br>";
        echo "<b>Description: </b>" . htmlspecialchars( $row["Description"]) . "<br>";
        echo "<b>Date: </b>" . htmlspecialchars( $row["Date"]) . "<br>";
        echo "<b>Submitted To: </b>" .  htmlspecialchars($row["Submitted To"]) . "<br><br>";
        echo '</div>';
    }

}
else {
    echo "<p style='margin: 1rem; color: white;'>0 results</p>";
}

$conn->close();