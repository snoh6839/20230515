<?php
namespace application\controller;

class AnimeController extends Controller {
    public function detailGet() {
        return "detail". _EXTENTION_PHP;
    }

    public function mainGet()
    {
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
