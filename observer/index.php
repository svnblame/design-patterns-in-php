<?php

interface Subject {
	public function attach($observable);
	public function detach($observer);
	public function notify();
}

interface Observer {
	public function handle();
}

class Login implements Subject {

	protected $observers = [];

	public function attach($observable)
	{
		if (is_array($observable))
		{
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
		foreach ($this->observers as $observer)
		{
			$observer->handle();
		}
	}

	protected function attachObservers($observable)
	{
		foreach ($observable as $observer)
		{
			$this->attach($observer);
		}
		return;
	}

	public function fire()
	{
		// perform login
		// notify listeners
		$this->notify();
	}
}

class LogHandler implements Observer
{
	public function handle()
	{
		var_dump('log something important');
	}
}

class EmailHandler implements Observer
{
	public function handle()
	{
		var_dump('fire off an email');
	}
}

class LoginReporter implements Observer
{
	public function handle()
	{
		var_dump('login report created');
	}
}

$login = new Login;
$login->attach([
	new LogHandler, 
	new EmailHandler,
	new LoginReporter
]);

$login->fire();
