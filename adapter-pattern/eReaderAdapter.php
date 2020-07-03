<?php

namespace Acme;

class eReaderAdapter implements BookInterface
{
    /**
     * @var \Acme\Kindle
     */
    private $reader;

    /**
     * @param \Acme\eReaderInterface $reader
     */
    public function __construct(eReaderInterface $reader)
    {
        $this->reader = $reader;
    }

    public function open()
    {
        return $this->reader->turnOn();
    }

    public function turnPage()
    {
        return $this->reader->pressNextButton();
    }
}