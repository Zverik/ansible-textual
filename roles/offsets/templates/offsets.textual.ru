<VirtualHost *:80>
  ServerName {{ domain }}
  DocumentRoot {{ sites }}/{{ domain }}/www

  CustomLog /var/log/apache2/{{ domain }}/access_log combined
  ErrorLog /var/log/apache2/{{ domain }}/error_log

  <Directory {{ sites }}/{{ domain }}/www>
    Options FollowSymLinks Includes MultiViews
    AllowOverride All
  </Directory>
</VirtualHost>

{% if offsets_cert.stat.exists %}
<VirtualHost *:443>
  ServerName {{ domain }}
  DocumentRoot {{ sites }}/{{ domain }}/www

  CustomLog /var/log/apache2/{{ domain }}/access_log combined
  ErrorLog /var/log/apache2/{{ domain }}/error_log

  SSLEngine on
  SSLCertificateFile "{{ cert_path.offsets }}/fullchain.pem"
  SSLCertificateKeyFile "{{ cert_path.offsets }}/privkey.pem"

  <Directory {{ sites }}/{{ domain }}/www>
    Options FollowSymLinks Includes MultiViews
    AllowOverride All
  </Directory>
</VirtualHost>
{% endif %}
