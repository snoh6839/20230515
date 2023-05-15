<?php
/* -------- autoload ---------
trans back slash intp slash,
explode into arr by slash

if it has diff foldername 
need to distinct
check : https://www.php.net/manual/en/language.oop5.autoload.php
----------------------------- */
spl_autoload_register(
    function($getPath) {
        $getPath = str_replace("\\", "/", $getPath); 
        // $arrPath = explode("/", $getPath);

        require_once($getPath._EXTENTION_PHP);
        // echo $getPath."php";
        // exit;
    }
);
?>