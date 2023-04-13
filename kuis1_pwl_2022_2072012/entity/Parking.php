<?php

namespace entity;
//2072012 Jason Himendrian Hofendi
class Parking
{
    private  string $timeId;
    private string $vehicleId;

    private string $vehicleType;

    /**
     * @return string
     */
    public function getVehicleType(): string
    {
        return $this->vehicleType;
    }

    /**
     * @param string $vehicleType
     */
    public function setVehicleType(string $vehicleType): void
    {
        $this->vehicleType = $vehicleType;
    }

    private  string  $type;
    private string $checkIn;

    /**
     * @return string
     */
    public function getTimeId(): string
    {
        return $this->timeId;
    }

    /**
     * @param string $timeId
     */
    public function setTimeId(string $timeId): void
    {
        $this->timeId = $timeId;
    }

    /**
     * @return string
     */
    public function getVehicleId(): string
    {
        return $this->vehicleId;
    }

    /**
     * @param string $vehicleId
     */
    public function setVehicleId(string $vehicleId): void
    {
        $this->vehicleId = $vehicleId;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getCheckIn(): string
    {
        return $this->checkIn;
    }

    /**
     * @param string $checkIn
     */
    public function setCheckIn(string $checkIn): void
    {
        $this->checkIn = $checkIn;
    }

    /**
     * @return string
     */
    public function getCheckOut(): string
    {
        return $this->checkOut;
    }

    /**
     * @param string $checkOut
     */
    public function setCheckOut(string $checkOut): void
    {
        $this->checkOut = $checkOut;
    }

    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * @param int $price
     */
    public function setPrice(int $price): void
    {
        $this->price = $price;
    }
    private string $checkOut;

    private int $price;
}