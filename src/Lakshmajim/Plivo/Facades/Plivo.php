<?php 

// Define namespace
namespace Lakshmajim\Plivo\Facades;

// Include namespace
use Illuminate\Support\Facades\Facade;

/**
 * Plivo - Facade to support integration with Laravel framework 
 *
 * @author     lakshmaji 
 * @package    Plivo
 * @version    1.0.0
 * @since      Class available since Release 1.0.0
 */ 
class Plivo extends Facade {
	

	protected static function getFacadeAccessor() { 
		return 'plivo'; 
	}

	// ------------------------------------------------------------------------

}
// end of class Plivo
// end of file Plivo.php