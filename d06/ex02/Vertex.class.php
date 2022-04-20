<?php
require_once 'Color.class.php';

class Vertex {
	public static $verbose = FALSE;
	private $_x;
	private $_y;
	private $_z;
	private $_w = 1.0;
	private $_color;

	public static function doc() {
        echo (PHP_EOL . file_get_contents("Vertex.doc.txt"));
	}

    public function __toString() {
		$res = sprintf("Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f",
		$this->_x, $this->_y, $this->_z, $this->_w);
		if (self::$verbose) {
			$res = $res . ", " . $this->_color->__toString();
		}
		$res = $res . " )";
		return $res;
    }

	public function __construct(array $input) {
		$this->_x = $input['x'];
		$this->_y = $input['y'];
		$this->_z = $input['z'];
		if (isset($input['color']) && !empty($input['color'])) {
			$this->_color = $input['color'];
		} else {
			$this->_color = new Color( array('red' => 0xFF, 'green' => 0xFF, 'blue' => 0xFF));
		}
		if (isset($input['w'])) {
			$this->_w = $input['w'];
		}
		if (self::$verbose) {
			echo $this . ' constructed' . PHP_EOL;
		}
	}
	
	public function __destruct() {
		if (self::$verbose) {
			echo $this . ' destructed' . PHP_EOL;
		}
	}
	// get coordinates
	public function getColor() {
		return ($this->_color);
	}
	public function getX() {
		return ($this->_x);
	}
	public function getY() {
		return ($this->_y);
	}
	public function getZ() {
		return ($this->_z);
	}
	public function getW() {
		return ($this->_w);
	}
	// set coordinates
	public function setColor($color) {
		$this->_color = $color;
	}
	public function setX($x) {
		$this->_x = $x;
	}
	public function setY($y) {
		$this->_y = $y;
	}
	public function setZ($z) {
		$this->_z = $z;
	}
	public function setW($w) {
		$this->_w = $w;
	}

}

?>