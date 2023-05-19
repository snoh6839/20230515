<?php
namespace application\controller;

class AnimeController extends Controller
{
    public function detailGet()
    {
        $animeNo = 1;
        $this->addDynamicProperty("animeDetails", $this->animeDetailsGet($animeNo));
        $this->addDynamicProperty("animeCommentCount", $this->animeCommentCountGet($animeNo));
        $userId = $_SESSION[_STR_LOGIN_ID];
        $followFlag = $this->model->toggleFollow($userId, $animeNo); // Update the follow flag
        $this->addDynamicProperty("followFlag", $followFlag); // Pass the follow flag to the view
        $limit = 4;
        $this->addDynamicProperty("animeDetails5", $this->animeLimitDetailsGet($limit));
        $limit = 6;
        $this->addDynamicProperty("animeComment", $this->animeCommentGet($animeNo, $limit));
        if (isset($_GET['anime_no'])) {
            $animeNo = $_GET['anime_no'];
            $this->addViews($animeNo); // 조회수 증가

            $this->addDynamicProperty("animeDetails", $this->animeDetailsGet($animeNo));
            $this->addDynamicProperty("animeCommentCount", $this->animeCommentCountGet($animeNo));
            $this->addDynamicProperty("animeComment", $this->animeCommentGet($animeNo, $limit));

            $followFlag = $this->model->toggleFollow($userId, $animeNo); // Update the follow flag
            $this->addDynamicProperty("followFlag", $followFlag); // Pass the follow flag to the view
        }


        return "detail" . _EXTENTION_PHP;
    }

    public function detailPost()
    {
        $arrPost = $_POST;
        $animeNo = $arrPost["anime_no"];
        $userId = $_SESSION[_STR_LOGIN_ID];
        $commentCont = $arrPost["comment_content"];

        $data = array(
            'anime_no' => $animeNo,
            'id' => $userId,
            'comment_content' => $commentCont
        );
        $this->model->addComment($data);
        

        return _BASE_REDIRECT . "/anime/detail?anime_no=" . $animeNo;
    }

    public function toggleFollow()
    {
        $animeNo = $_POST['anime_no'];
        $userId = $_SESSION[_STR_LOGIN_ID];
        $followFlag = $this->model->toggleFollow($userId, $animeNo);
        echo $followFlag;
    }

    public function logoutGet()
    {
        $this->model = $this->getModel("User");
        session_unset();
        session_destroy();
        return _BASE_REDIRECT."/anime/main";
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
        $this->addDynamicProperty("animeCommentMain", $this->animeCommentMainGet($limit));
        
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

    public function animeCommentGet($animeNo , $limit)
    {
        
        $arrGet = array("anime_no" => $animeNo, "limit_num" => $limit);
        $animeComment = $this->model->getComment($arrGet, 1);
        return $animeComment;
        
    }

    public function animeCommentMainGet($limit)
    {

        $arrGet = array("limit_num" => $limit);
        $animeCommentMain = $this->model->getComment($arrGet, 2);
        return $animeCommentMain;
    }

    public function animeCommentCountGet($animeNo)
    {

        $arrGet = array("anime_no" => $animeNo);
        $animeCommentCount = $this->model->commentCount($arrGet);
        return $animeCommentCount;
    }

}