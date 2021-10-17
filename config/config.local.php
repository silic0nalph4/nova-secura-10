<?php
// place for your configuration directives, so you can later easily update myaac
$config['installed'] = true;
$config['env'] = 'prod'; // dev or prod
$config['mail_enabled'] = true;
$config['server_path'] = '/srv/';
$config['mail_admin'] = 'no@example.com';
$config['mail_address'] = 'no@example.com';
$config['date_timezone'] = 'Europe/London';
$config['client'] = '1098';
$config['anonymous_usage_statistics'] = false;
$config['session_prefix'] = 'myaac_bhe44fyp_';
$config['cache_prefix'] = 'myaac_3mv2zlcn_';

$config['highscores_ids_hidden'] = array(2, 3, 4, 5, 6);

// The following config changes can't be chosen via the installer and must be manually applied.
$config['template'] = 'tibiacom'; // A familiar web design
$config['character_samples'] = array(0 => 'Rook Sample'); // Characters start at level 1
$config['character_towns'] = array(6); // Character spawn in Rookgaard (6) or Tutorial Island (30)

