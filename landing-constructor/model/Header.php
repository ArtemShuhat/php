<?php

class Header extends Block
{

	private $landing_header;

	public function __construct($landing_header = "Header")
	{
		$this->landing_header = $landing_header;
	}

	public function draw()
	{
		$str = <<<EOD
    <!-------------Блок "Header"-------------------------->
    <div class='header'>
        <h1>{$this->landing_header} </h1>
    </div>
    <!------------- Кінець блоку "Header"-------------------->\n
EOD;
		return $str;
	}
}