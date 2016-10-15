<?php namespace Acme;


class eReaderAdapter implements BookInterface
{

    private $reader;

    public function __construct(eReaderInterface $reader)
    {
        $this->reader = $reader;
    }

    public function open()
    {
        // Wrap Kindle specific implementation of "open"
        return $this->reader->turnOn();
    }

    public function turnPage()
    {
        // Wrap Kindle specific implementation of "turnPage"
        return $this->reader->pressNextButton();
    }
}
