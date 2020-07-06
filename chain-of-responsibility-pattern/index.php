<?php

abstract class HomeChecker
{
    /**
     * @var \HomeChecker
     */
    protected $successor;

    public abstract function check(HomeStatus $home);

    public function setSuccessor(HomeChecker $successor)
    {
        $this->successor = $successor;
    }

    public function next(HomeStatus $home)
    {
        if ($this->successor) {

            $this->successor->check($home);
        }
    }

}

class Locks extends HomeChecker
{
    public function check(HomeStatus $home)
    {
        if ( ! $home->locked) {
            throw new Exception('The doors are not locked!! Abort abort.');
        }

        $this->next($home);
    }

}

class Lights extends HomeChecker
{

    public function check(HomeStatus $home)
    {
        if ( ! $home->lightsOff) {
            throw new Exception('The ligths are still on!! Abort abort.');
        }

        $this->next($home);
    }
}

class Alarm extends HomeChecker
{

    public function check(HomeStatus $home)
    {
        if ( ! $home->alarmOn) {
            throw new Exception('The alarm has not been set! Abort abort.');
        }

        $this->next($home);
    }
}

//represents the current state of the home
class HomeStatus
{
    public $alarmOn = true;

    public $locked = true;

    public $lightsOff = true;

}

// ....
$locks = new Locks;
$lights = new Lights;
$alarm = new Alarm;

$locks->setSuccessor($lights);
$lights->setSuccessor($alarm);

$locks->check(new HomeStatus());

