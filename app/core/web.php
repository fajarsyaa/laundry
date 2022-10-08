<?php

    class Web{

        public static function url($url, $controller, $id = 0)
        {

            $baseUrl         = route_params();

            $removeLastSlash = explode('/',route_params());

            if ($removeLastSlash[count($removeLastSlash)-1] == "") {
                
                array_splice($removeLastSlash ,count($removeLastSlash)-1);

                $baseUrl = $removeLastSlash;
 
                $baseUrl = $baseUrl[0];

            }

            if (strHas($url,"$")) {

                $url       = explode("/", $url);
                
                $nameField = explode('$', $url[count($url)-1]);

                $nameField = $nameField[1];

                array_splice($url ,count($url)-1);

                $baseUrl   = explode('/', route_params());

                $url[]     = $baseUrl[count($baseUrl)-1];

                $value     = $url[count($url)-1];
                
            }   
            
            if ($url == $baseUrl) {
                
                if ($id) {

                    @$id = $id;
    
                }else{
    
                    @$id = $_GET['id'];
    
                }
            
                $controller  = explode("@",$controller);
                
                @include dir_project()."controller/".$controller[0].".php";   
    
                if (!function_exists(@$controller[1])) {
                    
                    $file     = @controller[0];
                    $function = @controller[1];
                    
                    @include dir_project()."app/resource/views/errors/error-controller.php";
                    
                }else{
    
                    if ($value) {
                        $_REQUEST[$nameField]   = $value;
                    }
    
                
                    @$controller[1]($object = json_decode(json_encode($_REQUEST)), $id);
            
                }

            }
                

            
        }

    }