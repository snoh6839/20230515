<?php
namespace application\controller;

class AnimeController extends Controller {
    public function detailGet() {
        return "detail". _EXTENTION_PHP;
    }


    public function mainGet()
    {
        // $arrGet = $_GET;
        $_GET['anime_category'] = 'hero';
        $this->model->getDetail($_GET);
        
        // // if(isset($_GET['anime_no'])) {
        // // var_dump($_GET);
        // // // $anime_no = $arrGet['anime_no'];
        // $prepare['limit_num'] = 3;
        // // $limit_num = 3;
        // // }
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
