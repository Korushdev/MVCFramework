<?php
    namespace Infrastructure\Functions
    {
        class Core
        {
            // Returns the current page URL
            public static function GetCurrentUrl()
            {
                $page_url = 'http';
                if ( isset( $_SERVER["HTTPS"] ) == "on" ) 
                {
                    $page_url .= "s";
                }
        
                $page_url .= "://";
        
                if ( $_SERVER[ "SERVER_PORT" ] != "80" ) 
                {
                    $page_url .= $_SERVER[ "SERVER_NAME" ].":".$_SERVER[ "SERVER_PORT" ].$_SERVER[ "REQUEST_URI" ];
                } 
                else 
                {
                    $page_url .= $_SERVER[ "SERVER_NAME" ].$_SERVER[ "REQUEST_URI" ];
                }
                return $page_url;
            }  

            // Puts <pre> tags around the print_r statement
            public static function PrintExt( $array )
            {
                echo "<pre>";
                print_r( $array );
                echo "</pre>";                   
            }    
        }
    }
?>