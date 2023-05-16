<?php
namespace application\controller;

class UserController extends Controller {
    public function loginGet() {
        return "login". _EXTENTION_PHP;
    }

    public function loginPost()
    {
        $result = $this->model->getUser($_POST);

        if(count($result) === 0) {
            $errMsg = "Invalid ID or PW";
            $this->addDynamicProperty("errMsg", $errMsg);
            return "login". _EXTENTION_PHP;
        }
        $_SESSION[_STR_LOGIN_ID] = $_POST["id"];
        return _BASE_REDIRECT."/anime/main";
    }

    //logout method
    public function logoutGet()
    {
        session_unset();
        session_destroy();
        return "main" . _EXTENTION_PHP;
    }

    public function signupGet()
    {
        return "signup" . _EXTENTION_PHP;
    }

    public function signupPost()
    {
        // $this->model->conn->beginTransaction();
        $result = $this->model->getUserId($_POST);
        $arrPost = $_POST;

        
        if (count($result) > 0) {
            $errMsg = ": This User Already Exists. Please Login or Use Other Id";
            $this->addDynamicProperty("errMsg", $errMsg);
            return "signup" . _EXTENTION_PHP;
            $this->model->closeConn();
        }else{
            if (mb_strlen($arrPost["name"]) < 2 || mb_strlen($arrPost["name"]) > 20) {
                $errMsg = "Name must be between 2~20 length";
                $this->addDynamicProperty("errMsg", $errMsg);
                return "signup" . _EXTENTION_PHP;
                $this->model->closeConn();
            } 
            else{
                if (mb_strlen($arrPost["id"]) < 4 || mb_strlen($arrPost["id"]) > 12) {
                    $errMsg = "ID must be between 4~12 length";
                    $this->addDynamicProperty("errMsg", $errMsg);
                    return "signup" . _EXTENTION_PHP;
                    $this->model->closeConn();
                }
                else{
                    if (mb_strlen($arrPost["pw"]) < 8 || mb_strlen($arrPost["pw"]) > 20) {
                        $errMsg = "Password must be between 8~20 length";
                        $this->addDynamicProperty("errMsg", $errMsg);
                        return "signup" . _EXTENTION_PHP;
                        $this->model->closeConn();
                    }
                    else{
                        if ($arrPost["pw"] !== $arrPost["pwchk"]) {
                            $errMsg = "Password does not match to Password Check";
                            $this->addDynamicProperty("errMsg", $errMsg);
                            return "signup" . _EXTENTION_PHP;
                            $this->model->closeConn();
                        } else {
                            $data = array(
                                'id' => $arrPost['id'], 'pw' => $arrPost['pw'], 'name' => $arrPost['name']
                            );
                            $this->model->setUser($data);
                            $errMsg = ": Successfully Signed Up. Please Login.";
                            $this->addDynamicProperty("errMsg", $errMsg);
                            return "login" . _EXTENTION_PHP;
                            $this->model->closeConn();
                        }
                    }
                }
            }
        }

    }
}
?>