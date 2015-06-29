<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once PATH_THIRD . 'jam/config.php';

/**
 * ExpressionEngine - by EllisLab
 *
 * @package		ExpressionEngine
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2003 - 2011, EllisLab, Inc.
 * @license		http://expressionengine.com/user_guide/license.html
 * @link		http://expressionengine.com
 * @since		Version 2.0
 * @filesource
 */
 
// ------------------------------------------------------------------------

/**
 * JAM Plugin
 *
 * @package		ExpressionEngine
 * @subpackage	Addons
 * @category	Plugin
 * @author		Matthew Kirkpatrick
 * @link		http://www.twitter.com/everythingEE
 */

$plugin_info = array(
	'pi_name'			=> JAM_NAME,
	'pi_version'		=> JAM_VER,
	'pi_author'			=> JAM_AUTHOR,
	'pi_author_url'		=> JAM_DOCS,
	'pi_description'	=> JAM_DESC,
	'pi_usage'			=> Jam::usage()
);

class Jam {

	public $return_data;
    
	/**
	 * Constructor
	 */
	public function __construct()
	{
		$this->EE =& get_instance();

		// Default output for {exp:jam}
		$this->return_data = $this->EE->localize->now;

	}
	
	public function when()
	{
		// VARS
		$now			= $this->EE->localize->now;
		
		// PARAMETER KEYS
		$time_key = array(
			'hour'		=> 'G',
			'minute'	=> 'i',
			'second'	=> 's',
			'month'		=> 'n',
			'day'		=> 'j',
			'year'		=> 'Y'
		);

		// PARAMETERS
		$format	= $this->EE->TMPL->fetch_param('format');
		$time	= ($this->EE->TMPL->fetch_param('time')) ? $this->EE->TMPL->fetch_param('time') : FALSE;
		if ($time !== FALSE) { $now = $time; }

		foreach ($time_key as $k => $v) {
			$param[$k] = ($this->EE->TMPL->fetch_param($k)) ? $this->EE->TMPL->fetch_param($k) : date($v, $now);
		}

		// PARAMETER PARSING
		foreach ($param as $k => $v) {
			${$k.'_math'} = substr($v, 0, 1);
			${$k} = ( (${$k.'_math'} == '+' || ${$k.'_math'} == '-') ? substr($v, 1) : $v );
			${$k} = ( (${$k.'_math'} == '+' || ${$k.'_math'} == '-') ? ( (${$k.'_math'} == '+') ? (date($time_key[$k], $now) + ${$k}) : ((date($time_key[$k], $now) - ${$k})) ) : ${$k} );
		}

		$when = mktime ($hour, $minute, $second, $month, $day, $year);

		// OUTPUT
		if ($format) { $output = $this->EE->localize->decode_date($format, $when); }
			else { $output = $when; }

		return $output;

	}
	
	// ----------------------------------------------------------------
	
	/**
	 * Plugin Usage
	 */
	public static function usage()
	{
        // for performance only load README if inside control panel
        return REQ == 'CP' ? file_get_contents(PATH_THIRD.'jam/README.md') : '';
	}
}


/* End of file pi.jam.php */
/* Location: /system/expressionengine/third_party/jam/pi.jam.php */