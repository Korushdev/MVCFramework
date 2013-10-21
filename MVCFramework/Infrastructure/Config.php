<?php
    namespace Infrastructure
    {
        class Site
        {
            public static $UrlOffset = "/";  
            public static $Url = "";

            public function __Construct()
            {
                self::$Url = "http://localhost/" . self::$UrlOffset;      
            }
        }
    }
?>