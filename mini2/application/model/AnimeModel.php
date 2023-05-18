<?php

namespace application\model;
use Exception;

class AnimeModel extends Model
{
    public function getDetail($arr, $cateFlag)
    {
        if ($cateFlag === 1) {
            $sql =
                " SELECT "
                . " * "
                . " FROM "
                . " anime_data "
                . " WHERE "
                . " anime_no = :anime_no "
                ;

            $prepare = [
                ":anime_no" => $arr["anime_no"]
            ];
        }
        else if ($cateFlag === 2) {
        $sql =
            " SELECT "
            . " * "
            . " FROM "
            . " anime_data "
            . " WHERE "
            . " anime_category = :anime_category "
            . " ORDER BY "
            . " views "
            . " DESC "
            ." LIMIT "
            ." :limit_num";

        $prepare = [
            ":limit_num" => $arr["limit_num"],
            ":anime_category" => $arr["anime_category"]
        ];
        } else if ($cateFlag === 3) {
            $sql =
                " SELECT "
                . " * "
                . " FROM "
                . " anime_data "
                . " ORDER BY "
                . " views "
                . " DESC "
                . " LIMIT "
                . " :limit_num";

            $prepare = [
                ":limit_num" => $arr["limit_num"]
            ];
        }  
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($prepare);
            $result = $stmt->fetchAll();
            return $result; // Return the query results
        } catch (Exception $e) {
            throw new Exception("AnimeModel -> getAnime Error: " . $e->getMessage());
        }
    }

    


    public function addViews($arr)
    {
        
        $sql =
        " UPDATE "
        ." anime_data "
        ." SET "
        ." views = views + 1 "
        ." WHERE "
        ." anime_no = :anime_no";
        $prepare = [
            ":anime_no" => $arr["anime_no"]
        ];
        
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($prepare);
            $this->conn->commit();
        } catch (Exception $e) {
            throw new Exception("AnimeModel -> getAnime Error: " . $e->getMessage());
            $this->conn->rollback();
        }

    }


    public function getComment($arr, $cateFlag )
    {
        if($cateFlag === 1){
            $sql =
            " SELECT "
            ." adata.anime_name "
            ." , adata.views "
            ." , uinfo.user_name "
            ." , ucomment.comment_content"
            ." , ucomment.comment_date "
            ." FROM "
            ." user_comment AS ucomment "
            ." INNER JOIN anime_data AS adata "
            ." ON ucomment.anime_no = adata.anime_no "
            ." INNER JOIN user_info AS uinfo "
            ." ON ucomment.user_no = uinfo.user_no "
            ." WHERE "
            . " ucomment.anime_no =  :anime_no"
            ." ORDER BY "
            ." ucomment.comment_date "
            ." DESC"
            . " LIMIT "
            . " :limit_num";
    
            $prepare = [
                ":limit_num" => $arr["limit_num"]
                , ":anime_no" => $arr["anime_no"]
            ];
        } else if ($cateFlag === 2) {
            $sql =
            " SELECT "
            . " adata.anime_no "
            . " , adata.anime_name "
            . " , adata.views "
            . " , uinfo.user_name "
            . " , ucomment.comment_content"
            . " , ucomment.comment_date "
            . " FROM "
            . " user_comment AS ucomment "
            . " INNER JOIN anime_data AS adata "
            . " ON ucomment.anime_no = adata.anime_no "
            . " INNER JOIN user_info AS uinfo "
            . " ON ucomment.user_no = uinfo.user_no "
            . " ORDER BY "
            . " ucomment.comment_date "
            . " DESC"
            . " LIMIT "
            . " :limit_num";

            $prepare = [
                ":limit_num" => $arr["limit_num"]
            ];
        }

        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($prepare);
            $result = $stmt->fetchAll();
            return $result;
        } catch (Exception $e) {
            throw new Exception("AnimeModel -> getAnime Error: " . $e->getMessage());
            
        }
    }

    public function commentCount($arr)
    {
        $sql =
        " SELECT "
        . " * "
        . " FROM "
        . " user_comment"
        . " WHERE "
        . " anime_no =  :anime_no"
        ;

        $prepare = [
            ":anime_no" => $arr["anime_no"]
        ];

        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($prepare);
            $result = $stmt->rowCount();
            return $result;
        } catch (Exception $e) {
            throw new Exception("AnimeModel -> getAnime Error: " . $e->getMessage());
        }
    }

    public function addComment($arr)
    {
        $sql = 
        " INSERT INTO "
        ." user_comment "
        ." ( "
        ." user_no "
        ." ,comment_content "
        ." ,anime_no "
        ." ) "

        ." VALUES ( " 
        ." ( "
        ." SELECT "
        ." user_no "
        ." FROM "
        ." user_info "
        ." WHERE "
        ." user_id = :id "
        ." ) "
        . " ,:comment_content "
        . " ,:anime_no "
        ." ) "
        ;
        // prepare로 데이터들의 배열을 입력
        $prepare = [
            ":anime_no" => $arr["anime_no"]
            , ":id" => $arr["id"]
            , ":comment_content" => $arr["comment_content"]
        ];
        try {
            $this->conn->beginTransaction();
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($prepare);
            $this->conn->commit();
        } catch (Exception $e) {
            $this->conn->rollBack();
            echo "UserModel -> getUser Error : " . $e->getMessage();
            exit();
        } finally {
            $this->closeConn();
        }
    }
}