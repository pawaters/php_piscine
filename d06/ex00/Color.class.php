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
				echo (PHP_EOL . file_get_contents("Color.doc.txt") . PHP_EOL);
        }

        public function __toString()
        {
            return(sprintf("Color( red: %3d, green: %3d, blue: %3d )", $this->red, $this->green, $this->blue));
        }

        public function __construct(array $color)
        {
            if(!isset($color['rgb']))
            {
                $this->blue = (int)$color['blue'];
                $this->green = (int)$color['green'];
                $this->red = (int)$color['red'];
            }
            else
            {
                $this->blue = (int)$color['rgb'] & 255;
                $this->green = (int)$color['rgb'] >> 8 & 0xFF;
                $this->red = (int)$color['rgb'] >> 16 & 0xFF;
            }
            if (self::$verbose)
            {
                echo $this . ' constructed.' . PHP_EOL;
            }

        }

        public function __destruct()
        {
            if (self::$verbose)
            {
                echo $this . ' destructed.' . PHP_EOL;
            }
        }

         //the exercise specific functions of the class
        public function add(Color $add_color)
        {
            $newColor = new Color([
                'red' => $this->red + $add_color->red,
                'green' => $this->green + $add_color->green,
                'blue' => $this->blue + $add_color->blue,  
            ]);
            return ($newColor);
        }

        public function sub(Color $sub_color)
        {
            $newColor = new Color([
                'red' => $this->red - $sub_color->red,
                'green' => $this->green - $sub_color->green,
                'blue' => $this->blue - $sub_color->blue,  
            ]);
            return ($newColor);
        }
        
        public function mult($multiplier)
        {
            $newColor = new Color([
                'red' => $this->red * $multiplier,
                'green' => $this->green * $multiplier,
                'blue' => $this->blue * $multiplier,  
            ]);
            return ($newColor);
        }
    }
?>