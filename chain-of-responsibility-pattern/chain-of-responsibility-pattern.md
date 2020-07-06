#The chain of responsibility pattern

It gives a possibility to chain object calls while giving each of these objects
to ability to end the execution and handle the request or if can't handle the request
it will send you a request of the chain and the next object will have the chance to do the same thing

Benefit: client can make a request without knowing how the request is going to be handled.

#1 Example

When you leave home you need to check a various things: is the alarm on, are the lights off, have you 
locked the doors.
We have classes for all these things. Each class has check method that injects HomeStatus class variable
that checks if the public variable inside the home status class is true. If it's not it throws an
exception. Home status class is a class that gives the status of the home, if every variable is true
you are good to leave the house.

But how to chain all these classes if the condition is met for the first class and need to check the 
second class (Lights)?

We will make abstract base class HomeChecker. This class contains abstract method check and injects the home status class variable.
Which means every class will need to implement this check method.  
To chain all these classes in the abstract class you define a successor(setSuccessor) that accepts
HomeChecker $successor variable. 
Than you need a next method that accepts the Home status variable which is triggered if
there is a successor. This variable invokes the check method again. So after you check the method in the first
class (Lockers) you call the next method that accepts the home status property and this will go and trigger
the next check method on the other classes.

Execution:

If every property is set to true in home status this wont echo anything. 
First you need to make object instances of every class. Than you need to call the setSuccessor method
on each object that you want to trigger the check method next. 
At the end you call the check method on the first object which accepts a new HomeStatus class.

Any of these object have the ability to slice through that chain (end the execution). --> the difference
from the decorator pattern.