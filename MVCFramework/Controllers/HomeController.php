<?php
    use Infrastructure\Core\Controller as Controller;

    class HomeController extends Controller
    {
        public function ActionIndex()
        {
            $this->ReturnView( "Home/Index", array( "name" => "ya" ) );
        }
    }
?>