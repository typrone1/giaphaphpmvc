<?php
/**
 * Created by PhpStorm.
 * User: Huu Ty
 * Date: 22/09/2017
 * Time: 11:24 PM
 */
namespace App\Controllers;

use App\Auth;
use App\fbConfig;
use App\Flash;
use App\Models\User;
use Core\Controller;
use Core\View;
use Facebook\Exceptions\FacebookResponseException;
use Facebook\Exceptions\FacebookSDKException;

class Login extends Controller
{
    public function newAction()
    {
        $loginURL = '';
        $logoutURL = '';
        $fbConnection = fbConfig::connect();
        $accessToken = $fbConnection->accessToken;
        $fb = $fbConnection->fb;
        $helper = $fbConnection->helper;
        $redirectURL = 'http://localhost:8080/login/';
        $fbPermissions = array('email');  //Optional permissions
        if (isset($accessToken)) {
            if (isset($_SESSION['facebook_access_token'])) {
                $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
            } else {
                // Put short-lived access token in session
                $_SESSION['facebook_access_token'] = (string)$accessToken;

                // OAuth 2.0 client handler helps to manage access tokens
                $oAuth2Client = $fb->getOAuth2Client();

                // Exchanges a short-lived access token for a long-lived one
                $longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($_SESSION['facebook_access_token']);
                $_SESSION['facebook_access_token'] = (string)$longLivedAccessToken;

                // Set default access token to be used in script
                $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
            }

            // Redirect the user back to the same page if url has "code" parameter in query string
            if (isset($_GET['code'])) {
                header('Location: ./');
            }

            // Getting user facebook profile info
            try {
                $profileRequest = $fb->get('/me?fields=name,first_name,last_name,email,link,gender,locale,picture');
                $fbUserProfile = $profileRequest->getGraphNode()->asArray();
            } catch (FacebookResponseException $e) {
                echo 'Graph returned an error: ' . $e->getMessage();
                session_destroy();
                // Redirect user back to app login page
                header("Location: ./");
                exit;
            } catch (FacebookSDKException $e) {
                echo 'Facebook SDK returned an error: ' . $e->getMessage();
                exit;
            }

            // Initialize User class
            $user = new User();

            // Insert or update user data to the database
            $fbUserData = array(
                'oauth_provider' => 'facebook',
                'oauth_uid' => $fbUserProfile['id'],
                'first_name' => $fbUserProfile['first_name'],
                'last_name' => $fbUserProfile['last_name'],
                'email' => $fbUserProfile['email'],
                'gender' => $fbUserProfile['gender'],
                'locale' => $fbUserProfile['locale'],
                'picture' => $fbUserProfile['picture']['url'],
                'link' => $fbUserProfile['link']
            );
//            var_dump($fbUserData);
//            die();
            $userData = $user->checkUser($fbUserData);

            // Put user data into session
            $_SESSION['userData'] = $userData;

            // Get logout url
            $logoutURL = $helper->getLogoutUrl($accessToken, $redirectURL . 'logoutFacebook');

            // Render facebook profile data
            if (!empty($userData)) {

                $output = '<h1>Facebook Profile Details </h1>';
//                $output .= '<img src="' . $userData['picture'] . '">';
//                $output .= '<br/>Facebook ID : ' . $userData['oauth_uid'];
//                $output .= '<br/>Name : ' . $userData['first_name'] . ' ' . $userData['last_name'];
                $output .= '<br/>Email : ' . $userData['email'];
//                $output .= '<br/>Gender : ' . $userData['gender'];
//                $output .= '<br/>Locale : ' . $userData['locale'];
//                $output .= '<br/>Logged in with : Facebook';
//                $output .= '<br/><a href="' . $userData['link'] . '" target="_blank">Click to Visit Facebook Page</a>';
                $output .= '<br/>Logout from <a href="' . $logoutURL . '">Facebook</a>';
                Flash::addMessage('Login success');
                Auth::login((object)$userData, false);
                $this->redirect(Auth::getReturnToPage());
            } else {
                $output = '<h3 style="color:red">Some problem occurred, please try again.</h3>';
            }

        } else {
            // Get login url
            $loginURL = $helper->getLoginUrl($redirectURL, $fbPermissions);

            // Render facebook login button
            $output = '<a href="' . htmlspecialchars($loginURL) . '"><img src="/images/loginfb.png">Đăng nhập bằng tài khoản Facebook</a>';
        }

        View::renderTemplate('Login/new.html', ['loginURL' => $loginURL, 'logoutURL' => $logoutURL, 'output' => $output]);
    }

    public function logoutFacebook()
    {
        unset($_SESSION['facebook_access_token']);
        unset($_SESSION['userData']);
        $this->redirect('/');
    }

    public function createAction()
    {
//        echo($_REQUEST['email'] . ', ' . $_REQUEST['password']);
//        $user =User::findByEmail($_POST['email']);
//        var_dump($user);
        $remember_me = isset($_POST['remember_me']);
        $user = User::authenticate($_POST['email'], $_POST['password']);
        if ($user) {
            Flash::addMessage('Login success');
            Auth::login($user, $remember_me);

//            session_regenerate_id(true);
//            $_SESSION['user_id'] = $user->id;
//            echo $_SESSION['user_id'];
//            die();
//            $this->redirect('/');

            $this->redirect(Auth::getReturnToPage());
        } else {
            Flash::addMessage('Login that bai, vui long thu lai', Flash::WARNING);
            View::renderTemplate('Login/new.html', [
                'email' => $_POST['email'],
                'remember_me' => $remember_me
            ]);
        }
    }

    public function destroyAction()
    {
        Auth::logout();
        $this->redirect('/login/show-logout-message');
//        // Unset all of the session variables
//        $_SESSION = [];
//
//        // Delete the session cookie
//        if (ini_get('session.use_cookies')) {
//            $params = session_get_cookie_params();
//
//            setcookie(
//                session_name(),
//                '',
//                time() - 42000,
//                $params['path'],
//                $params['domain'],
//                $params['secure'],
//                $params['httponly']
//            );
//        }
//
//        // Finally destroy the session
//        session_destroy();


    }

// Do ham logout da huy session nen flash message cung bi huy luon nen phai lap ham moi
    public function showLogoutMessageAction()
    {
        Flash::addMessage('Logout success');
        $this->redirect('/');
    }

}