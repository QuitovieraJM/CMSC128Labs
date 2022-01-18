<?php
  session_start();
  $_SESSION['address']
?>
<!DOCTYPE html>
<html lang= "en">
<head> 
    <link rel="stylesheet" type="text/css" href="index.css"> 
    <link rel="stylesheet" type="text/css" href="todo.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <title>To-Do</title>
    <meta charset= "UTF-8">
</head>

<body>
  <div class="header"></div>
      <img src= "avatar.png">
      <h1>HELLO</h1>
      <h1 style= "color:tomato; margin-left: -470px; font-size: 35px; margin-top: 55px;"> <?php echo $_SESSION['address'];?> </h1>
      <div>
        <input type="button" onclick="location.href = 'login.php'" name="logout" id= "logout" value="LOG OUT">
      </div>
    </div>
  <div class="wrapper">
    <div class="sidenav">
      <ul>
       <li><a href="index.php">Dashboard</a></li>
  	   <li><a class= "active" href="todo.php">To-Do</a></li>
      </ul>
	  </div> 
    <div class="content-container">
      <div class="container">
        <header>TO-DO List</header>
        <div class= "inputField">
          <input type= "text" placeholder= "Add your new task">
          <button><i class= "fas fa-plus"></i></button>
        </div>
        <div class= "todoList">
          <ul>
          <!-- Data comes from local storage -->
          </ul>
        </div>
        <div class="footer">
          <span>You have <span class= "pendingNum"></span> pending tasks</span>
          <button>Clear All</button>
        </div>
      </div>
      <script src= "todo.js"></script>
    </div>  
  </div>  
</body>


</html>