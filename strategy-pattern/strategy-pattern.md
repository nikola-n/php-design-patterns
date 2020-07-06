Mostly used.
#Strategy Pattern

Devide the definition into pieces: 

`Define a family of algorithms` -> (task) that can be executed in multiple ways
Ex. Log some kind of data  
and there are multiple ways to execute this task like: log the value to a file, to a database
send some curl request to a web service and view the data there. (LogToFile, LogToDatabase, LogToXWebService)

`encapsulate and make them interchangeable` -> that means code to a interface (contract) To make the classes
interchangeable they should implement the interface (Logger)


To call the log method from the classes now we make new class App.
That class has a method that injects so kind of data variable and a Logger(interface) variable.
Now you call the log interface method on logger variable within the log method from the app class. 
After that you instantiate the app class and call the log method that accepts the data and the defined 
logger object.

$app = new App;

$app->log('some data',new LogToXWebService);
$app->log('some data',new LogToDatabase;



 #2 Example
 Laravel mail driver
 we have multiple mail drivers if we look in mail.php configuration file.
 'driver' => 'smtp'
 if you change the name it will magically swap to a different mail driver.
 
 registerSwiftTransport returns new TransportManager
 
