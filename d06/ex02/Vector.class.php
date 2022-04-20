<?php

    require_once 'Vertex.class.php';

    class Vector
    {
        private $_x;
        private $_y;
        private $_z;
        private $_w = 0.0;
        public static $verbose = FALSE;


        //standard functions

        public static function doc()
        {
            echo (PHP_EOL . file_get_contents('Vector.doc.txt') . PHP_EOL);
        }

        public function __toString()
        {
            return sprintf("Vector( x:%4.2f, y:%4.2f, z:%4.2f, w:%4.2f )", $this->_x, $this->_y, $this->_z, $this->_w);
        }

		public function getX()
		{
			return $this->_x;
		}

		public function getY()
		{
			return $this->_y;
		}

		public function getZ()
		{
			return $this->_z;
		}

		public function getW()
		{
			return $this->_w;
		}

        public function __construct(array $vector)
        {
            if(!isset($vector['dest']))
                return FALSE;
            if (!isset($vector['orig']))
                $vector['orig'] = new Vertex(array(
                    'x' => 0.0, 
                    'y' => 0.0,
                    'z' => 0.0
                ));
            $this->_x = $vector['dest']->getX() - $vector['orig']->getX();
            $this->_y = $vector['dest']->getY() - $vector['orig']->getY();
            $this->_z = $vector['dest']->getZ() - $vector['orig']->getZ();
            if (self::$verbose)
				echo $this->__toString() . " constructed" . PHP_EOL;
        }

        public function __destruct()
		{
			if (self::$verbose)
				echo $this->__toString() . " destructed" . PHP_EOL;
		}

        //special functions of the exercise

        public function magnitude()
		{
			$length = sqrt($this->_x **2 + $this->_y **2 + $this->_z **2);
				return $length;
		}

        public function normalize() 
		{
			$len = $this->magnitude();
			if ($len == 0)
				$len = 1;
			$newVector = new Vector(array('dest' => new Vertex([
				'x' => $this->_x / $len,
				'y' => $this->_y / $len,
				'z' => $this->_z / $len])));
			return $newVector;
		}

        public function add(Vector $rhs)
		{
			$newVector = new Vector(array('dest' => new Vertex([
				'x' => $this->_x + $rhs->_x,
				'y' => $this->_y + $rhs->_y,
				'z' => $this->_z + $rhs->_z])));
			return $newVector;
		}

        public function sub(Vector $rhs)
		{
			$newVector = new Vector(array('dest' => new Vertex([
				'x' => $this->_x - $rhs->_x,
				'y' => $this->_y - $rhs->_y,
				'z' => $this->_z - $rhs->_z])));
			return $newVector;
		}

        public function opposite()
		{
			$newVector = new Vector(array('dest' => new Vertex([
				'x' => $this->_x * -1,
				'y' => $this->_y * -1,
				'z' => $this->_z * -1])));
			return $newVector;
		}

        public function scalarProduct($k)
		{
			$newVector = new Vector(array('dest' => new Vertex([
				'x' => $this->_x * $k,
				'y' => $this->_y * $k,
				'z' => $this->_z * $k])));
			return $newVector;
		}

        public function dotProduct(Vector $rhs)
		{
			$product = $this->_x * $rhs->_x + $this->_y * $rhs->_y + 
                $this->_z * $rhs->_z;
			return $product;
		}

        //cos formula is (dot product of vectors / product of magnitudes)
        public function cos(Vector $rhs) {
            $dot = $this->dotProduct($rhs);
            $angle = $this->magnitude() * $rhs->magnitude();	
            return ((float) $dot / $angle);
        }
        
		public function crossProduct(Vector $rhs)
		{
			$newVector = new Vector(array('dest' => new Vertex([
				'x' => $this->_y * $rhs->_z - $this->_z * $rhs->_y,
				'y' => $this->_z * $rhs->_x - $this->_x * $rhs->_z,
				'z' => $this->_x * $rhs->_y - $this->_y * $rhs->_x])));
			return $newVector;
		}

    }

?>