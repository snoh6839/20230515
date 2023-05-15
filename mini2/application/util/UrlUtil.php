<?php
namespace application\util;

class UrlUtil{
    //check $_GET["url"] and return
    public static function getUrl() {
        return isset($_GET["url"]) ? $_GET["url"] : "";
    }

    // make arr by "/" and return
    public static function getUrlArrPath() {
        
        $url = UrlUtil::getUrl();
        return $url !== "" ? explode("/", $url) : "";
    }

    // replace "/" into "\"
    public static function replacSlashToBackslash($str){
        return str_replace("/","\\",$str);
    }
    
}
?>