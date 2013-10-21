<?php
    require_once( "Includes.php" );
    use \Infrastructure\Functions\Core as Core;
    
    $routing = new Infrastructure\Routing\Routing();
    $controller = new Infrastructure\Core\Controller();

    if( !isset( $routing->UrlObject[ 4 ] ) || empty( $routing->UrlObject[ 4 ] ) )
    {
        $routing->UrlObject[ 4 ] = "Home";
    } 
    if( !isset( $routing->UrlObject[ 5 ] ) )
    {
        $routing->UrlObject[ 5 ] = "Index";
    }   

    //Core::PrintExt( $routing );
    $controller->Load( ucfirst( $routing->UrlObject[4] ), ucfirst( $routing->UrlObject[5] ) );
?>
