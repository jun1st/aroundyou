<?php

class Sina_Oauth
{
    
    public function get_auth_request_uri()
    {
        require_once 'config.php';
        require_once 'saetv2.ex.class.php';
    
        $o = new SaeTOAuthV2( WB_AKEY , WB_SKEY );
			
        $auth_request_url = $o->getAuthorizeURL( WB_CALLBACK_URL );
        
        return $auth_request_url;
    }

    public function get_authorized_user_id()
    {
        require_once 'config.php';
        require_once 'saetv2.ex.class.php';
        
        $o = new SaeTOAuthV2( WB_AKEY , WB_SKEY );
        $str = $_SERVER['QUERY_STRING'];
        //echo $str;
        parse_str($str);

        if (isset($code)) {
            $keys = array();
            $keys['code'] = $code;
            $keys['redirect_uri'] = WB_CALLBACK_URL;
            try {
                $token = $o->getAccessToken( 'code', $keys ) ;
            } catch (OAuthException $e) {
                echo $e;
            }
        }
                        
        if (isset($token)) {
				
			$c = new SaeTClientV2( WB_AKEY , WB_SKEY , $token['access_token'] );
			//$ms  = $c->home_timeline(); // done
			$uid_get = $c->get_uid();
			$uid = $uid_get['uid'];
			
            return $uid;
        }
        
        return NULL;
        
    }

}

?>