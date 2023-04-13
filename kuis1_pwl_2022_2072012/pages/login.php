<?php
//2072012 Jason Himendrian Hofendi
$userDao = new \dao\UserDao();

$loginPressed = filter_input(INPUT_POST, 'btnLogin');
if (isset($loginPressed)){
    $username = filter_input(INPUT_POST, 'username');
    $password = filter_input(INPUT_POST,'pwd');
    if(trim($username) == '' || trim($password) == ''){
        echo '<div>Please fill username and password</div>';
    }else{
        $user = $userDao->login($username, $password);
        if (!$user) {
            echo '<div>Invalid Email or Password</div>';
        } else if ($user->getUsername() == $username){
            $_SESSION['is_user_logged'] = true;
            $_SESSION['user_name'] = $user->getName();
            header('location:index.php');
        }
    }
}
?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="text-center mb-4">Login Form</h2>
            <form method="post">
                <div class="form-group">
                    <label for="text">Username :</label>
                    <input type="text" class="form-control" id="username" placeholder="Enter username" name="username">
                </div>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
                </div>
                <div class="form-group form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" name="remember"> Remember me
                    </label>
                </div>
                <button type="submit" name="btnLogin" class="btn btn-primary btn-block">Submit</button>
            </form>
        </div>
    </div>
</div>

