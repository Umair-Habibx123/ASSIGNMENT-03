<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "umair_projects";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$successMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = substr($_POST["project_id"], 0, 15); // Truncate to 15 characters
    $name =substr( $_POST["Name"], 0, 255);

    $sql = "DELETE FROM projects WHERE  (project_id  = '$id' || Name = '$name')";

    if ($conn->query($sql) === TRUE) {
        $successMessage = "successfully deleted" ;
    } 
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Project</title>
    <link rel="stylesheet" href="/css/add-Proj.css">
</head>

<body>

    <h1>Delete Existing Project</h1>
    <form action="" method="post">

    <label for="project_id">Project ID: </label>
        <input type="number" name="project_id" id="project_id" required>
 <label for="Name">Project Name: </label>
        <input type="text" name="Name" id="Name">

        <div id="buttons">
            <button type="submit" id="submit">Submit</button>
            <button id="cancel" onclick="window.location.href='ASS03.php'">Back</button>
        </div>

        <?php if (!empty($successMessage)) : ?>
            <p id="success-message"><?php echo $successMessage; ?></p>
            <script>
                setTimeout(function() {
                    document.getElementById("success-message").style.display = "none";
                }, 5000);
            </script>
        <?php endif; ?>
    </form>


</body>

</html>