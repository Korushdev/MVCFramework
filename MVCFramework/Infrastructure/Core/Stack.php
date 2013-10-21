<?php
    namespace Infrastructure\Core
    {
        class Stack
        {
            public static $Data = array();

            public static function Push( $line )
            {
                array_push( self::$Data, $line );
            }

            public static function Write()
            {
                implode( "<br />", self::$Data );
            }
        }
    }
?>