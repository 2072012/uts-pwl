<?php
//2072012 Jason Himendrian Hofendi
$ticketDao = new \dao\TicketDao();

$saveButtonPressed = filter_input(INPUT_POST, "btnSave");
if (isset($saveButtonPressed)){
    $type = filter_input(INPUT_POST, "txtType");
    $price = filter_input(INPUT_POST, "intPrice");
    if (trim($type) == ""){
        echo 'Please fill a valid vehicle type';
    } else {
        $ticket = new \entity\Ticket();
        $ticket->setType($type);
        $ticket->setPrice($price);
        $result  = $ticketDao->addTicketToDB($ticket);
        if($result){
            echo '<div>Data Successfully added </div>';
        }else{
            echo '<div>Failed to add Genre </div>';
        }
    }
}
?>

<form class="form-group" method="post">
    <div class="form-group">
        <label for="txtType">Vehicle Type</label>
        <select class="form-control" name="txtType">
            <option>Car</option>
            <option>Motor</option>
        </select>
    </div>
    <div class="form-group">
        <label for="intPrice">Parking Price</label>
        <input class="form-control" type="number" maxlength="11" id="intPrice" name="intPrice" required autofocus placeholder="Input Price">
    </div>
    <input class="btn btn-info" class="form-control" type="submit" name="btnSave" value="Save Data">
</form>



<table id="myTable" class="table table-striped table-bordered" style="width:100%">
    <thead class="thead-dark">
    <th>ID</th>
    <th>Vehicle Type</th>
    <th>Price</th>
    <th>Status</th>
    </thead>
    <tbody>
    <?php
    $tickets = $ticketDao->fetchTicketFromDB();
    /** @var \entity\Ticket $ticket */
    foreach ($tickets as $ticket){
        echo '<tr>';
        echo '<td>' . $ticket->getId(). '</td>';
        echo '<td>' . $ticket->getType() . '</td>';
        echo '<td>' . $ticket->getPrice() . '</td>';
        echo '<td>' . $ticket->getStatus() . '</td>';

        echo '</tr>';
    }
    ?>
    </tbody>
</table>

<script>
    $(document).ready(function () {
        $('#myTable').DataTable();
    });
</script>
