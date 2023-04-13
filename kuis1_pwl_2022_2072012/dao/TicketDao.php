<?php
namespace dao;
//2072012 Jason Himendrian Hofendi
use entity\Ticket;
use PDO;

class TicketDao
{
    public function fetchTicketFromDB(): array
    {
        $link = PDOUtil::createMySQLConnection();
        $query = 'SELECT * FROM ticket_price';
        $stmt = $link->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Ticket::class);
        $stmt->execute();
        $result = $stmt->fetchAll();
        $link = null;
        return $result;
    }

    public function addTicketToDB(Ticket $ticket):int
    {
        $result = 0;
        $link = PDOUtil::createMySQLConnection();
        $link->beginTransaction();
        $query = "INSERT INTO ticket_price(type, price) VALUES (?)";
        $stmt = $link->prepare($query);
        $stmt->bindValue(1, $ticket->getType());
        $stmt->bindValue(1, $ticket->getPrice());
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