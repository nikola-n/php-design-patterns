#Template method pattern

# 1 Example
Building a sandwich shop.
You have all different classes that represents the type of sandwich. ex. Turkey Sub, Veggie Sub etc.
We make one class TurkeySub and within make method we chain call all the methods that needs to make
the sandwich. 

Must Know: To chain methods you have to return $this in each method.

Now to make a VeggieSub its pretty much the same, instead of turkey we add veggies.

This means we need to implement the template method pattern.
We extract the identical methods in a abstract class. 
Than we extract the algorithm method (make) into the abstract Sub class, but the two methods 
from each class still differ (addTurkey and addVeggie) 
To handle this we add abstract method in the abstract class with unique name for the two classes
(addPrimaryToppings)

Must Know: abstract and interface methods DOES NOT have a body.
If you add abstract method, this means that the abstract class is going to require a sub class(TurkeySub, VeggieSub)
to offer this method. 

#2 Example
Laracasts authentication tutorial
We have presumably many authentication providers (github, google etc) and they are all pretty much the same.
To prevent duplication we use this pattern. In contacts/ Provider.php interface we use 
authorize method and user method that provides information for the user.
Then we have abstract class Provider.php
The methods from the interface are stored in this abstract class. In the abstract class these methods have
use a abstract methods which are applied in the Github.php class or Google.php class.  