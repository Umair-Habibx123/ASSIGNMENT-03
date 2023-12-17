<?php
session_start();

// Check if the user has a visit cookie
$visitCookie = 'user_visited';
if (!isset($_COOKIE[$visitCookie])) {
    // Set the visit cookie
    setcookie($visitCookie, 'visited', time() + 86400, "/"); // Cookie valid for 1 day (86400 seconds)

    // Read the current count from the counter file
    $counterFile = 'counter.txt';
    $count = (file_exists($counterFile)) ? (int)file_get_contents($counterFile) : 0;

    // Increment the count for each new visit
    $count= $count + 1;

    // Update the counter file with the new count
    file_put_contents($counterFile, $count);
} 

else {
    // If the user has visited before, load the count from the file
    $counterFile = 'counter.txt';
    $count = (file_exists($counterFile)) ? (int)file_get_contents($counterFile) : 0;
}

// Get the user type from the session
$btn = isset($_SESSION["btn"]) ? $_SESSION["btn"] : "User";
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>ASSIGNMENT 03</title>
  <link rel="stylesheet" href="/css/ASS03.css" >
</head>

<body>

  <header class="head">
    <img src="/others/IMG20230311103341.jpg" alt="image not found" height="70px" width="100px" />
    <div class="text1">
      <h1>Expertise</h1>
      <ul>
        <li>C++</li>
        <li>Java</li>
        <li>Python</li>
        <li>HTML/CSS</li>
        <li>JavaScript</li>
      </ul>
    </div>
    <div class="text2">
      <h1>Skills</h1>
      <ul>
        <li>C++</li>
        <li>Java</li>
        <li>Python</li>
        <li>HTML/CSS</li>
        <li>JavaScript</li>
      </ul>
    </div>
    <div class="login">
      <p id="pa">USER LOGGED IN</p><br>
      <a href="login.php"><button id="btn"><?php echo $btn; ?></button></a>
    </div>
  </header>

  <div class="center">
    <aside class="side">
      <div class="items">
        <ul>
          <a>
            <li>HOME</li>
          </a>
          <a>
            <li>ABOUT-US</li>
          </a>
          <a href="add-Proj.php">
            <li id="adp" >ADD PROJECT</li>
          </a>
          <a href="add-conf.php">
            <li id="rep" >ADD CONFERENCE</li>
          </a>
          <a href="del-proj.php">
            <li id="ddp" >DELETE PROJECT</li>
          </a>
          <a href="del-confs.php">
            <li id="dep" >DELETE CONFERENCE</li>
          </a>
          <a>
            <li>CONTACT_US</li>
          </a>
        </ul>
        <br>
        <h1>NO. OF USERS</h1><br>
        <h2><?php echo $count ?></h2>
      </div>

    </aside>
    <main id=main>
      <div id="work">
        <div>
          <h1>Projects<hr></h1>
          <div>
            <?php include('projects.php'); ?>
          </div>
        </div>
        <div>
          <h1>Conferences<hr></h1>
          <div>
            <?php include('conferences.php'); ?>
          </div>
        </div>
      </div>
    </main>
  </div>

  <footer class="foot">
  <h1 id="founders">Founders</h1>
        <div>
            <div>
                <img src="/others/IMG20230311103341.jpg" alt="Talha" />
                <h1>UMAIR HABIB</h1>
                <div>
                    <a href="facebook.com"><img src="/others/facebook.svg" alt="fb" class="icons"></a>
                    <a href="instagram.com"><img src="/others/instagram.svg" alt="fb" class="icons"></a>
                    <a href="twitter.com"><img src="/others/twitter.svg" alt="fb" class="icons"></a>
                    <a href="linkedin.com"><img src="/others/linkedin.svg" alt="fb" class="icons"></a>
                </div>
            </div>
            <div>
                <img src="/others/jawad.jpeg" alt="jawad" />
                <h1>JAWAD AKBAR</h1>
                <div>
                    <a href="facebook.com"><img src="/others/facebook.svg" alt="fb" class="icons"></a>
                    <a href="instagram.com"><img src="/others/instagram.svg" alt="fb" class="icons"></a>
                    <a href="twitter.com"><img src="/others/twitter.svg" alt="fb" class="icons"></a>
                    <a href="linkedin.com"><img src="/others/linkedin.svg" alt="fb" class="icons"></a>
                </div>
            </div>
            <div>
                <img src="/others/shsher.jpeg" alt="Shaher" />
                <h1>M. SHAHER</h1>
                <div>
                    <a href="facebook.com"><img src="/others/facebook.svg" alt="fb" class="icons"></a>
                    <a href="instagram.com"><img src="/others/instagram.svg" alt="fb" class="icons"></a>
                    <a href="twitter.com"><img src="/others/twitter.svg" alt="fb" class="icons"></a>
                    <a href="linkedin.com"><img src="/others/linkedin.svg" alt="fb" class="icons"></a>
                </div>
            </div>
        </div>
    <div id="copyright">
      <p>Copyright &copy; www.FoodHeaven.com. All Rights Reserved 2023!</p>
    </div>
  </footer>

</body>

<script src = "/js/ASS03.js"></script>

</html>