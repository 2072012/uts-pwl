<h1>
Welcome <?php
    $userDao = new \dao\UserDao();
    $user = $userDao->login();
    echo $user->getName();
    ?>
</h1>
//2072012 Jason Himendrian Hofendi