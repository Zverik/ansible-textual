#!/bin/bash
set -e -u -x

WWW=/var/www/sites/sotm.osmz.ru
HERE="$(cd "$(dirname "$0")"; pwd)"
DATA="$HERE/schedule-convert/data"
VENV="$HERE/schedule-convert/.venv"
BASEURL="https://sotm.osmz.ru"

mkdir -p "$DATA"
# wget -q -r -O "$DATA/f2022.xml" "https://talks.osgeo.org/foss4g-2022/schedule/export/schedule.xml"
# wget -q -r -O "$DATA/f2022-at.xml" "https://talks.osgeo.org/foss4g-2022-academic-track/schedule/export/schedule.xml"
# wget -q -r -O "$DATA/sotm2020-add.csv" 'https://docs.google.com/spreadsheets/d/1EO3aC3vF9dvb1wopT_cUHaDXqdGIrid_Kj59PZyzR_g/export?format=csv&id=0'
# sed -i -e 's/Academic Track | Track 2 - Sunday, July 5/Track 2/' "$DATA/sotm2020-at.xml"
#wget -q -r -O "$DATA/fe2025.json" "https://talks.osgeo.org/foss4g-europe-2025/schedule/export/schedule.json"
#wget -q -r -O "$DATA/fe2025w.json" "https://talks.osgeo.org/foss4g-europe-2025-workshops/schedule/export/schedule.json"
#wget -q -r -O "$DATA/fe2025a.json" "https://talks.osgeo.org/foss4g-europe-2025-academic-track/schedule/export/schedule.json"
wget -q -r -O "$DATA/sotmeu25.json" 'https://pretalx.com/sotmeu2025/schedule/export/schedule.json'
#wget -q -r -O "$DATA/sotmeu24.csv" 'https://docs.google.com/spreadsheets/d/1Uwqw5-i78z315syTjlrMP7n2UKrUV8i_zuLeqCa0_Mk/gviz/tq?tqx=out:csv'
#wget -q -r -O "$DATA/sotm2024.xml" "https://pretalx.com/sotm2024/schedule/export/schedule.xml"
#wget -q -r -O "$DATA/sotm2024a.xml" "https://pretalx.com/state-of-the-map-2024-academic-track/schedule/export/schedule.xml"
#wget -q -r -O "$DATA/sotm2024a.csv" 'https://docs.google.com/spreadsheets/d/1vUTN-TG6Mg4gX0tOpQcT4ZrMK-v3X7fHZXWap3HFpnk/gviz/tq?tqx=out:csv'
#wget -q -r -O "$DATA/fe2025add.csv" 'https://docs.google.com/spreadsheets/d/16e1-O50NeLmNfQEI-hrNVnPdxaNsQw0eoNSPcRDpf9Q/gviz/tq?tqx=out:csv'

SC="$VENV/bin/schedule_convert"
$SC $DATA/sotmeu25.ini $DATA/sotmeu25.json -l "$WWW" "$BASEURL/sotmeu25"
