# Just a Minute!

ExpressionEngine Plugin that exposes PHP's time(), date(), and mktime() functions into EE templates.

## Requirements

ExpressionEngine v2+

*Compatible with EE v2-5*

## Installation

- **EE v2:** Copy `format_this` directory into `/system/expressionengine/third_party/`
- **EE v3:** Copy `format_this` directory into `/system/user/addons/`
- **EE v4:** Copy `format_this` directory into `/system/user/addons/`
- **EE v5:** Copy `format_this` directory into `/system/user/addons/`

## Usage

### `{exp:jam:when}`

Outputs date/time

##### `time` *(optional)*

Unix timestamp

- **Type:** int
- **Default:** current localized unix time

##### `format` *(optional)*

Date format pattern

- **Type:** string
- **Options:** <a href="https://docs.expressionengine.com/latest/templates/date-variable-formatting.html" target="_blank" title="Learn more about Date Variable Formatting">Date Variable Formatting</a>

##### `hour` *(optional)*

Hour or [+|-] hours

- **Type:** int
- **Default:** Current localized hour

##### `minute` *(optional)*

Minute or [+|-] minutes

- **Type:** int
- **Default:** Current localized minute

##### `second` *(optional)*

Second or [+|-] seconds

- **Type:** int
- **Default:** Current localized second

##### `month` *(optional)*

Month or [+|-] months

- **Type:** int
- **Default:** Current localized month

##### `day` *(optional)*

Day or [+|-] days

- **Type:** int
- **Default:** Current localized day

##### `year` *(optional)*

Year or [+|-] years

- **Type:** int
- **Default:** Current localized year

#### Examples

```
{exp:jam:when}

OUTPUT:
Unix timestamp, PHP equivalent: `time()`
```

```
{exp:jam:when format="%Y-%m-%d %H:%i"}

OUTPUT:
Formatted Unix timestamp, PHP equivalent: `date('Y-m-d H:i', time())`
```

```
{exp:jam:when hour="[+|-]n" minute="[+|-]n" second="[+|-]n" month="[+|-]n" day="[+|-]n" year="[+|-]n"}

OUTPUT:
Unix timestamp for a defined date/time
Where 'n' is a number and [+|-] is optional
`year` must be either the four (4) digit year, or [+|-]n
```

```
{exp:jam:when format="%Y-%m-%d %H:%i" hour="[+|-]n" minute="[+|-]n" second="[+|-]n" month="[+|-]n" day="[+|-]n" year="[+|-]n"}

OUTPUT:
Formatted Unix timestamp for a defined date/time
Where 'n' is a number and [+|-] is optional
`year` must be either the four (4) digit year, or [+|-]n
```

## Changelog

### 2.0.0 *(2020-03-12)*

- ExpressionEngine 3+ compatibility
- Overhauled documentation
- Version correction
- Added License
- Added Disclaimer

### 1.1.0 *(2013-01-30)*

- Updated documentation

### 1.0.0 *(2012-11-16)*

- Initial release

## License

Copyright © Matthew Kirkpatrick and individual contributors. All rights reserved.

Redistribution and use in source and binary forms, with or without modification, are permitted provided that the following conditions are met:

1. Redistributions of source code must retain the above copyright notice, this list of conditions and the following disclaimer.
2. Redistributions in binary form must reproduce the above copyright notice, this list of conditions and the following disclaimer in the documentation and/or other materials provided with the distribution.
3. Neither the name of the author nor the names of its contributors may be used to endorse or promote products derived from this software without specific prior written permission.

## Disclaimer

THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS “AS IS” AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
