<?php

//The product interface declares the operations for all concrete product
interface Transport
{
    public function ready(): void;

    public function dispatch(): void;

    public function deliver(): void;
}

//The Creator class declares the factory method
abstract class Courier
{
    //factory method
    abstract function getCourierTransport(): Transport;

    //invokable method
    public function sendCourier()
    {
        $transport = $this->getCourierTransport();
        $transport->ready();
        $transport->dispatch();
        $transport->deliver();
    }
}

//The concrete Creator override the factory method and change the type of object created
class AirCourier extends Courier
{

    function getCourierTransport(): Transport
    {
        return new PlaneTransport();
    }
}

//The concrete Creator override the factory method and change the type of object created
class GroundCourier extends Courier
{

    function getCourierTransport(): Transport
    {
        return new TruckTransport();
    }
}

//Concrete product providing implementation of Product interface
class PlaneTransport implements Transport
{

    public function ready(): void
    {
        echo "Courier ready to be sent to the plane.<br>";
    }

    public function dispatch(): void
    {
        echo "Courier is on your way to the plane.<br>";
    }

    public function deliver(): void
    {
        echo "Courier from the plane is delivered to you.<br>";
    }
}

//Concrete product providing implementation of Product interface
class TruckTransport implements Transport
{

    public function ready(): void
    {
        echo "Courier ready to be sent to the truck.<br>";
    }

    public function dispatch(): void
    {
        echo "Courier is on your way to the truck.<br>";
    }

    public function deliver(): void
    {
        echo "Courier from the truck is delivered to you.<br>";
    }
}

//The client code works with the instance of concrete creator or subclass
function deliverCourier(Courier $courier)
{
    $courier->sendCourier();
}

deliverCourier(new GroundCourier());
echo "<br>";
deliverCourier(new AirCourier());