<?php
namespace application\controller;

class AnimeController extends Controller
{

    public function detailGet()
    {
        $animeNo = 1;
        $this->addDynamicProperty("animeDetails", $this->animeDetailsGet($animeNo));
        $limit = 4;
        $this->addDynamicProperty("animeDetails5", $this->animeLimitDetailsGet($limit));
        return "detail" . _EXTENTION_PHP;
    }



    public function mainGet()
    {
        $category = 'hero';
        $limit = 3;
        $this->addDynamicProperty("animeDetails", $this->animeCateDetailsGet($category,$limit));
        $category = 'trend';
        $limit = 6;
        $this->addDynamicProperty("animeDetails2", $this->animeCateDetailsGet($category, $limit));
        $category = 'popular';
        $this->addDynamicProperty("animeDetails3", $this->animeCateDetailsGet($category, $limit));
        $category = 'recent';
        $this->addDynamicProperty("animeDetails4", $this->animeCateDetailsGet($category, $limit));
        $this->addDynamicProperty("animeDetails5", $this->animeLimitDetailsGet($limit));
        
        if (isset($_GET['anime_no'])) {
        $animeNo = $_GET['anime_no'];
        $this->addViews($animeNo); // 조회수 증가
        $this->addDynamicProperty("animeDetails", $this->animeDetailsGet($animeNo));
    }
        return "main" . _EXTENTION_PHP;
    }

    public function animeCateDetailsGet($category, $limit)
    {
        $arrGet = $_GET;
        $arrGet['anime_category'] = $category;
        $arrGet['limit_num'] = $limit;
        $animeDetails = $this->model->getDetail($arrGet, 2);
        return $animeDetails;
    }

    public function animeLimitDetailsGet($limit)
    {
        $arrGet = $_GET;
        $arrGet['limit_num'] = $limit;
        $animeDetails = $this->model->getDetail($arrGet, 3);
        return $animeDetails;
    }

    public function animeDetailsGet($animeNo)
{
    $arrGet = array("anime_no" => $animeNo);
    $animeDetails = $this->model->getDetail($arrGet, 1);
    return $animeDetails;
}
    
    public function addViews($animeNo)
{
    $arrUpdate = array("anime_no" => $animeNo);
    $this->model->addViews($arrUpdate);
}



    public function watchingGet()
    {
        return "watching" . _EXTENTION_PHP;
    }    
    
}
