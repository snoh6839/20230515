<?php

namespace application\model;
use Exception;

class AnimeModel extends Model
{
    public function getDetail($arr)
    {
        $sql =
            " SELECT "
            ." * "
            ." FROM "
            ." anime_data "
            ." WHERE "
            . " anime_category = :anime_category "
            ." ORDER BY "
            ." views "
            ." DESC ";
            // ." LIMIT "
            // ." :limit_num";
        $prepare = [
            // ":anime_no" => $arr["anime_no"],
            ":anime_category" => $arr["anime_category"]
        ];
        try {
            $stmt = $this->conn->prepare($sql);
            $result = $stmt->fetchAll();
            return $result; // Return the query results
        } catch (Exception $e) {
            echo "AnimeModel -> getAnime Error : " . $e->getMessage();
            exit();
        }
    }
}
