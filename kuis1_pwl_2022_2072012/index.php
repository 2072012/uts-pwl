<?php
//2072012 Jason Himendrian Hofendi
session_start();
if (!isset($_SESSION['is_user_logged'])) {
    $_SESSION['is_user_logged'] = false;
}

include_once 'dao/PDOUtil.php';
include_once 'dao/ParkingDao.php';
include_once 'dao/TicketDao.php';
include_once 'dao/UserDao.php';
include_once 'entity/Parking.php';
include_once 'entity/Ticket.php';
include_once 'entity/User.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PWL Kuis 1</title>

</head>
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href ="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.3/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<body>
<?php
if($_SESSION['is_user_logged']){
    ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a href="?menu=home" class="nav-link">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a href="?menu=ticket" class="nav-link">Ticket Price</a>
                </li>
                <li class="nav-item">
                    <a href="?menu=parking" class="nav-link">Parking Management</a>
                </li>
                <li class="nav-item">
                    <a href="?menu=logout" class="nav-link">Log Out</a>
                </li>
            </ul>
        </div>
    </nav>

    <main class="main">
        <?php
        $navigation = filter_input(INPUT_GET, 'menu');
        switch ($navigation){
            case 'home':
                include_once 'pages/home.php';
                break;
            case 'ticket':
                include_once 'pages/ticket.php';
                break;
            case 'parking':
                include_once 'pages/parking.php';
                break;
            case 'logout':
                session_unset();
                session_destroy();
                header('location:index.php');
                break;
            default:
                include_once 'pages/home.php';
        }
        ?>
    </main>
    <?php
} else {
    include_once 'pages/login.php';
}
?>
<script>
    $(document).ready(function ()){
        $('#myTable').DataTable();
    });
</script>

</body>
</html>