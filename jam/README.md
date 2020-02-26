# Documentation
ExpressionEngine Plugin that exposes PHP's time(), date(), and mktime() functions into EE templates.

# `{exp:jam:when}`
| parameter | description              | type   | options                                                                                               | default                     |
|-----------|--------------------------|--------|-------------------------------------------------------------------------------------------------------|-----------------------------|
| `time`    | Unix timestamp           | int    |                                                                                                       | current localized unix time |
| `format`  | Date format pattern      | string | [See Documentation](https://docs.expressionengine.com/latest/templates/date-variable-formatting.html) |                             |
| `hour`    | Hour or [+\|-] hours     | int    |                                                                                                       | Current localized hour      |
| `minute`  | Minute or [+\|-] minutes | int    |                                                                                                       | Current localized minute    |
| `second`  | Second or [+\|-] seconds | int    |                                                                                                       | Current localized second    |
| `month`   | Month or [+\|-] months   | int    |                                                                                                       | Current localized month     |
| `day`     | Day or [+\|-] days       | int    |                                                                                                       | Current localized day       |
| `year`    | Year or [+\|-] years     | int    |                                                                                                       | Current localized year      |

&nbsp;
# Examples
| Usage                                                                                                                                                   | Results                                                                                                                                                              |
|---------------------------------------------------------------------------------------------------------------------------------------------------------|----------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| {exp:jam:when}                                                                                                                                          | Unix timestamp, PHP equivalent:`time()`                                                                                                                              |
| {exp:jam:when<br>format="%Y-%m-%d %H:%i"<br>}                                                                                                           | Formatted Unix timestamp, PHP equivalent: `date('Y-m-d H:i', time())`                                                                                                |
| {exp:jam:when<br>hour="[+|-]n"<br>minute="[+|-]n"<br>second="[+|-]n"<br>month="[+|-]n"<br>day="[+|-]n"<br>year="[+|-]n"<br>}                            | Unix timestamp for a defined date/time<br>• Where 'n' is a number and [`+`|`-`] is optional<br>•`year` must be either the four (4) digit year, or `[+|-]n`           |
| {exp:jam:when<br>format="%Y-%m-%d %H:%i"<br>hour="[+|-]n"<br>minute="[+|-]n"<br>second="[+|-]n"<br>month="[+|-]n"<br>day="[+|-]n"<br>year="[+|-]n"<br>} | Formatted Unix timestamp for a defined date/time<br>• Where 'n' is a number and [`+`|`-`] is optional<br>•`year` must be either the four (4) digit year, or `[+|-]n` |
