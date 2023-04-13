<?php
namespace dao;
//2072012 Jason Himendrian Hofendi
use entity\Parking;
use PDO;

class ParkingDao
{
    public function fetchParkingFromDB(): array
    {
        $link = PDOUtil::createMySQLConnection();
        $query = 'SELECT * FROM parking_detail';
        $stmt = $link->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Parking::class);
        $stmt->execute();
        $result = $stmt->fetchAll();
        $link = null;
        return $result;
    }
    public function addParkingToDB(Parking $parking):int
    {
        $result = 0;
        $link = PDOUtil::createMySQLConnection();
        $link->beginTransaction();
        $query = "INSERT INTO parking_detail(time_id, vehicle_id, vehicle_type, check_in_time, check_out_time, parking_price) VALUES (?)";
        $stmt = $link->prepare($query);
        $stmt->bindValue(1, $parking->getTimeId());
        $stmt->bindValue(2, $parking->getVehicleId());
        $stmt->bindValue(3, $parking->getVehicleType());
        $stmt->bindValue(4, $parking->getCheckIn());
        $stmt->bindValue(5, $parking->getCheckOut());
        $stmt->bindValue(6, $parking->getPrice());
        if($stmt->execute()){
            $link->commit();
            $result = 1;
        }else{
            $link->rollBack();
        }
        $link = null;
        return $result;
    }
}