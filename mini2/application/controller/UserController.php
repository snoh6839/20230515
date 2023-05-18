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
        $arrPost = $_POST;

        $result = $this->model->getUserId($arrPost);
        if (count($result) > 0) {
            $errMsg = ": This User Already Exists. Please Login or Use Another ID";
            $this->addDynamicProperty("errMsg", $errMsg);
            return "signup" . _EXTENTION_PHP;
        }

        $name = $arrPost["name"];
        if (!preg_match('/^[가-힣]{2,20}$/u', $name)) {
            $errMsg = "Name must be between 2 and 20 characters long and can only contain Korean letters";
            $this->addDynamicProperty("errMsg", $errMsg);
            return "signup" . _EXTENTION_PHP;
        }

        $id = $arrPost["id"];
        if (!preg_match('/^[a-zA-Z0-9_]{4,12}$/', $id)) {
            $errMsg = "ID must be between 4 and 12 characters long and can only contain letters, numbers, and underscores";
            $this->addDynamicProperty("errMsg", $errMsg);
            return "signup" . _EXTENTION_PHP;
        }

        $pw = $arrPost["pw"];
        if (!preg_match('/^.{8,20}$/', $pw)) {
            $errMsg = "Password must be between 8 and 20 characters long";
            $this->addDynamicProperty("errMsg", $errMsg);
            return "signup" . _EXTENTION_PHP;
        }

        $pwchk = $arrPost["pwchk"];
        if ($pw !== $pwchk) {
            $errMsg = "Password does not match Password Check";
            $this->addDynamicProperty("errMsg", $errMsg);
            return "signup" . _EXTENTION_PHP;
        }

        $data = array(
            'id' => $id,
            'pw' => $pw,
            'name' => $name
        );
        $this->model->setUser($data);
        $errMsg = ": Successfully Signed Up. Please Login.";
        $this->addDynamicProperty("errMsg", $errMsg);
        return "login" . _EXTENTION_PHP;
    }
}

//이메일 인증 .. 생각만 해봄



    //     // 회원 가입 정보 저장
    //     $data = array(
    //         'id' => $arrPost['id'],
    //         'pw' => $arrPost['pw'],
    //         'name' => $arrPost['name'],
    //         'email' => $arrPost['email'],
    //         'emailVerified' => false // 이메일 인증 상태 (초기값: 미인증)
    //     );
    //     $this->model->setUser($data);

    //     // 이메일 인증 링크 생성
    //     $verificationCode = generateVerificationCode(); // 이메일 인증 코드 생성 (랜덤하게 생성하는 함수 예시)
    //     $verificationLink = _BASE_URL . "/user/verify?code=" . $verificationCode; // 이메일 인증 링크 생성

    //     // 이메일 전송
    //     $to = $arrPost['email'];
    //     $subject = "회원 가입 이메일 인증";
    //     $message = "회원 가입을 완료하려면 아래 링크를 클릭하세요: " . $verificationLink;
    //     $headers = "From: noreply@example.com\r\n" .
    //         "Reply-To: noreply@example.com\r\n" .
    //         "Content-Type: text/html; charset=UTF-8\r\n";

    //     // 이메일 전송
    //     $mailSent = mail($to, $subject, $message, $headers);
    //     if (!$mailSent) {
    //         // 이메일 전송에 실패한 경우 예외 처리
    //         $errMsg = "이메일 전송에 실패했습니다. 다시 시도해주세요.";
    //         $this->addDynamicProperty("errMsg", $errMsg);
    //         return "signup" . _EXTENTION_PHP;
    //     }

    //     // 성공적으로 이메일을 보냈으므로 가입 완료 안내 페이지로 리다이렉트
    //     return "signup_complete" . _EXTENTION_PHP;
    // }

    // public function verifyEmail()
    // {
    //     $code = $_GET['code'];

    //     // 이메일 인증 코드를 사용하여 해당 사용자를 찾고, 인증 상태를 업데이트
    //     $user = $this->model->getUserByVerificationCode($code);
    //     if (!$user) {
    //         // 유효하지 않은 인증 코드 예외 처리
    //         $errMsg = "유효하지 않은 인증 코드입니다.";
    //         $this->addDynamicProperty("errMsg", $errMsg);
    //         return "signup" . _EXTENTION_PHP;
    //     }

    //     // 사용자의 이메일 인증 상태를 업데이트
    //     $this->model->updateEmailVerificationStatus($user['id'], true);

    //     // 이메일 인증이 완료되었으므로 가입 완료 안내 페이지로 리다이렉트
    // }