# jam_ee
ExpressionEngine Plugin

A simple abstraction of PHP's time(), date(), and mktime() in one little plugin.

-------------------------
 PARAMETERS
-------------------------
time - (Unix timestamp, defaults to current localized timestamp)
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
