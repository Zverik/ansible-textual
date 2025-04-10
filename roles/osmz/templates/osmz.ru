# First simple directories

<VirtualHost *:80>
	ServerName pt.osmz.ee
	ServerAlias pt.osmz.ru
	DocumentRoot {{ sites }}/osmz.ru/pt
	CustomLog /var/log/apache2/osmz.ru/access_log combined
	ErrorLog /var/log/apache2/osmz.ru/error_log

	<Directory {{ sites }}/osmz.ru/pt>
            Require all granted
	</Directory>
</VirtualHost>

<VirtualHost *:80>
	ServerName dms.osmz.ee
	ServerAlias dms.osmz.ru
	DocumentRoot {{ sites }}/osmz.ru/dms
	CustomLog /var/log/apache2/osmz.ru/access_log combined
	ErrorLog /var/log/apache2/osmz.ru/error_log

	<Directory {{ sites }}/osmz.ru/dms>
            Require all granted
	</Directory>
</VirtualHost>

<VirtualHost *:80>
	ServerName cards.osmz.ee
	ServerAlias cards.osmz.ru
	DocumentRoot {{ sites }}/osmz.ru/cards
	CustomLog /var/log/apache2/osmz.ru/access_log combined
	ErrorLog /var/log/apache2/osmz.ru/error_log

	<Directory {{ sites }}/osmz.ru/cards>
		Options ExecCGI Indexes FollowSymLinks Includes MultiViews
		AllowOverride All
	</Directory>
</VirtualHost>

<VirtualHost *:80>
	ServerName krym.osmz.ee
	ServerAlias krym.osmz.ru
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
	Redirect permanent / http://krym.osmz.ee/
</VirtualHost>

<VirtualHost *:80>
	ServerName birzha.osmz.ee
	ServerAlias market.osmz.ru
	ServerAlias birzha.osmz.ru
	DocumentRoot {{ sites }}/osmz.ru/birzha
	CustomLog /var/log/apache2/osmz.ru/access_log combined
	ErrorLog /var/log/apache2/osmz.ru/error_log

	<Directory {{ sites }}/osmz.ru/birzha>
		Options +FollowSymLinks -Indexes +MultiViews
		AllowOverride All
	</Directory>
</VirtualHost>


# Finally the osmz directory

{% if osmz_cert.stat.exists %}
<VirtualHost *:443>
{% else %}
<VirtualHost *:80>
{% endif %}
	ServerName osmz.ee
	DocumentRoot {{ sites }}/osmz.ru/www
	CustomLog /var/log/apache2/osmz.ru/access_log combined
	ErrorLog /var/log/apache2/osmz.ru/error_log

{% if osmz_cert.stat.exists %}
  SSLEngine on
  SSLCertificateFile "{{ cert_path.osmzee }}/fullchain.pem"
  SSLCertificateKeyFile "{{ cert_path.osmzee }}/privkey.pem"
{% endif %}

	<Directory {{ sites }}/osmz.ru/www>
		Options ExecCGI Indexes FollowSymLinks Includes MultiViews
		AllowOverride All
	</Directory>
</VirtualHost>

{% if osmz_cert.stat.exists %}
<VirtualHost *:443>
	ServerName osmz.ru
	Redirect permanent / https://osmz.ee/
</VirtualHost>

<VirtualHost *:80>
	ServerName osmz.ru
	ServerAlias www.osmz.ru
	ServerAlias osmz.ee
	ServerAlias www.osmz.ee
	Redirect permanent / https://osmz.ee/
</VirtualHost>
<VirtualHost *:80>
	ServerName osmz.ru
	ServerAlias www.osmz.ru
	ServerAlias osmz.ee
	ServerAlias www.osmz.ee
	Redirect permanent / https://osmz.ee/
</VirtualHost>
{% endif %}
