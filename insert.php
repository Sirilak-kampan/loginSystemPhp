<?php

require_once "config.php";


if (isset($_POST['submit'])) { 
    if ($_POST['username'] == "" || $_POST['email'] == "" || $_POST['password'] == "" || $_POST['confirm_password'] == "") {
        echo "error: all fields are required";
    } else {
        echo "proceed...";
    }
} 
?> 