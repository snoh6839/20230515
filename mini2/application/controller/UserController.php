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
                                'id' => $arrPost['id']
                                , 'pw' => $arrPost['pw']
                                , 'name' => $arrPost['name']
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
// 변경후 코드 테스트전
namespace application\controller;

class UserController extends Controller {
    public function loginGet() {
        return "login" . _EXTENTION_PHP;
    }

    public function loginPost()
    {
        $result = $this->model->getUser($_POST);

        if (count($result) === 0) {
            $errMsg = "Invalid ID or PW";
            $this->addDynamicProperty("errMsg", $errMsg);
            return "login" . _EXTENTION_PHP;
        }

        $_SESSION[_STR_LOGIN_ID] = $_POST["id"];
        return _BASE_REDIRECT . "/anime/main";
    }

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



Upgrade to Plus
NEW


User
Subin Noh

User
아래 코 드 개선 요청 <?php
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
                                'id' => $arrPost['id']
                                , 'pw' => $arrPost['pw']
                                , 'name' => $arrPost['name']
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

ChatGPT
아래는 주어진 코드의 개선 요청에 대한 개선된 버전입니다:

php
Copy code
namespace application\controller;

class UserController extends Controller {
    public function loginGet() {
        return "login" . _EXTENTION_PHP;
    }

    public function loginPost()
    {
        $result = $this->model->getUser($_POST);

        if (count($result) === 0) {
            $errMsg = "Invalid ID or PW";
            $this->addDynamicProperty("errMsg", $errMsg);
            return "login" . _EXTENTION_PHP;
        }

        $_SESSION[_STR_LOGIN_ID] = $_POST["id"];
        return _BASE_REDIRECT . "/anime/main";
    }

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

        $nameLength = mb_strlen($arrPost["name"]);
        if ($nameLength < 2 || $nameLength > 20) {
            $errMsg = "Name must be between 2 and 20 characters long";
            $this->addDynamicProperty("errMsg", $errMsg);
            return "signup" . _EXTENTION_PHP;
        }

        $idLength = mb_strlen($arrPost["id"]);
        if ($idLength < 4 || $idLength > 12) {
            $errMsg = "ID must be between 4 and 12 characters long";
            $this->addDynamicProperty("errMsg", $errMsg);
            return "signup" . _EXTENTION_PHP;
        }

        $pwLength = mb_strlen($arrPost["pw"]);
        if ($pwLength < 8 || $pwLength > 20) {
            $errMsg = "Password must be between 8 and 20 characters long";
            $this->addDynamicProperty("errMsg", $errMsg);
            return "signup" . _EXTENTION_PHP;
        }

        if ($arrPost["pw"] !== $arrPost["pwchk"]) {
            $errMsg = "Password does not match Password Check";
            $this->addDynamicProperty("errMsg", $errMsg);
            return "signup" . _EXTENTION_PHP;
        }

        $data = array(
            'id' => $arrPost['id'],
            'pw' => $arrPost['pw'],
            'name' => $arrPost['name']
        );
        $this->model->setUser($data);
        $errMsg = ": Successfully Signed Up. Please Login.";
        $this->addDynamicProperty("errMsg", $errMsg);
        return "login" . _EXTENTION_PHP;
    }
}
주요 개선 사항:

$this->model->closeConn(); 문장이 중복되어 제거되었습니다.
$arrPost 변수를 선언하고 $_POST 값을 할당했습니다.
사용자 ID, 이름, 비밀번호의 길이를 체크하는 부분을 개선하고, 범위를 벗어나는 경우 에러 메시지를 설정하도록 변경했습니다.

5 / 5





User
개선된 코드에 필요한 정규식 추가

ChatGPT
아래는 정규식을 추가한 개선된 코드입니다:

php
Copy code
namespace application\controller;

class UserController extends Controller {
    public function loginGet() {
        return "login" . _EXTENTION_PHP;
    }

