<?php 

// Define namespace
namespace Lakshmajim\Plivo\Facade;

// Inlcude namespace 
use Illuminate\Support\Facades\Facade;
 
/**
 * Plivo - Facade to support integration with Laravel framework 
 *
 * @author     lakshmaji 
 * @package    Plivo
 * @version    1.2.4
 * @since      Class available since Release 1.1.0
 */ 
class Plivo extends Facade {
 
    protected static function getFacadeAccessor() { return 'plivo'; }
 
}
// end of class Plivo
// end of file Plivo.php