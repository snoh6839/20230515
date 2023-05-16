<?php
namespace application\controller;

class AnimeController extends Controller {
    public function detailGet() {
        $arrGet = $_GET;
        $limit_num = 3;
        $this->model->getDetail($arrGet);
        $arrAnimeData =
        array(
            "anime_no" => $arrGet['anime_no'], "limit_num" => $limit_num
        );
        return "detail". _EXTENTION_PHP;
    }
    

    public function mainGet()
    {
        $arrGet = $_GET;
        $limit_num = 3;
        $this->model->getDetail($arrGet);
        $arrAnimeData =
        array(
            "anime_no" => $arrGet['anime_no'], "limit_num" => $limit_num
        );
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
