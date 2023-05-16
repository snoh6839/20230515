<?php
namespace application\controller;

class AnimeController extends Controller {
    public function detailGet() {
        return "detail". _EXTENTION_PHP;
    }


    public function mainGet()
    {
        $arrGet = $_GET;
        if(!isset($arrGet['anime_category'])){
            $arrGet['anime_category'] = 'hero'; 
        }
        $animeDetails = $this->model->getDetail($_GET);
        $arrGet['anime_category'] = 'hero';
        return "main" . _EXTENTION_PHP;
    }

    public function watchingGet()
    {
        return "watching" . _EXTENTION_PHP;
    }

    // public function loginPost()
    // {
    //     return _BASE_REDIRECT."/index";
    // }
}
