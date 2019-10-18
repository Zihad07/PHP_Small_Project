<?php 
require_once("function.php");


$name = $email = $gender = $comment = $website = "";
$errors = [];

if(is_post_request()){
    if(empty($_POST['name'])){
        $errors['name'] = "Name is required";
    }else{
        $name = test_input($_POST["name"]);

        if(!preg_match("/^[a-zA-Z]*$/",$name)){
            $errors['name'] = "Only letter and white space allowed";
        }
    }

    if(empty($_POST["email"])){
        $errors['email']  = "Email is required";
    }else{
        $email = test_input($_POST["email"]);

        if(!is_valid_email($email)){
            $errors['email'] = "Invalid email format";
        }
    }

    if(empty($_POST["website"])){
        $errors['website']  = "";
    }else{
        $website = test_input(($_POST["website"]));

        if(!is_valid_url($website)){
            $errors['website'] = "Invalid URL";
        }
    }

    if(empty($_POST["comment"])){
        $comment = "";
    }else{
        $comment = test_input($_POST["comment"]);
    }

    if(empty($_POST["gender"])){
        $errors['gender']  = "Gender is required";
    }else{
        $gender = test_input($_POST["gender"]);
    }
}else{
    $errors['name'] = "";
    $errors['email'] = "";
    $errors['website'] = "";
    $errors['gender'] = "";
}


?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>PHP | FORM</title>

    <style>
        #footer {
            background: #ddd;
            padding: 20px;
            border-radius: 1px;
        }

        .form {
            border: 5px solid #eee;
            padding: 20px;
            background: #80808026;
            border-radius: 5px;
        }

        lavel {
            font-weight: bolder;
        }


    
    </style>
</head>

<body>
    .
    <div class="container>
        <div class="row">
            <div class="col-md-6 mx-auto">
                <h1 class="text-center">BASIC FORM</h1>

                <form action="index.php" method="post" class="my-4 form">
                    <div class="form-group">
                        <label for="name">Name:<span class="text-danger">*<br> <?php echo $errors['name'];?></span></label>
                        <input type="text" name="name" class="form-control" id="name" value="<?php echo $name;?>">
                        
                    </div>

                    <div class="form-group">
                        <label for="email">Email:<span class="text-danger">*<br> <?php echo $errors['email'];?></span></label>
                        <input type="text" name="email" class="form-control" id="email" value="<?php echo $email;?>">
                         

                    </div>

                    <div class="form-group">
                        <label for="email">Website:<span class="text-danger"><br><?php echo $errors['website'];?></span></label>
                        <input type="text" name="website" class="form-control" id="website" value="<?php echo $website;?>">
                        

                    </div>

                    <div class="form-group">
                        <label for="Comment">Comment:</label>
                        <textarea name="comment" class="form-control" id="comment" cols="40" rows="5"><?php echo $comment;?></textarea>
                    </div>

                    <label for="">Gender:</label>
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" class="gender" name="gender" value="female" <?php if(isset($gender)&&$gender=='female'){echo "checked";}?>>Female
                        </label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" class="gender" name="gender" value="male"<?php if(isset($gender)&&$gender=='male'){echo "checked";}?>>Male
                        </label>
                    </div>
                    <div class="form-check-inline disabled">
                        <label class="form-check-label">
                            <input type="radio" class="gender" name="gender" value="other" <?php if(isset($gender)&&$gender=='other'){echo "checked";}?>> Other
                        </label>
                    </div>

                    <span class="text-danger">*<br><?php echo $errors['gender'];?></span>



                    <input type="submit" value="Submit" class="btn btn-primary mt-4">

                </form>
            </div>
        </div>

        <!-- footer -->
        <footer>
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div id="footer" class="text-center px-2 my-4">
                        &copy;<?php echo date('Y');?>
                    </div>
                </div>
            </div>
        </footer>
    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>