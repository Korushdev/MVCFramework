<?php
    namespace Infrastructure\Core
    {         
        class View
        {
            public function ReturnView( $viewName, $_model = NULL )
            {      
                $model = ( $_model ) ? $_model : NULL;         
                require_once( "Views/" . $viewName . ".php" ); 
            }
        }
    }
?>