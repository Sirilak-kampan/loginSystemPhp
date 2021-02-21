<?php

session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: login.php');
	exit;
}

include "funtions.php";


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Responsive Sidebar Menu</title>
	<link rel="stylesheet" href="style.css">	
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script>
    	$(document).ready(function(){
    		$(".hamburger .fas").click(function(){
		    	$(".wrapper").addClass("active")
			})

			$(".wrapper .sidebar .close").click(function(){
		    	$(".wrapper").removeClass("active")
			})
    	})
    </script>
</head>
<body>


<div class="wrapper">
    <div class="sidebar">
      <div class="bg_shadow"></div>
        <div class="sidebar__inner">
           <div class="close">
          <i class="fas fa-times"></i>
        </div>
        <div class="profile_info">
            <div class="profile_img">
              <img src="image/nattgroda.jpg" alt="profile_img">
            </div>
            <div class="profile_data">
                <p class="name"><?php echo $thisUser['0']['username']; ?></p>  
                <!--<p class="role">your job</p>-->
                <div class="btn"><a class="uppro" href="update-profile.php">Update Profile</a></div>
            </div>
        </div>
        <ul class="siderbar_menu">
          
          <li><a href="#">
              <div class="icon"><i class="fas fa-file-alt"></i></div>
              <div class="title">Create Post</div>
              </a></li>  
          <li><a href="#">
              <div class="icon"><i class="fas fa-cog"></i></div>
              <div class="title">Settings</div>
              </a></li>  
          <li><a href="#">
              <div class="icon"><i class="fas fa-question-circle"></i></div>
              <div class="title">Help</div>
              </a></li>  
        </ul>
      </div>
    </div>
    <div class="main_container">
      <div class="top_navbar">
          <div class="hamburger">
              <div class="hamburger__inner">
                  <i class="fas fa-bars"></i>  
              </div>  
          </div>
         <ul class="menu">
            <li><a href="#" class="">Blogs</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="#">About</a></li>
         </ul>
         <ul class="right_bar">
            <li><i class="fas fa-search"></i></li>
            <li><a href="logout.php"><i class="fas fa-sign-out-alt"></a></i></li> 
         </ul>
      </div>
      
      <div class="container">
        <div class="item">
          Lorem, ipsum dolor sit amet consectetur adipisicing elit. Doloremque nemo quaerat vel iure quam repudiandae tempora velit sed ducimus obcaecati eum hic dignissimos porro, accusantium at corrupti dolor aut non suscipit eveniet cumque quo culpa?
        </div>
        <div class="item">
          Lorem, ipsum dolor sit amet consectetur adipisicing elit. Doloremque nemo quaerat vel iure quam repudiandae tempora velit sed ducimus obcaecati eum hic dignissimos porro, accusantium at corrupti dolor aut non suscipit eveniet cumque quo culpa?
        </div>
        <div class="item">
          Lorem, ipsum dolor sit amet consectetur adipisicing elit. Doloremque nemo quaerat vel iure quam repudiandae tempora velit sed ducimus obcaecati eum hic dignissimos porro, accusantium at corrupti dolor aut non suscipit eveniet cumque quo culpa?
        </div>
        <div class="item">
          Lorem, ipsum dolor sit amet consectetur adipisicing elit. Doloremque nemo quaerat vel iure quam repudiandae tempora velit sed ducimus obcaecati eum hic dignissimos porro, accusantium at corrupti dolor aut non suscipit eveniet cumque quo culpa?
        </div>
        <div class="item">
          Lorem, ipsum dolor sit amet consectetur adipisicing elit. Doloremque nemo quaerat vel iure quam repudiandae tempora velit sed ducimus obcaecati eum hic dignissimos porro, accusantium at corrupti dolor aut non suscipit eveniet cumque quo culpa?
        </div>
        <div class="item">
          Lorem, ipsum dolor sit amet consectetur adipisicing elit. Doloremque nemo quaerat vel iure quam repudiandae tempora velit sed ducimus obcaecati eum hic dignissimos porro, accusantium at corrupti dolor aut non suscipit eveniet cumque quo culpa?
        </div>
        <div class="item">
          Lorem, ipsum dolor sit amet consectetur adipisicing elit. Doloremque nemo quaerat vel iure quam repudiandae tempora velit sed ducimus obcaecati eum hic dignissimos porro, accusantium at corrupti dolor aut non suscipit eveniet cumque quo culpa?
        </div>
        <div class="item">
          Lorem, ipsum dolor sit amet consectetur adipisicing elit. Doloremque nemo quaerat vel iure quam repudiandae tempora velit sed ducimus obcaecati eum hic dignissimos porro, accusantium at corrupti dolor aut non suscipit eveniet cumque quo culpa?
        </div>
      </div>
      
    </div>
</div>
	
</body>
</html>