<?php
    namespace Infrastructure\Core
    {
        class Controller extends View
        {
            // This method allows $_POST parameters to be indexed 
            // by the calling method based on their original keys
            private function call_user_func_named( $function, $params )
            {
                 $reflect = new \ReflectionMethod( $function[ 0 ], $function[ 1 ] );
                 $real_params = array();
                 foreach ( $reflect->getParameters() as $i => $param )
                 {
                     $pname = $param->getName();
                     if ( array_key_exists( $pname, $params ))
                     {
                         $real_params[] = $params[ $pname ];
                     }
                     else if ( $param->isDefaultValueAvailable() ) {
                         $real_params[] = $param->getDefaultValue();
                     }
                     else
                     {
                         trigger_error( sprintf( 'call to %s missing parameter nr. %d', $function[ 0 ], $i + 1 ), E_USER_ERROR );
                         return NULL;
                     }
                 }
                 return call_user_func_array( $function, $real_params );
            }
        
            public function Load( $controller = "Home", $action = "Index" )
            {         
                if( file_exists ( "Controllers/" . $controller . "Controller.php" ) )
                {         
                    require_once( "Controllers/" . $controller . "Controller.php" );
                }
                else
                {
                    $this->Load( "Error", "404" );
                    return FALSE;
                }

                $controllerName = $controller . "Controller"; 
                if( class_exists( $controllerName ) )
                {
                    $loadedController = new $controllerName();
                    $actionName = "Action" . $action;
                    $this->call_user_func_named( array( $loadedController, $actionName ), $_POST );
                }
            }
        }
    }
?>