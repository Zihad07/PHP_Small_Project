<?php 
    session_start();
    $userid = $_SESSION['id'] ?? 0;
    if($userid){
        header("Location: words.php");
        die();
    }
    require_once('function.php')
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Vocabulary App</title>
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <link rel="stylesheet" href="//cdn.rawgit.com/necolas/normalize.css/master/normalize.css">
    <link rel="stylesheet" href="//cdn.rawgit.com/milligram/milligram/master/dist/milligram.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
          integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

    <link rel="stylesheet" href="assets/css/style.css">

</head>
<body class="home">
    <div class="container" id="main">
        <h1 class="maintitle">
            <i class="fas fa-language"></i><br>
            My Vocabularies
        </h1>

        <div class="row navigation">
            <div class="column column-60 column-offset-20">
                <div class="formaction">
                    <a href="#" id="login">Login</a> | <a href="#" id="register">Register</a>
                </div>

                <div class="formc">
                    <form id="form01" method="post" action="tasks.php">
                        <h3>Login</h3>

                        <fieldset>
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email" placeholder="Email Address">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" placeholder="password">
                            <p>

                                <?php 
                                $status = $_GET['status'] ?? 0;
                                if($status){
                                    echo getStatusMessage($status);
                                }
                                ?>
                            </p>
                            <input class="button-primary" type="submit" value="Submit">
                            <input type="hidden" name="action" id="action" value="login">
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

<!-- my js -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
<script src="script.js"></script>
</script>
</html>

