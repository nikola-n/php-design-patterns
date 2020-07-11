<?php

//Form conversation/ thread will be the subject
//Publisher

//Laravel thinks of this as a basic event system
interface Subject
{
    public function attach($observable);

    public function detach($index);

    //triggering any observers that have been registered
    public function notify();
    //or if you dont want the object to be responsible for that, they want
    //a release method that will return an array of observers to the client and client will be responsible
    //dispatching them
    //public function release();
}

//I am the observer
//Subscriber, Listener
interface Observer
{
    //or update
    public function handle();
}

class Login implements Subject
{

    protected $observers = [];

    /**
     * @param $observable
     *
     * @return $this|void
     * @throws \Exception
     */
    public function attach($observable)
    {
        //if what was passed in this method is an array than we should filter
        //through the array and call this method recursively.
        if (is_array($observable)) {

            return $this->attachObservers($observable);
        }

        $this->observers[] = $observable;

        return $this;
    }

    public function detach($index)
    {
        unset($this->observers[$index]);
    }

    public function notify()
    {
        foreach ($this->observers as $observer) {
            //but now we don't have assurance that a handle method would exists, so we type hint the observer
            $observer->handle();
        }
    }

    /**
     * @param $observable
     *
     * @throws \Exception
     */
    protected function attachObservers($observable)
    {
        foreach ($observable as $observer) {
            //We have lost that ability to enforce the implementation of the Observer
            //by type hinting

            //although there are some php RFC that allow for that, right now there is no way to specify
            // that we require an array of specific instances of a class
            // so we do this check
            if ( ! $observer instanceof Observer) {
                throw new Exception;
            }
            $this->attach($observer);
        }
    }

    public function fire()
    {
        //perform the login
        $this->notify();
    }
}

//listener
class LogHandler implements Observer
{

    public function handle()
    {
        var_dump('Log something important!');
    }
}

class EmailNotifier implements Observer
{

    public function handle()
    {
        var_dump('Fire off an email!');
    }
}
class LoginReporter implements Observer
{

    public function handle()
    {
        var_dump('Fire off an email!');
    }
}

$login = new Login;

//$login->attach(new LogHandler)->attach(new EmailNotifier());
// if you want to be applicable like this way we can no longer type hint the observer in
//the attach method.
//we want $observable object or array of objects.
$login->attach([
    new LogHandler,
    new EmailNotifier,
    new LoginReporter,
]);

$login->fire();