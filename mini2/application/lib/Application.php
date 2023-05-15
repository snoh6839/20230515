<?php
namespace application\lib;

use application\util\UrlUtil;

class Application {
    //constructor
    public function __construct()
    {
        // $getPath = isset($_GET["url"]) ? $_GET["url"] : "";
        // $arrPath = $getPath !== "" ? explode("/", $getPath) : "";

        $arrPath = UrlUtil::getUrlArrPath(); //get url by arr
        $identityName = empty($arrPath[0]) ? "Anime" : ucfirst($arrPath[0]);
        $action = (empty($arrPath[1]) ? "main" : $arrPath[1]). ucfirst(strtolower($_SERVER["REQUEST_METHOD"]));
        
        //controller name
        $controllerPath = _PATH_CONTROLLER.$identityName. _BASE_FILENAME_CONTROLLER._EXTENTION_PHP;
        
        //controller file existance chek
        if(!file_exists($controllerPath)){
            echo "Not Found Controller File : ". $controllerPath;
            exit();
        }

        //call controller
        $controllerName = UrlUtil::replacSlashToBackslash(_PATH_CONTROLLER . $identityName . _BASE_FILENAME_CONTROLLER);
        new $controllerName($identityName, $action);

        // var_dump($arrPath);
        // var_dump($controllerName);
    }

    // new application\lib\Application
}
?>