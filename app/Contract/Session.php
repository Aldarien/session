<?php
namespace App\Contract;

use Aura\Session\SessionFactory;
use App\Definition\Contract;

class Session
{
	use Contract;
	
	protected static function newInstance()
	{
		$session_factory = new SessionFactory();
		return $session_factory->newInstance($_COOKIE);
	}
	public static function get($segment, $name)
	{
		$instance = self::getInstance();
		$segment = $instance->getSegment($segment);
		return $segment->get($name);
	}
	public static function set($segment, $name, $value)
	{
		$instance = self::getInstance();
		$segment = $instance->getSegment($segment);
		$segment->set($name, $value);
	}
}
?>