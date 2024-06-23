<?php // IODB configuration file. Written by Ilya Zverev, licensed WTFPL.

// OpenStreetMap OAuth parameters, see http://wiki.openstreetmap.org/wiki/OAuth
const CLIENT_ID     = '{{ offsets_client_id }}';
const CLIENT_SECRET = '{{ offsets_client_secret }}';

// Database credentials
const DB_HOST     = 'localhost';
const DB_USER     = '{{ offsets_mysql_user }}';
const DB_PASSWORD = '{{ offsets_mysql_password }}';
const DB_DATABASE = 'iodb';

// Miscellaneous
const DEFAULT_RADIUS = 10; // In km
const MAX_RADIUS = 40; // Also in km
const MAX_REQUEST_PER_IP_PER_DAY = 100;
const DEFAULT_USER = ''; // If set, this user is considered logged in by default
$administrators = array('Zverik');

?>
