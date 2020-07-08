# Docker Apache, PHP 7.3, and local HTTPS support

This project can execute a PHP site in any folder from <https://localhost/>.

It builds a Docker image with SSL, Apache, and PHP 7.3. Port 80 can still be used, but a real SSL certificate avoids development anomalies (such as files not caching in the browser) and prevents port 80 clashes with applications such as Skype.

The default Docker PHP image is used. Only URL rewrites are enabled in Apache.


## Requirements

1. [Docker](https://www.docker.com/) for Windows, macOS, or Linux
1. [mkcert](https://github.com/FiloSottile/mkcert) for creating locally-trusted development SSL certificates ([builds available](https://github.com/FiloSottile/mkcert/releases))


## Generate SSL certificates

These steps need only be followed once.

> On Windows devices with WSL2, certificates generated in Windows will work in Linux and vice-versa.

Install a new local certificate authority in your browsers:

```sh
mkcert -install
```

> If this fails in Firefox:
>
> 1. Locate the generated `rootCA.pem` file. It will be at the location returned by entering `mkcert -CAROOT` (Usually `C:\Users\<name>\AppData\Local\mkcert` on Windows).
> 1. In Firefox, open the menu and choose *Options*, then *Privacy & Security*. Scroll to the bottom and click **View Certificates**. Select the **Authorities tab**, click **Import...**, open the `rootCA.pem` file, and restart the browser.

Create locally-trusted development certificates:

```sh
mkcert localhost 127.0.0.1 ::1
```

> You can use any domain, although 'localhost' may be practical when creating Progressive Web Apps or debugging.

Rename the generated files:

* `cert.pem` for the SSL certificate, and
* `cert-key.pem` for the SSL certificate key file

and copy them to the `ssl` directory in this project.


## Initial setup

This step need only be followed once or if you remove the image.

Build a Docker image from this directory:

```sh
docker image build -t php73 .
```

> The image is named `php73` here, but any name can be used.


## Launch the container

Start a container in any directory with `docker run`:

```sh
docker run \
  -it --rm \
  -p 8080:80 -p 443:443 \
  --name php73site \
  -v "$PWD":/var/www/html \
  php73
```

> **Windows Powershell note**: remove the line-breaks and `\` backslashes from this command.
>
> `$PWD` references the current directory on Linux and macOS. It cannot be used on Windows so the full path must be specified in Linux notation, e.g.
>
> ```sh
> -v /c/projects/mysite:/var/www/html
> ```

Open <https://localhost/> in a browser and develop accordingly. This project directory provides some example PHP files.

The same files can also be tested at <http://localhost:8080/> if necessary.

To stop the container, press `Ctrl | Cmd + C` in the terminal.


## Launch the container with Docker Compose

Alternatively, copy `docker-compose.yml` to your application directory and launch the site with:

```sh
docker-compose up
```

To stop, enter `docker-compose down` in another terminal.
