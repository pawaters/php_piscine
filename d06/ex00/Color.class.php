<?php
    class Color
    {
        public $red;
        public $green;
        public $blue;

        public static $verbose = FALSE;

        //the standard functions of the class
        public static function doc()
        {
            if (file_exists("Color.doc.txt"))
				return file_get_contents("Color.doc.txt");
        }

        public function __toString()
        {
            return(sprintf("Color( red: %3d, green: %3d, blue: %3d)", $this->red, $this->green, $this->blue));
        }

        public function __construct(array $color)
        {
            if(!isset($color['rgb']) && (!isset($color['red'])))
                || !isset($color['green']) || !isset($color['blue'])))

        }

        public function __destruct()
        {

        }

        public function __destruct()
        {

        }

         //the exercise specific functions of the class
        public function add()
        {

        }

        public function sub()
        {

        }
        
        public function multi()
        {

        }
    }

?>