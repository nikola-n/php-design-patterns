The easiest to understand.
# Real Life example
If you have a digital camera that saves photos in a storage card.
You want to get the pictures of the memory card to the computer but you don't have a 
interface, plug to memory card into to computer.
So you use an adapter where you plug the memory card, and it offers you a port to plug it into the computer.

So the adapter allows you to convert / translate one interface to another.


#1 Code Example

Imagine we have a favorite book class. To consume the book you add open method and turnPage method.
Add new Class Person that has read method that accepts book property which is hinted to the book class. From that property
you can invoke the open and turnPage methods from the book class. 
(new Person)->read(new Book)

But now people start to use e-read instead of paper books. For example if you use Kindle(e-reader) you don't open a book or turn a page,
you turn on the Kindle and then you click a button to turn the page.
So you want to use both but the interfaces don't match and an adapter will fix all of this for us.

What to do:
You need to extract an interface. BookInterface. Then in the Person class
you type hint the interface, and you call the read method.

For the e-reader class Kindle you need to do the same thing, but now the service is different you need different methods
to read the book. So you extract that methods into interface too. 

To allow two different interfaces to communicate you need to create Adapter class.

KindleAdapter implements the BookInterface and now you need to translate these methods to what we use in Kindle class.
To do that you use constructor with Kindle variable dependency.
Now to map open into turnOn method all you need to do is invoke open method from the constructor variable.
Now in the person class you need to call the adapter on the read method 
(new Person)->read(new KindleAdapter(new Kindle));
and you dont have to change the client code. (the person class)

If we have multiple e-readers(Kindle, Nook)

We change the name from KindleAdapter to eReaderAdapter
and instead of type hinting the Kindle class we type hint the eReaderInterface.
Then if we have another Nook e reader that implements eReaderInterface can be called
in the index.php with eReaderAdapter.

#2 Example 
Laravel FilesystemAdapter