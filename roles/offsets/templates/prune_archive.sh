#!/bin/sh
TARGET="{{ sites }}/{{ domain }}/www/download"
find "$TARGET" -name 'iodb*' ! -name '*01.*' ! -name '*-1303*' ! -name "*-$(date +%y%m)*" ! -name '*latest*' -delete
