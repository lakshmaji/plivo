<?php namespace lakshmajim\plivo\Facade;
 
use Illuminate\Support\Facades\Facade;
 
class Plivo extends Facade {
 
    protected static function getFacadeAccessor() { return 'plivo'; }
 
}