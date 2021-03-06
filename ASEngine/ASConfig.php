<?php

//Timezone
date_default_timezone_set('UTC');

//WEBSITE

define('WEBSITE_NAME', 'EDUGO');
define('WEBSITE_DOMAIN', 'http://localhost');

// It can be the same as domain (if script is placed on website's root folder)
// or it can contain path that include subfolders, if script is located in
//some subfolder and not in root folder.
define('SCRIPT_URL', 'http://localhost/gestion_ecole/');

//DATABASE CONFIGURATION
define('DB_HOST', 'localhost');
define('DB_TYPE', 'mysql');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'gestion_ecole');

//SESSION CONFIGURATION
define('SESSION_SECURE', false);
define('SESSION_HTTP_ONLY', true);
define('SESSION_USE_ONLY_COOKIES', true);

//LOGIN CONFIGURATION
define('LOGIN_MAX_LOGIN_ATTEMPTS', 20);
define('LOGIN_FINGERPRINT', true);
define('SUCCESS_LOGIN_REDIRECT', serialize(array('default' => "index_1.php")));

//PASSWORD CONFIGURATION
define('PASSWORD_ENCRYPTION', "bcrypt"); //available values: "sha512", "bcrypt"
define('PASSWORD_BCRYPT_COST', "13");
define('PASSWORD_SHA512_ITERATIONS', 25000);
define('PASSWORD_SALT', "KYcjAqMakY60HR460DC1v3"); //22 characters to be appended on first 7 characters that will be generated using PASSWORD_ info above
define('PASSWORD_RESET_KEY_LIFE', 60);

// REGISTRATION CONFIGURATION
define('MAIL_CONFIRMATION_REQUIRED', true);
define('REGISTER_CONFIRM', "http://localhost/gestion_ecole/confirm.php");
define('REGISTER_PASSWORD_RESET', "http://localhost/gestion_ecole/passwordreset.php");

// EMAIL SENDING CONFIGURATION
// Available MAILER options are 'mail' for php mail() and 'smtp' for using SMTP server for sending emails
define('MAILER', "mail");
define('SMTP_HOST', "");
define('SMTP_PORT', 25);
define('SMTP_USERNAME', "");
define('SMTP_PASSWORD', "");
define('SMTP_ENCRYPTION', "");

define('MAIL_FROM_NAME', "EDUGO");
define('MAIL_FROM_EMAIL', "noreply@localhost");

// SOCIAL LOGIN CONFIGURATION

define('SOCIAL_CALLBACK_URI', "http://localhost/gestion_ecole/socialauth_callback.php");

// GOOGLE
define('GOOGLE_ENABLED', false);
define('GOOGLE_ID', "");
define('GOOGLE_SECRET', "");

// FACEBOOK
define('FACEBOOK_ENABLED', false);
define('FACEBOOK_ID', "");
define('FACEBOOK_SECRET', "");

// TWITTER
define('TWITTER_ENABLED', false);
define('TWITTER_KEY', "");
define('TWITTER_SECRET', "");

// TRANSLATION
define('DEFAULT_LANGUAGE', 'en');
