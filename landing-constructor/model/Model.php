<?php



class Model
{
	private $name;
	private $blocks = array();

	public function __construct($blocks = array(), $name = "Landing-page constructor")
	{
		$this->name = $name;
		$this->blocks = $blocks;

	}


	/**
	 * Get the value of name
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * Set the value of name
	 *
	 * @return  self
	 */
	public function setName($name)
	{
		$this->name = $name;

		return $this;
	}

	/**
	 * Get the value of blocks
	 */
	public function getBlocks()
	{
		return $this->blocks;
	}

	/**
	 * Set the value of blocks
	 *
	 * @return  self
	 */
	public function setBlocks($blocks)
	{
		$this->blocks = $blocks;
	}


	function generate()
	{
		$content = "";
		for ($i = 0; $i < count($this->blocks); $i++) {
			$content .= $this->blocks[$i]->draw();
		}
		return $template = <<<EOD
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>{$this->name}</title>
    </head>
    <body>
        {$content}
    </body>
</html>
EOD;
	}
}