<?php
session_start();

$username = $_SESSION['username'];

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Course 3 Quiz</title>
    <link type='text/css' rel='stylesheet' href='style.css'/>
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open Sans"/>
  </head>
  <body>
    <div id='container'>
      <div id='title'>
        <h1>Course 3</h1> <!-- Course Title (Take Note) -->
        <p style="text-align: center"> Marks has to be more than 50% to Pass! </p>
      </div>
        <br/>
        <div id='quiz'></div>

        <input type="text" id="identifier" value="3" hidden=""> <!-- Course Identifier (Take Note)-->

        <?php
          echo "<input type='text' id='username' value='$username' hidden>";
        ?>
              
        <div class='button' id='next'><a href='#'>Next</a></div>
        <!-- <div class='button' id='prev'><a href='#'>Prev</a></div> -->
        <div class='button' id='start'> <a href='#'>See Result</a></div>
      </div>

    <script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js'></script>
    <script type="text/javascript" src='questions.json'></script>
    <script type='text/javascript' src='course2.js'></script>
  </body>
</html>
