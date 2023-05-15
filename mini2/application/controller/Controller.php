<?php
// echo "controller";
namespace application\controller;

use application\util\UrlUtil;
use \AllowDynamicProperties;
#[AllowDynamicProperties]
class Controller {
    protected $model;
    private static $modelList = [];
    private static $arrNeedAuth = ["anime/detail", "anime/watching", "user/logout"];

    public function __construct($identityName, $action)
    {
        //session start
        if(!isset($_SESSION)){
            session_start();
        }

        // check user login and auth
        $this->checkAuthorization();

        //call model
        $this->model = $this->getModel($identityName);

        // call controller's method
        $view = $this->$action();

        if(empty($view)){
            echo "This Controller dose not has method : ".$action;
            exit();
        }

        //call view
        require_once $this->getView($view);
    }


    // call model and return result
    protected function getModel($identityName){
        // check if model created
        if(!in_array($identityName, self::$modelList)){
            $modelName = UrlUtil::replacSlashToBackslash(_PATH_MODEL.$identityName._BASE_FILENAME_MODEL);
            self::$modelList[$identityName] = new $modelName();
        }
        return self::$modelList[$identityName];
    }

    //check param and return view or redirect
    protected function getView($view){
        if(strpos($view, _BASE_REDIRECT) === 0){
            header($view);
            exit();
        }
        return _PATH_VIEW.$view;
    }

    //method that sets the DynamicProperty
    protected function addDynamicProperty($key, $val)
    {
        $this->$key = $val;
    }

    //method that check user's login and auth
    protected function checkAuthorization()
    {
        $urlPath = UrlUtil::getUrl();
        foreach (self::$arrNeedAuth as $authPath) {
            if(!isset($_SESSION[_STR_LOGIN_ID]) && strpos($urlPath, $authPath) === 0){
                header(_BASE_REDIRECT."/user/login");
                exit();
            } 
        }
    }
}
?>