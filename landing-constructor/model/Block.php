<?php
abstract class Block
{
	protected $on;
	function __construct($name)
	{
		$this->name = $name;
	}
	public abstract function draw();
}