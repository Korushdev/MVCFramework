<?php
    use Infrastructure\Core\Controller as Controller;

    class ErrorController extends Controller
    {
        public function Action404()
        {
            echo "404 Page not found";
        }
    }
?>