# Docker Apache, PHP 7.3, and local HTTPS support

This project can execute a PHP site in any folder from <https://localhost/>.

It builds a Docker image with SSL, Apache, and PHP 7.3. Port 80 can still be used, but a real SSL certificate avoids development anomalies (such as files not caching in the browser) and prevents port 80 clashes with applications such as Skype.
