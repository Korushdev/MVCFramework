<?php    
    namespace Infrastructure\Routing
    {
        use Infrastructure\Site as Site;
        //use Infrastructure\Functions\Core as Core;    

        class Routing
        {            
            public $Dir = "";   
            public $HashObject = ""; 
            public $QueryObject = ""; 
            public $UrlObject = ""; 
            
            public function __Construct()
            {
                global $_SERVER;

                $this->Dir = $_SERVER['DOCUMENT_ROOT'] . '/' . Site::$UrlOffset;   
                $this->HashObject = explode( '#', \Core::GetCurrentUrl() ); 
                $this->QueryObject = explode('?', $this->HashObject[0]); 
                $this->UrlObject = explode('/', $this->QueryObject[0]);  
            }

            public function Route()
            {
                $offsetUrlDividerCount = explode('/', Site::$UrlOffset); 
                $offsetUrlDividerCount = count( $offsetUrlDividerCount );
                if( $offsetUrlDividerCount == 1 ){             
                    $urlObject1 = array_slice( $this->UrlObject, 0, 3 );  
                    $urlObject2 = array_slice( $this->UrlObject, 3 ); 
                    $this->UrlObject = array_merge( $urlObject1, array( "new" => false ), $urlObject2 );
                    $this->UrlObject = array_values( $this->UrlObject );
                }
                else
                {
                    $urlObject1 = array_slice( $this->UrlObject, 0, 3 );  
                    $urlObject2 = array_slice( $this->UrlObject, 2 + ( $offsetUrlDividerCount - 1 ) );
                    $this->UrlObject = array_merge( $urlObject1, $urlObject2 );  
                }  
            }
        }
    }
?>