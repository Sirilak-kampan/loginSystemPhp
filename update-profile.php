<?php
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.php');
	exit;
}
include "funtions.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="update-style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <title>Update Profile</title>
</head>
<body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<div class="wrapper bg-white mt-sm-5">

    <h4 class="pb-4 border-bottom">Update Profile</h4>
    <div class="d-flex align-items-start py-3 border-bottom"> <?php if(!empty($thisUser['0']['image'])) {
          echo "<img class='img' src='image/".$thisUser['0']['image'].">";
        } else {
          echo "<img class='img' src='image/nattgroda.jpg'>";
        }
        ?>
        <div class="pl-sm-4 pl-2" id="img-section"> <b>Profile Photo</b>
            <p>Accepted file type .png. Less than 1MB</p> <input name="image" id="image" type="file" class="btn border bg-light"></input>
        </div>
    </div>
    <div class="py-2">
        <div class="row py-2">
            <div class="col-md-6"> <label for="username">Username</label> <input type="text" name="username" class="bg-light form-control" value="<?php echo $thisUser['0']['username']; ?>"> </div>
            <div class="col-md-6 pt-md-0 pt-3"> <label for="email">Email</label> <input type="text" name="email" class="bg-light form-control" value="<?php echo $thisUser['0']['email']; ?>"> </div>
        </div>
       
        <div class="row py-2">
            <div class="col-md-6"> <label for="country">Country</label> <select name="country" id="country" class="bg-light">
                    <option value="india">India</option>
                    <option value="usa">USA</option>
                    <option value="uk">UK</option>
                    <option value="uae">UAE</option>
                    <option value="swe" selected>Sweden</option>
                </select> </div>
            <div class="col-md-6 pt-md-0 pt-3" id="lang"> <label for="language">Language</label>
                <div class="arrow"> <select name="language" id="language" class="bg-light">
                        <option value="english">English</option>
                        <option value="english_us">English (United States)</option>
                        <option value="enguk">English UK</option>
                        <option value="arab">Arabic</option>
                        <option value="swedish" selected>Swedish</option>
                    </select> </div>
            </div>
        </div>
        <div class="py-3 pb-4 border-bottom"><button class="btn btn-primary mr-3" name="submit" type="submit">Update</button> <button class="btn border button"><a href="profile.php">Cancel</a></button> </div>
        <div class="d-sm-flex align-items-center pt-3" id="deactivate">
            <div> <b>Deactivate your account</b>
                <p>Details about your company account and password</p>
            </div>
            <div class="ml-auto"> <button class="btn danger">Deactivate</button> </div>
        </div>
    </div>
</div>
    </form>

</body>
</html>