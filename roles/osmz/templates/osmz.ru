# First simple directories

<VirtualHost *:80>
	ServerName pt.osmz.ru
	DocumentRoot {{ sites }}/osmz.ru/pt
	CustomLog /var/log/apache2/osmz.ru/access_log combined
	ErrorLog /var/log/apache2/osmz.ru/error_log

	<Directory {{ sites }}/osmz.ru/pt>
            Require all granted
	</Directory>
</VirtualHost>

<VirtualHost *:80>
	ServerName dms.osmz.ru
	DocumentRoot {{ sites }}/osmz.ru/dms
	CustomLog /var/log/apache2/osmz.ru/access_log combined
	ErrorLog /var/log/apache2/osmz.ru/error_log

	<Directory {{ sites }}/osmz.ru/dms>
            Require all granted
	</Directory>
</VirtualHost>

<VirtualHost *:80>
	ServerName cards.osmz.ru
	DocumentRoot {{ sites }}/osmz.ru/cards
	CustomLog /var/log/apache2/osmz.ru/access_log combined
	ErrorLog /var/log/apache2/osmz.ru/error_log

	<Directory {{ sites }}/osmz.ru/cards>
		Options ExecCGI Indexes FollowSymLinks Includes MultiViews
		AllowOverride All
	</Directory>
</VirtualHost>

<VirtualHost *:80>
	ServerName krym.osmz.ru
	DocumentRoot {{ sites }}/osmz.ru/krym
	CustomLog /var/log/apache2/osmz.ru/access_log combined
	ErrorLog /var/log/apache2/osmz.ru/error_log

	<Directory {{ sites }}/osmz.ru/krym>
		Options +ExecCGI +FollowSymLinks -Indexes +MultiViews
		AllowOverride All
	</Directory>
</VirtualHost>

<VirtualHost *:80>
	ServerName crimea.osmz.ru
	ServerAlias *.crimea.osmz.ru
	ServerAlias www.krym.osmz.ru
	ServerAlias *.krym.osmz.ru
	Redirect permanent / http://krym.osmz.ru/
</VirtualHost>

<VirtualHost *:80>
	ServerName birzha.osmz.ru
	ServerAlias market.osmz.ru
	DocumentRoot {{ sites }}/osmz.ru/birzha
	CustomLog /var/log/apache2/osmz.ru/access_log combined
	ErrorLog /var/log/apache2/osmz.ru/error_log

	<Directory {{ sites }}/osmz.ru/birzha>
		Options +FollowSymLinks -Indexes +MultiViews
		AllowOverride All
	</Directory>
</VirtualHost>


# Finally the osmz directory

<VirtualHost *:80>
	ServerName osmz.ru
	DocumentRoot {{ sites }}/osmz.ru/www
	CustomLog /var/log/apache2/osmz.ru/access_log combined
	ErrorLog /var/log/apache2/osmz.ru/error_log

	<Directory {{ sites }}/osmz.ru/www>
		Options ExecCGI Indexes FollowSymLinks Includes MultiViews
		AllowOverride All
	</Directory>
</VirtualHost>

<VirtualHost *:80>
	ServerName www.osmz.ru
	Redirect permanent / http://osmz.ru/
</VirtualHost>

{% if osmz_cert.stat.exists %}
<VirtualHost *:443>
	ServerName osmz.ru
	DocumentRoot {{ sites }}/osmz.ru/www
	CustomLog /var/log/apache2/osmz.ru/access_log combined
	ErrorLog /var/log/apache2/osmz.ru/error_log

  SSLEngine on
  SSLCertificateFile "/etc/letsencrypt/certs/fullchain_osmz.ru.crt"
  SSLCertificateKeyFile "/etc/letsencrypt/keys/osmz.ru.key"

	<Directory {{ sites }}/osmz.ru/www>
		Options ExecCGI Indexes FollowSymLinks Includes MultiViews
		AllowOverride All
	</Directory>
</VirtualHost>
{% endif %}
