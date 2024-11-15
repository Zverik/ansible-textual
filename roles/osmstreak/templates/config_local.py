DEBUG = False
DATABASE_URI = "mysql://{{ osmstreak_mysql_user }}:{{ osmstreak_mysql_password }}@localhost/{{ osmstreak_mysql_db }}"
OAUTH_KEY = "{{ osmstreak_client_id }}"
OAUTH_SECRET = "{{ osmstreak_client_secret }}"
SECRET_KEY = "{{ osmstreak_secret }}"
TELEGRAM_TOKEN = "{{ osmstreak_telegram_token }}"
BASE_URL = "https://{{ domain }}/"
