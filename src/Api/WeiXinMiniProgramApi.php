<?php
/**
 * Created by PhpStorm.
 * User: Walter
 * Date: 2019/2/28
 * Time: 12:18
 */

namespace Waters\WebChatApi\Api;

/**
 * 小程序接口
 * Class WeiXinMiniProgramApi
 * @package Waters\WebChatApi\Api
 */
class WeiXinMiniProgramApi extends WeiXinApi
{

    const API_CODE2SESSION = 'https://api.weixin.qq.com/sns/jscode2session?';


    /**
     * code换取
     * @param $code
     * @return bool|mixed
     */
    public function code2session($code){
        if (empty($code)){
            if ($this->business_interface) $this->business_interface->log('code2session code exception');
            return false;
        }
        $url = self::API_CODE2SESSION."appid={$this->config['app_id']}&secret={$this->config['app_secret']}&js_code={$code}&grant_type=authorization_code";
        return $this->curl($url);
    }

}