Hardly used, maybe never. Jeffrey doesn't like it much.

#Specification Pattern with TDD

##1 Example
Maybe in your app a customer can be gold subscriber. It is a very important concept in your domain because
if a customer is labeled gold it gets access to all additional things that no one else in the app gets.
So we take this concepts and we elevate it to the first class citizen as a class.

We apply this class CustomerIsGold to any existing Customer objects and we determine if that customer
satisfies the rule. We take every kind of logic is required to determine if the customer is gold
and we accept the customer object and perform that business rule upon it and find the answer.


