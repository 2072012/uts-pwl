<?php //2072012 Jason Himendrian Hofendi
$parkingDao = new \dao\ParkingDao();

$saveButtonPressed = filter_input(INPUT_POST, "btnSave");
if (isset($saveButtonPressed)){
    $id = filter_input(INPUT_POST, "txtId");
    $type = filter_input(INPUT_POST, "txtType");
    $checkIn = filter_input(INPUT_POST, "timeIn");
    $checkOut = filter_input(INPUT_POST, "timeOut");
    if (trim($id) == ""){
        echo 'Please fill a valid vehicle Id';
    } else {
        $parking = new \entity\Parking();
        $parking->setVehicleId()($id);
        $parking->setVehicleType($type);
        $parking->setCheckIn($checkIn);
        $parking->setCheckOut($checkOut);
        $result  = $parkingDao->addParkingToDB($parking);
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
        <label for="txtId">Vehicle Id</label>
        <input class="form-control" type="text" maxlength="10" id="txtId" name="txtId" required autofocus placeholder="Input Price">
    </div>
    <div class="form-group">
        <label for="txtType">Vehicle Type</label>
        <select class="form-control" name="txtType">
            <option>Car</option>
            <option>Motor</option>
        </select>
    </div>
    <div class="form-group">
        <label for="timeIn">Check-in Time</label>
        <input class="form-control" type="datetime-local" id="timeIn" name="timeIn" required  placeholder="">
    </div>
    <div class="form-group">
        <label for="timeOut">Check-out Time</label>
        <input class="form-control" type="datetime-local" id="timeOut" name="timeOut" required  placeholder="">
    </div>
    <input class="btn btn-info" class="form-control" type="submit" name="btnSave" value="Save Data">
</form>



<table id="myTable" class="table table-striped table-bordered" style="width:100%">
    <thead class="thead-dark">
    <th>Check in-out</th>
    <th>Vehicle Id-Type</th>
    <th>Price</th>
    </thead>
    <tbody>
    <?php
    $parkings = $parkingDao->fetchParkingFromDB();
    /** @var \entity\Parking $parkings */
    foreach ($parkings as $park){
        echo '<tr>';
        echo '<td>' . $park->getCheckIn().$park->getCheckOut(). '</td>';
        echo '<td>' . $park->getVehicleId() .$park->getType(). '</td>';
        echo '<td>' . $park->getPrice() . '</td>';

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
