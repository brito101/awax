<?php

date_default_timezone_set("America/Sao_Paulo");

/**
 * DATABASE
 */
if (strpos($_SERVER['HTTP_HOST'], "localhost")) {
    define("CONF_DB_HOST", "");
    define("CONF_DB_USER", "");
    define("CONF_DB_PASS", "");
    define("CONF_DB_NAME", "");
} else {
    define("CONF_DB_HOST", "");
    define("CONF_DB_USER", "");
    define("CONF_DB_PASS", "");
    define("CONF_DB_NAME", "");
}

/**
 * PROJECT URLs
 */
define("CONF_URL_BASE", "");
define("CONF_URL_TEST", "https://www.localhost/awax");

/**
 * SITE
 */
define("CONF_SITE_NAME", "Awax");
define("CONF_SITE_TITLE", "Projeto Awax");
define("CONF_SITE_DESC", "Desenvolvimento de sites e sistemas");
define("CONF_SITE_LANG", "pt_BR");
define("CONF_SITE_DEVELOPER", "Rodrigo Brito");
define("CONF_SITE_DOMAIN", "");
define("CONF_SITE_ADDR_STREET", "");
define("CONF_SITE_ADDR_NUMBER", "");
define("CONF_SITE_ADDR_COMPLEMENT", "");
define("CONF_SITE_ADDR_CITY", "");
define("CONF_SITE_ADDR_STATE", "");
define("CONF_SITE_ADDR_COUNTRY", "");
define("CONF_SITE_ADDR_ZIPCODE", "");

/**
 * SOCIAL
 */
define("CONF_SOCIAL_TWITTER_CREATOR", "");
define("CONF_SOCIAL_TWITTER_PUBLISHER", "");
define("CONF_SOCIAL_FACEBOOK_APP", "");
define("CONF_SOCIAL_FACEBOOK_PAGE", "");
define("CONF_SOCIAL_FACEBOOK_AUTHOR", "");
define("CONF_SOCIAL_GITHUB", "");
define("CONF_SOCIAL_STACKOVERFLOW", "");
define("CONF_SOCIAL_PACKAGIST", "");

/**
 * DATES
 */
define("CONF_DATE_BR", "d/m/Y H:i:s");
define("CONF_DATE_APP", "Y-m-d H:i:s");

/**
 * PASSWORD
 */
define("CONF_PASSWD_MIN_LEN", 8);
define("CONF_PASSWD_MAX_LEN", 40);
define("CONF_PASSWD_ALGO", PASSWORD_DEFAULT);
define("CONF_PASSWD_OPTION", ["cost" => 10]);

/**
 * VIEW
 */
define("CONF_VIEW_EXT", "php");
define("CONF_VIEW_THEME", "web");
define("CONF_VIEW_ADMIN", "admin");

/**
 * UPLOAD
 */
define("CONF_UPLOAD_DIR", "storage");
define("CONF_UPLOAD_IMAGE_DIR", "images");
define("CONF_UPLOAD_FILE_DIR", "files");
define("CONF_UPLOAD_MEDIA_DIR", "medias");

/**
 * IMAGES
 */
define("CONF_IMAGE_CACHE", CONF_UPLOAD_DIR . "/" . CONF_UPLOAD_IMAGE_DIR . "/cache");
define("CONF_IMAGE_SIZE", 2000);
define("CONF_IMAGE_QUALITY", ["jpg" => 75, "png" => 5]);

/**
 * MAIL
 */
define("CONF_MAIL_SUPPORT", "");
