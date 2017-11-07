<?php
namespace App;

// Include required libraries
use Facebook\Facebook;
use Facebook\Exceptions\FacebookResponseException;
use Facebook\Exceptions\FacebookSDKException;

class fbConfig
{

    /**
     * fbConfig constructor.
     */
    public $accessToken;
    public $fb;
    public $helper;
    public static $init = null;

    public function __construct()
    {
        $appId = '184090695473517'; //Facebook App ID
        $appSecret = '187a421acc0d9019ee26e9aa78d60e78'; //Facebook App Secret
        $redirectURL = 'http://localhost:8080/login'; //Callback URL
        $fbPermissions = array('email');  //Optional permissions

        $this->fb = new Facebook(array(
            'app_id' => $appId,
            'app_secret' => $appSecret,
            'default_graph_version' => 'v2.2',
        ));

// Get redirect login helper
        if (isset($_GET['state'])) {
            $_SESSION['FBRLH_state'] = $_GET['state'];
        }

        $this->helper = $this->fb->getRedirectLoginHelper();

// Try to get access token
        try {
            if(isset($_SESSION['facebook_access_token'])){
                $this->accessToken = $_SESSION['facebook_access_token'];
            }else{
                $this->accessToken = $this->helper->getAccessToken();
            }
        } catch(FacebookResponseException $e) {
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch(FacebookSDKException $e) {
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }
    }

    public static function connect()
    {
        if (NULL == self::$init) {
            self::$init = new fbConfig();
        }
        return self::$init;
    }
}

?>
