<?php

// OpenStreetMap OAuth parameters, see http://wiki.openstreetmap.org/wiki/OAuth
const CLIENT_ID     = '{{ level0_client_id }}';
const CLIENT_SECRET = '{{ level0_client_secret }}';

// Just some OSM paths, if you want to switch to dev server
const OSM_API_URL	= 'https://api.openstreetmap.org/api/0.6/';

// Other settings
const BBOX_RADIUS	= 0.0003; // for downloading around a point
const MAX_REQUEST_OBJECTS = 1000;
const DATA_DIR = 'data';
const TEXT_DOMAIN = 'messages';
const SQLITE_DB = __DIR__.'/../data/level0.db';

const DEBUG = false;

?>
