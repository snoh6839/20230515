<?php

namespace application\model;
use Exception;

class AnimeModel extends Model
{
    public function getDetail($arrAnimeData)
    {
        $sql =
        " select "
        . " * "
        . " From "
        . " anime_data "
        . " where "
        . " anime_no = :anime_no ";
        $prepare = [
            ":anime_no" => $arrAnimeData["anime_no"]
        ];
        try {
            $this->conn->beginTransaction();
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($prepare);
            $result = $stmt->fetchAll();
        } catch (Exception $e) {
            echo "AnimeModel -> getAnime Error : " . $e->getMessage();
            exit();
        }
    }
}
