<VirtualHost *:80>
	ServerName ommm.osmz.ru
	DocumentRoot {{ sites }}/osmz.ru/ommm
	CustomLog /var/log/apache2/osmz.ru/access_log combined
	ErrorLog /var/log/apache2/osmz.ru/error_log

	<Directory {{ sites }}/osmz.ru/ommm>
		Options ExecCGI Indexes FollowSymLinks Includes MultiViews
		AllowOverride All
	</Directory>
</VirtualHost>
