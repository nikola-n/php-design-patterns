#Observer pattern

We want to create one to many relationship, so when one object changes its dependencies, its
observers are immediately notified. Then they can respond to the event that occurred.

Don't use dependency injections - we don't want this observers to know about one another.

Code will be more flexible and follow Single Responsibility principle

A change in one object needs to have a nice flexible decoupled way to notify other
objects of this change, in that way they will respond in a way how they need to.

A way to objects notify one another without being linked.

#1 Example
There is a subject and and observer interface. Subject is the some kind of news letter or form thread.. Observer is the listener.
When a user logs in to your app you need to respond in a number of ways: maybe email
should be fired etc...
That class needs to implement the subject interface. So now when a event is triggered like
login you need to notify the observers. So you make array of observers.

#2 Laravel example

