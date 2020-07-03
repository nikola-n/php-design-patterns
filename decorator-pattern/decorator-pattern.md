<?php
//You run car repair or car maintenance shop
//and you would offer a number of services
//base service may be inspection
//to get the cost simple run getter.
class BasicInspection
{
    public function getCost()
    {
        return 19;
    }
}

echo (new BasicInspection())->getCost();

//But what if you want to know the cost for BasicInspection
//and OilChange

class BasicInspectionAndOilChange
{
    public function getCost()
    {
        return 19 + 19;
    }
}

echo (new BasicInspectionAndOilChange())->getCost();

//And what if you want to know it for plus TireRotation

class BasicInspectionAndOilChangeAndTireRotation
{
    public function getCost()
    {
        return 19+19+19;
    }
}

echo (new BasicInspectionAndOilChangeAndTireRotation())->getCost();

//1.This will quickly break up and you will have dosents of classes for every service
//2.We are hard coding the costs if basicInspection changes to 25, you will have to update
//the cost everywhere.
//3.You can extend the behavior of basic Core Inspection, without hardcoding or creating all this classes.

//To make this work first we need a contract(interface)
//and will determine the cost of the service

//Basic Inspection(normal) will implement the interface
//and we can now determine the cost of the normal service.

//If we want to stack on responsibilities we will add a decorator.
//another class OilChange that will have the cost method.

//Now to add total cost we have to inject a interface property through a constructor.
//and will typehint that interface.
// then add in the cost method the current cost +
//$this->carService->getCost();

//to get total cost then you add the basicInspection class as CarService dependency
//and get the cost from there.

//Wrap the core service with any number of decorators.
//The Decorator must accept some instance, implementation in the constructor of the contract.

//Now how about we have another decorator, like tire rotation
//once again you will wrap the new class with the other

//Whats cool:
//We can build this object at runtime and have them been dynamic

//you can add later another method in the contract if you want and add the method
//in all the classes, it works the same like before

//Decoration vs Inheritance

//Simple example will be if we have a class CarServices and
//that class has a $cost property
//add getter and setter for cost
//make methods for oilchange and tire rotation to return $this->cost += 20;

//This violates the Open Closed Principle !
//-- "Object or component should be open for extension but closed for modification".
//In this example this CarService class is not closed for modification,
//everytime we add a new service it will be modified, we should add new
//method and can cause bugs.

//but if you use interfaces to extand functionality or behavior we never have to worry of any of this stuff.
//the decorator will add behavior.