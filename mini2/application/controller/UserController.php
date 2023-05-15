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
        $result = $this->model->getUser($_POST);
        if ( count($result) > 0 ) {
            $errMsg = ": This User Already Exists. Please Login or Use Other Id";
            $this->addDynamicProperty("errMsg", $errMsg);
            return "signup" . _EXTENTION_PHP;
            $this->model->closeConn();
        } else {
            // $this->model->conn->beginTransaction();
            $data = array(
                'id' => $_POST['id']
                ,'pw' => $_POST['pw']
                ,'name' => $_POST['name']
            );
            $this->model->setUser($data);
            $errMsg = ": Successfully Signed Up. Please Login.";
            $this->addDynamicProperty("errMsg", $errMsg);
            return "login" . _EXTENTION_PHP;
        }
    

        
        return _BASE_REDIRECT . "/user/login";
    }
}
?>