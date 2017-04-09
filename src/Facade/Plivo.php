<?php 

namespace Lakshmajim\Plivo\Facade;
 
use Illuminate\Support\Facades\Facade;
 
/**
 * Plivo - Facade to support integration with Laravel framework 
 *
 * @package  Plivo
 * @version  1.2.0
 * @author   lakshmaji 
 */ 
class Plivo extends Facade {
 
    protected static function getFacadeAccessor() { return 'plivo'; }
 
}
// end of class Plivo
// end of file Plivo.php