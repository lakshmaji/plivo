<?php namespace lakshmajim\plivo;

include_once('Plivopackage/plivo.php');

class Plivo {

    /**
     * @var 
     */
    private $auth_id;
    /**
     * @var 
     */
    private $auth_token;

    /** source mobile number
     * @var
     */
    private $src;
    /** destination mobile number
     * @var
     */
    private $dest;
    /** text message
     * @var
     */
    private $txt;
    /** return back url
     * @var
     */
    private $returnBackUrl;


    /**
    * set sender mobile number.
    *
    * @param  $src
    * @return 
    */
    public function setSourceMobile($src)
    {
        $this->src = $src;
    }




    /**
    * set receiver mobile number.
    *
    * @param  $dest
    * @return 
    */
    public function setDestinationMobile($dest)
    {
        $this->dest = $dest;
    }




    /**
    * set message that tob sent to destination mobile number.
    *
    * @param  $txt
    * @return 
    */
    public function setMessagePlivo($txt)
    {
        $this->txt = $txt;
    }



    /**
    * set return back url after processing.
    *
    * @param  $returnBackUrl
    * @return 
    */
    public function setCallBackUrl($returnBackUrl)
    {
        $this->returnBackUrl = $returnBackUrl;
    }





    /**
    * send message using Plivio and Rest api calls.
    * provide authentication id and authentication token of admin
    * @param  $auth_id, $auth_token
    * @return 
    */
    public function sendMessagePlivo($auth_id,$auth_token)
    {
        $this->auth_id=$auth_id;
        $this->auth_token=$auth_token;
        return $this->sendMessage($this->auth_id,$this->auth_token);
    }




    /**
    * send sms and return the status .
    *
    * @param  $auth_id, $auth_token 
    * @return response status
    */
    private function sendMessage($auth_id,$auth_token)
    {
        // Set message parameters
        $params = array(
            'src' => $this->src, 
            'dst' => $this->dest, 
            'text' => $this->txt, 
            'url' => $this->returnBackUrl, // The URL to which with the status of the message is sent
            'method' => 'POST' 
        );
        $sendsms=new \RestAPI($this->auth_id, $this->auth_token);
        $response = $sendsms->send_message($params);

        if($sendsms->send_message($params))
        {
            return "Message sent successfully";
        }
        else
        {
            return "Message sending failed";
        }
        
    }
 
}