<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Format This!
 *
 * @package		ExpressionEngine
 * @category	Plugin
 * @author		Matthew Kirkpatrick
 * @copyright   Copyright (c) 2020, Matthew Kirkpatrick
 * @link		https://github.com/javashakes
 */

// config
include(PATH_THIRD.'jam/config.php');

return array(
    'name'              => JAM_NAME,
    'version'           => JAM_VERSION,
    'author'            => JAM_AUTHOR,
    'author_url'        => JAM_AUTHOR_URL,
    'docs_url'          => JAM_DOCS,
    'description'       => JAM_DESC,
    'namespace'         => JAM_NAMESPACE,
    'settings_exist'    => FALSE
);

/* End of file addon.setup.php */
/* Location: /system/expressionengine/third_party/jam/addon.setup.php */