<?php
namespace application\controller;

class AnimeController extends Controller
{

    public function detailGet()
    {
        return "detail" . _EXTENTION_PHP;
    }

    public function mainGet()
    {
        return "main" . _EXTENTION_PHP;
    }

    public function animeHeroDetailsGet()
    {
        $arrGet = $_GET;
        $category = 'hero';
        $arrGet['anime_category'] = $category;
        $animeDetails = $this->model->getDetail($arrGet);
        return $animeDetails;
    }

    public function watchingGet()
    {
        return "watching" . _EXTENTION_PHP;
    }    
    
}