    public function loginPost()
    {
        $result = $this->model->getUser($_POST);

        if (count($result) === 0) {
            $errMsg = "Invalid ID or PW";
            $this->addDynamicProperty("errMsg", $errMsg);
            return "login" . _EXTENTION_PHP;
        }

        $_SESSION[_STR_LOGIN_ID] = $_POST["id"];
        return _BASE_REDIRECT . "/anime/main";
    }

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
        if (!preg_match('/^[\p{L}\p{Mn}\p{Pd}\']{2,20}$/u', $name)) {
            $errMsg = "Name must be between 2 and 20 characters long and can contain letters, hyphens, apostrophes, or combining marks";
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
주요 개선 사항:

사용자 이름($name)에 대한 정규식 /^[\p{L}\p{Mn}\p{Pd}\']{2,20}$/u을 추가하여 유효성을 검사합니다. 이 정규식은 유니코드 문자, 하이픈, 작




User
/^[\p{L}\p{Mn}\p{Pd}\']{2,20}$/u을 설명

ChatGPT
정규식 /^[\p{L}\p{Mn}\p{Pd}\']{2,20}$/u는 다음과 같이 설명될 수 있습니다:

^: 문자열의 시작을 나타냅니다.
[\p{L}\p{Mn}\p{Pd}\']: 유니코드 문자 클래스로, 유니코드 문자, 결합 문자(Mark Nonspacing) 및 하이픈, 작은따옴표(apostrophe)를 포함합니다. 즉, 이 클래스는 문자, 결합 문자, 하이픈, 작은따옴표로 이루어진 문자를 허용합니다.
{2,20}: 이전 문자 또는 문자 클래스가 2에서 20회 발생할 수 있음을 나타냅니다. 즉, 이름은 최소 2자 이상, 최대 20자까지 허용됩니다.
$: 문자열의 끝을 나타냅니다.
/u: 유니코드 모드를 활성화합니다. 이는 유니코드 문자를 올바르게 처리하기 위해 필요합니다.
따라서 /^[\p{L}\p{Mn}\p{Pd}\']{2,20}$/u 정규식은 이름이 최소 2자 이상, 최대 20자까지의 유니코드 문자, 결합 문자, 하이픈, 작은따옴표로 이루어져야 함을 검사하는 패턴입니다.





User
한국인용 이름정규식으로 바꾸려면?

ChatGPT
한국인용 이름에 대한 정규식은 다음과 같이 작성할 수 있습니다:

php
Copy code
/^[가-힣]{2,20}$/u
이 정규식은 다음과 같이 설명될 수 있습니다:

^: 문자열의 시작을 나타냅니다.
[가-힣]: 한글 문자 범위를 나타내는 문자 클래스로, 가에서 힣까지의 모든 한글 문자를 포함합니다.
{2,20}: 이전 문자 또는 문자 클래스가 2에서 20회 발생할 수 있음을 나타냅니다. 즉, 이름은 최소 2글자 이상, 최대 20글자까지 허용됩니다.
$: 문자열의 끝을 나타냅니다.
/u: 유니코드 모드를 활성화합니다. 이는 유니코드 문자를 올바르게 처리하기 위해 필요합니다.
따라서 /^[가-힣]{2,20}$/u 정규식은 한국인용 이름이 최소 2글자 이상, 최대 20글자까지의 한글로 이루어져야 함을 검사하는 패턴입니다.





User
회원가입시 이메일 보내서 그 이메일에 포함된 링크로 들어와야만 가입이 가능하게 하려면?

ChatGPT
회원 가입 시 이메일을 보내고, 그 이메일에 포함된 링크로 들어와야만 가입이 가능하도록 구현하기 위해서는 다음과 같은 단계를 따를 수 있습니다:

회원 가입 시 이메일 주소를 입력 받습니다.
회원 가입 정보와 함께 이메일 인증 링크를 생성합니다. 이 링크는 사용자가 이메일을 확인하고 가입 프로세스를 완료할 수 있는 링크입니다.
이메일을 사용자에게 보냅니다. 이메일에는 이메일 인증 링크가 포함되어야 합니다.
사용자가 이메일을 확인하고 이메일 인증 링크를 클릭합니다.
이메일 인증 링크에 접근한 경우, 가입 프로세스를 완료합니다. 이메일 인증이 완료되었다는 상태를 저장하고, 사용자의 계정을 활성화합니다.
이러한 절차를 구현하기 위해서는 추가적인 코드 및 로직이 필요합니다. 아래는 간단한 예시로 이를 구현하는 방법을 보여줍니다:

php
Copy code
namespace application\controller;

class UserController extends Controller {
    public function signupPost()
    {
        $arrPost = $_POST;

        // 회원 가입 정보 유효성 검사
        // ...

        // 회원 가입 정보 저장
        $data = array(
            'id' => $arrPost['id'],
            'pw' => $arrPost['pw'],
            'name' => $arrPost['name'],
            'email' => $arrPost['email'],
            'emailVerified' => false // 이메일 인증 상태 (초기값: 미인증)
        );
        $this->model->setUser($data);

        // 이메일 인증 링크 생성
        $verificationCode = generateVerificationCode(); // 이메일 인증 코드 생성 (랜덤하게 생성하는 함수 예시)
        $verificationLink = _BASE_URL . "/user/verify?code=" . $verificationCode; // 이메일 인증 링크 생성

        // 이메일 전송
        $to = $arrPost['email'];
        $subject = "회원 가입 이메일 인증";
        $message = "회원 가입을 완료하려면 아래 링크를 클릭하세요: " . $verificationLink;
        $headers = "From: noreply@example.com\r\n" .
            "Reply-To: noreply@example.com\r\n" .
            "Content-Type: text/html; charset=UTF-8\r\n";

        // 이메일 전송
        $mailSent = mail($to, $subject, $message, $headers);
        if (!$mailSent) {
            // 이메일 전송에 실패한 경우 예외 처리
            $errMsg = "이메일 전송에 실패했습니다. 다시 시도해주세요.";
            $this->addDynamicProperty("errMsg", $errMsg);
            return "signup" . _EXTENTION_PHP;
        }

        // 성공적으로 이메일을 보냈으므로 가입 완료 안내 페이지로 리다이렉트
        return "signup_complete" . _EXTENTION_PHP;
    }

    public function verifyEmail()
    {
        $code = $_GET['code'];

        // 이메일 인증 코드를 사용하여 해당 사용자를 찾고, 인증 상태를 업데이트
        $user = $this->model->getUserByVerificationCode($code);
        if (!$user) {
            // 유효하지 않은 인증 코드 예외 처리
            $errMsg = "유효하지 않은 인증 코드입니다.";
            $this->addDynamicProperty("errMsg", $errMsg);
            return "signup" . _EXTENTION_PHP;
        }

        // 사용자의 이메일 인증 상태를 업데이트
        $this->model->updateEmailVerificationStatus($user['id'], true);

        // 이메일 인증이 완료되었으므로 가입 완료 안내 페이지로 리다이렉트
