<?php
declare(strict_types=1);
$cfg['blowfish_secret'] = '{{ lookup('password', '/dev/null length=32 chars=ascii_letters,digits') }}';

$i = 0;

$i++;
$cfg['Servers'][$i]['auth_type'] = 'cookie';
$cfg['Servers'][$i]['host'] = 'localhost';
$cfg['Servers'][$i]['compress'] = false;
$cfg['Servers'][$i]['AllowNoPassword'] = false;
$cfg['Servers'][$i]['controlpass'] = '{{ phpmyadmin_user_password }}';

$cfg['UploadDir'] = '';
$cfg['SaveDir'] = '';
