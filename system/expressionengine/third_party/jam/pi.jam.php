<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

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
 * @link		http://www.designafterdusk.com
 */

$plugin_info = array(
	'pi_name'		=> 'JAM:EE',
	'pi_version'	=> '1.2',
	'pi_author'		=> 'Matthew Kirkpatrick',
	'pi_author_url'	=> 'http://www.designafterdusk.com',
	'pi_description'=> 'Just A Minute plugin for EE',
	'pi_usage'		=> Jam::usage()
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
		if ($format) { $output = $this->EE->localize->format_date($format, $when); }
			else { $output = $when; }

		return $output;

	}
	
	// ----------------------------------------------------------------
	
	/**
	 * Plugin Usage
	 */
	public static function usage()
	{
		ob_start();
?>
A simple abstraction of PHP's time(), date(), and mktime() in one little plugin.

-------------------------
 PARAMETERS
-------------------------
format - (Refer to the Date Formatting Codes in the EE User Guide [http://expressionengine.com/user_guide/templates/date_variable_formatting.html])
hour - (numeric, defaults to current hour)
minute - (numeric, defaults to current minute)
second - (numeric, defaults to current second)
month - (numeric, defaults to current month)
day - (numeric, defaults to current day)
year - (numeric, defaults to current year)

-------------------------
 EXAMPLES
-------------------------
{exp:jam:when}
- Returns current Unix timestamp (i.e. "<?=(time())?>")


{exp:jam:when format="%Y-%m-%d %H:%i"}
- Returns formated current Unix timestamp (i.e "<?=(date('Y-m-d H:i', time()))?>")


{exp:jam:when hour="[+|-]n" minute="[+|-]n" second="[+|-]n" month="[+|-]n" day="[+|-]n" year="[+|-]n"}
- Where 'n' is a number and [+|-] is optional
- 'year' must be either the four (4) digit year, or "[+|-]n"
- Returns a Unix timestamp for a user defined date/time


{exp:jam:when format="%Y-%m-%d %H:%i" hour="[+|-]n" minute="[+|-]n" second="[+|-]n" month="[+|-]n" day="[+|-]n" year="[+|-]n"}
- Where 'n' is a number and [+|-] is optional
- 'year' must be either the four (4) digit year, or "[+|-]n"
- Returns a formated Unix timestamp for a user defined date/time
<?php
		$buffer = ob_get_contents();
		ob_end_clean();
		return $buffer;
	}
}


/* End of file pi.jam.php */
/* Location: /system/expressionengine/third_party/jam/pi.jam.php */