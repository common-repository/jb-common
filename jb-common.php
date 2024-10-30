<?php
/*
Plugin Name: JB Common
Plugin URI: http://wordpress.org/extend/plugins/jb-common/
Description: A plugin with common features missed in WordPress, like favicon, meta tags, adding HTML to head and footer, WordPress e-mail from header filter, etc.
Version: 1.0
Author: Joan Botella Vinaches
Author URI: http://www.joanbotella.com
License: GNU/GPL v3.0 or later
Tags: common, feature, attachments, auto format, w3c, validator, maintenance, debug, footer, e-mail, favicon, head, meta tag, log, bio, feeds, shorcode, widget, current URL, is login, is register, append vars
*/

/*

JB Common - A plugin with common features missed in WordPress.
Copyright (C) 2013  Joan Botella Vinaches

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or 
any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.

Author website: <http://www.joanbotella.com>

*/

// --- PLUGIN NAME -----------------------------------------------------------

define('JBCOMMON_PLUGIN_NAME','JB Common');
define('JBCOMMON_PLUGIN_CODE_NAME','jb-common');
define('JBCOMMON_PLUGIN_PREFIX','jbcommon_');



// --- PATHS, URLS, DIRS & FILES ----------------------------------------------

define('JBCOMMON_PLUGIN_FILE',__FILE__);
define('JBCOMMON_PLUGIN_PATH',substr(plugin_dir_path(JBCOMMON_PLUGIN_FILE),0,-1));
define('JBCOMMON_PLUGIN_URL',substr(plugin_dir_url(JBCOMMON_PLUGIN_FILE),0,-1));

define('JBCOMMON_MAINTENANCE_FILE','maintenance.php');

define('JBCOMMON_CFG_DIR','cfg');
define('JBCOMMON_CSS_DIR','css');
	define('JBCOMMON_CSS_FILE',JBCOMMON_CSS_DIR.'/jb-common.css');
	define('JBCOMMON_CSS_ADMIN_FILE',JBCOMMON_CSS_DIR.'/jb-common-admin.css');
define('JBCOMMON_IMG_DIR','img');
	define('JBCOMMON_PLUGIN_ICON',JBCOMMON_IMG_DIR.'/jb_logo.16x16.png');
	define('JBCOMMON_PLUGIN_LOGO',JBCOMMON_IMG_DIR.'/jb_logo.64x64.png');
define('JBCOMMON_LIB_DIR','lib');
	define('JBCOMMON_ADMIN_DIR',JBCOMMON_LIB_DIR.'/admin');
	define('JBCOMMON_WIDGETS_DIR',JBCOMMON_LIB_DIR.'/widgets');
define('JBCOMMON_LOC_DIR','loc');
define('JBCOMMON_LOG_DIR','log');



// --- LANGUAGE ---------------------------------------------------------------

define('JBCOMMON_TEXT_DOMAIN',JBCOMMON_PLUGIN_CODE_NAME);
define('JBCOMMON_MO_PATH',JBCOMMON_PLUGIN_CODE_NAME.'/'.JBCOMMON_LOC_DIR);
load_plugin_textdomain(JBCOMMON_TEXT_DOMAIN,false,JBCOMMON_MO_PATH);



// --- PLUGIN INFO -----------------------------------------------------------

define('JBCOMMON_PLUGIN_URI','http://wordpress.org/extend/plugins/jb-common/');
define('JBCOMMON_PLUGIN_DESCRIPTION',__('A plugin with common features missed in WordPress, like favicon, meta tags, adding HTML to head and footer, WordPress e-mail from header filter, etc.',JBCOMMON_TEXT_DOMAIN));
define('JBCOMMON_PLUGIN_VERSION','1.0');
define('JBCOMMON_PLUGIN_AUTHOR','Joan Botella Vinaches');
define('JBCOMMON_PLUGIN_AUTHOR_URI','http://www.joanbotella.com');
define('JBCOMMON_PLUGIN_LICENSE',__('GNU/GPL v3.0 or later',JBCOMMON_TEXT_DOMAIN));
define('JBCOMMON_PLUGIN_LICENSE_URI','http://www.gnu.org/licenses/gpl.html');
define('JBCOMMON_PLUGIN_TAGS','common, feature, attachments, auto format, w3c, validator, maintenance, debug, footer, e-mail, favicon, head, meta tag, log, bio, feeds, shorcode, widget, current URL, is login, is register, append vars');



// --- REQUIRES --------------------------------------------------------------

function jbcommon_requires(){

	$cfg_path=JBCOMMON_PLUGIN_PATH.'/'.JBCOMMON_CFG_DIR.'/';
	$lib_path=JBCOMMON_PLUGIN_PATH.'/'.JBCOMMON_LIB_DIR.'/';
	$widgets_path=JBCOMMON_PLUGIN_PATH.'/'.JBCOMMON_WIDGETS_DIR.'/';

	require_once($lib_path.'functions.php');
	require_once($lib_path.'plugin-functions.php');
	require_once($lib_path.'logger.php');
	require_once($lib_path.'db-wrapper.php');
	require_once($lib_path.'redirects.php');
	require_once($lib_path.'shortcodes.php');
	require_once($lib_path.'hooks.php');

	require_once($widgets_path.'bio.php');
	require_once($widgets_path.'feeds.php');

// 	require_once($cfg_path.'options.php');
// 	require_once($cfg_path.'db.php');

	require_once($lib_path.'deployment.php');

}
jbcommon_requires();

?>