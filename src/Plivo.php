<?php

// Define namespace

namespace Lakshmaji\Plivo;

// Include required namespaces
use Config;
use Event;
use Exception;
use Lakshmaji\Plivo\Events\LogBeforeSend;
use Plivo\PlivoError;
use Plivo\RestAPI;

/**
 * Plivo - A package integrating Plivo SMS
 * with Laravel 5.* framework applications.
 *
 * @author     lakshmaji <lakshmajee88@gmail.com>
 *
 * @version    1.2.4
 *
 * @since      Class available since Release 1.0.0
 */
class Plivo
{
    /**
     * Plivo class constructor class for
     * Initializing objects.
     *
     * @param int $auth_id
     * @param int $auth_token
     *
     * @return
     *
     * @version    1.2.4
     *
     * @author     lakshmajim <lakshmajee88@gmail.com>
     *
     * @since      Method available since Release 1.1.0
     */
    public function __construct()
    {
        $this->auth_id = Config::get('plivo.PLIVO_AUTH_ID');
        $this->auth_token = Config::get('plivo.PLIVO_AUTH_TOKEN');
    }

    // ------------------------------------------------------------------------

    /**
     * Rest API authetication reference.
     *
     * @param string $auth_id
     * @param string $auth_token
     *
     * @return
     *
     * @version    1.2.4
     *
     * @author     lakshmajim <lakshmajee88@gmail.com>
     *
     * @since      Method available since Release 1.1.0
     */
    protected function auth()
    {
        return new RestAPI($this->auth_id, $this->auth_token);
    }

    // ------------------------------------------------------------------------

    /**
     * Send sms to specified number using plivo
     * cloud API.
     *
     * @param array  $params
     * @param int    $src
     * @param int    $dst
     * @param string $text
     *
     * @return array $response
     *
     * @version    1.2.4
     *
     * @author     lakshmajim <lakshmajee88@gmail.com>
     *
     * @since      Method available since Release 1.1.0
     */
    public function sendSMS($params)
    {
        Event::fire(new LogBeforeSend($params));
        try {
            return $this->auth()->send_message($params);
        } catch (PlivoError $pe) {
            return $pe->getMessage();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    // ------------------------------------------------------------------------

    /**
     * Get the message details by UUID.
     *
     * @param string $muuid
     *
     * @return array $response
     *
     * @version    1.2.4
     *
     * @author     lakshmajim <lakshmajee88@gmail.com>
     *
     * @since      Method available since Release 1.1.0
     */
    public function getDetailByMUUID($muuid)
    {
        return $this->auth()->get_message($muuid);
    }

    // ------------------------------------------------------------------------

    /**
     * Get all messages.
     *
     * Has the feature to filter results based on
     * the given criteria
     *
     * @param array  $params
     * @param int    $limit
     * @param int    $offset
     * @param string $message_direction
     * @param string $message_state
     *
     * @return array $response
     *
     * @version    1.2.4
     *
     * @author     lakshmajim <lakshmajee88@gmail.com>
     *
     * @since      Method available since Release 1.1.0
     */
    public function allMessages($params = [])
    {
        return $this->auth()->get_messages($params);
    }

    // ------------------------------------------------------------------------

    /**
     * Get account details.
     *
     * @param
     *
     * @return array $response
     *
     * @version    1.2.4
     *
     * @author     lakshmajim <lakshmajee88@gmail.com>
     *
     * @since      Method available since Release 1.1.0
     */
    public function accountDetails()
    {
        return $this->auth()->get_account();
    }

    // ------------------------------------------------------------------------

    /**
     * Get levy range.
     *
     * @param array  $params
     * @param string $country_iso
     *
     * @return array $response
     *
     * @version    1.2.4
     *
     * @author     lakshmajim <lakshmajee88@gmail.com>
     *
     * @since      Method available since Release 1.1.0
     */
    public function pricing($params)
    {
        return $this->auth()->pricing($params);
    }

    // ------------------------------------------------------------------------

    /**
     * List available applications.
     *
     * @param
     *
     * @return array $response
     *
     * @version    1.2.4
     *
     * @author     lakshmajim <lakshmajee88@gmail.com>
     *
     * @since      Method available since Release 1.1.0
     */
    public function listApplications()
    {
        return $this->auth()->get_applications();
    }

    // ------------------------------------------------------------------------

    // curl handler with RFC 41
    // curl_setopt($easy->handle, CURLOPT_SSL_VERIFYPEER, false);
}
// end of class Plivo
// end of file Plivo.php
