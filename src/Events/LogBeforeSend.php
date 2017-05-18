<?php


// Define namespace

namespace Lakshmaji\Plivo\Events;

class LogBeforeSend
{
    /**
     * @var array
     */
    public $params;

    /**
     * Constructor.
     *
     * @param array $params
     */
    public function __construct($params)
    {
        $this->params = $params;
    }
}
