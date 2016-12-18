Make sure Directory is blocked for every upload file dir

Right now I have 

	ScriptAlias /LoginRegister/uploads/ /var/www/devrichie.com/pubic_html/LoginRegister/uploads/
	<Directory "/var/www/devrichie.com/pubic_html/LoginRegister/uploads">
		AllowOverride None
		Order deny,allow
		Deny from all
	</Directory>

enabled in devrichie settings.
