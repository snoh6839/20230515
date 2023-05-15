<?php

namespace application\model;

use Exception;

class UserModel extends Model
{
    public function getUser($arrUserInfo)
    {
        $sql = 
        " select "
        ." * "
        ." From "
        ." user_info "
        ." where "
        ." user_id = :id "
        ." and "
        ." user_pw = :pw ";

        $prepare = [
            ":id" => $arrUserInfo["id"]
            ,":pw" => $arrUserInfo["pw"]
        ];
        try{
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($prepare);
            $result = $stmt->fetchAll();
        }
        catch(Exception $e){
            echo "UserModel -> getUser Error : ". $e->getMessage();
            exit();
        } 
        
        // finally {
        //     $this->closeConn();
        // }

        return $result;
    }

    public function setUser($data)
    {
        // var_dump($data, $this->conn);
        $sql =
            " insert into "
            . " user_info "
            . " ( "
            . " user_id "
            . " , "
            . " user_pw "
            . " , "
            . " user_name "
            . " ) "
            . " VALUES "
            . " ( "
            . " :id "
            . " , "
            . " :pw "
            . " , "
            . " :name "
            . " ) ";

        $prepare = [
            ":id" => $data["id"]
            , ":pw" => $data["pw"]
            , ":name" => $data["name"]
        ];
        try {
            // $this->conn->beginTransaction();
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($prepare);
            $this->conn->commit();
        } catch (Exception $e) {
            // $this->conn->rollBack();
            echo "UserModel -> getUser Error : " . $e->getMessage();
            exit();
        } finally {
            $this->closeConn();
        }
    }

    
}
?>