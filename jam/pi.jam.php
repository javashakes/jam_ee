<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Just a Minutes!
 *
 * @package		ExpressionEngine
 * @category	Plugin
 * @author		Matthew Kirkpatrick
 * @copyright   Copyright (c) 2020, Matthew Kirkpatrick
 * @link		https://github.com/javashakes
 */

// config
include(PATH_THIRD.'jam/config.php');

// EE v2 backward compatibility
// Ignored by EE v3+
$plugin_info = array(
	'pi_name'			=> JAM_NAME,
	'pi_version'		=> JAM_VERSION,
	'pi_author'			=> JAM_AUTHOR,
	'pi_author_url'		=> JAM_AUTHOR_URL,
	'pi_description'	=> JAM_DESC
);

class Jam {

	public $return_data = '';
    
	/**
	 * Constructor
     *
     * @access  public
     * @return  string
    */
	public function __construct()
	{
		// default output
		$this->return_data = '' . JAM_NAME . '<br>' . JAM_DESC;
	}
	
	/**
	 * DATE FORMATTING
     *
     * @access  public
     * @return  string
    */
	public function when()
	{
		// VARS
		$now			= ee()->localize->now;
		
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
		$format	= ee()->TMPL->fetch_param('format');
		$time	= (ee()->TMPL->fetch_param('time')) ? ee()->TMPL->fetch_param('time') : FALSE;
		if ($time !== FALSE) { $now = $time; }

		foreach ($time_key as $k => $v) {
			$param[$k] = (ee()->TMPL->fetch_param($k)) ? ee()->TMPL->fetch_param($k) : date($v, $now);
		}

		// PARAMETER PARSING
		foreach ($param as $k => $v) {
			${$k.'_math'} = substr($v, 0, 1);
			${$k} = ( (${$k.'_math'} == '+' || ${$k.'_math'} == '-') ? substr($v, 1) : $v );
			${$k} = ( (${$k.'_math'} == '+' || ${$k.'_math'} == '-') ? ( (${$k.'_math'} == '+') ? (date($time_key[$k], $now) + ${$k}) : ((date($time_key[$k], $now) - ${$k})) ) : ${$k} );
		}

		$when = mktime ($hour, $minute, $second, $month, $day, $year);

		// OUTPUT
		if ($format) { $output = ee()->localize->decode_date($format, $when); }
			else { $output = $when; }

		return $output;

	}
	
}

/* End of file pi.jam.php */
/* Location: /system/expressionengine/third_party/jam/pi.jam.php */