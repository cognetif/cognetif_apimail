# Cognetif ApiMail

## Description
ApiMail allows you to configure Perch to send email via web based API's such as SendGrid rather than SMTP or sendmail.

## Connections
The following connection(s) is(are) included out of the box. 
1. [SendGrid](https://sendgrid.com/)

## Connection development:
You can create a new connection to suit your need, simply extend the `\Cognetif\ApiMail\Connections\BaseConnection` class and implement the `send()` function provided and change the fully qualified class name defined in the `COGNETIF_APIMAIL_CONNECTOR` constant.
If you need help creating your connection, contact [Cognetif](https://cognetif.com) and we can help implement you required API.

## Requirements
1. Perch version 3.1.5
1. PHP 7+


## Installation
1. Add cognetif_apimail to `addons/apps/` folder and `apps.php`
1. Configure Perch to send email via the `api` method in  `perch/config/config.php` by adding: `define('PERCH_EMAIL_METHOD', 'api');`
1. Install dependencies with composer from within `cognetif_apimail` directory:
    ```bash
      perch/addons/apps/cognetif_apimail $ composer install
    ```
1. Add the following constant to your `config.php` file:
    ```php
      define('COGNETIF_APIMAIL_CONNECTOR', '\Cognetif\ApiMail\Connections\SendGrid');
    ```
1. Define any other constants required by your API connector, if using SendGrid, you will need to define:
    ```php
       define('COGNETIF_APIMAIL_SENDGRID_KEY', 'YOUR API KEY HERE');
    ```

# Usage
1. The app is seamlessly integrated into Perch and once configured, will send all email via the API connector configured.
2. If you want to use another mail API, simply create your own class that extends the `\Cognetif\ApiMail\Connections\BaseConnection` class and add update the `COGNETIF_APIMAIL_CONNECTOR` constant to point to your new fully qualified class name.

## License
This project is free, open source, and GPL friendly. You can use it for commercial projects, open source projects, or really almost whatever you want.

## Donations
This is free software but it took some time to develop.  If you use it, please send me a message I'd be interested to know which site uses it. If you appreciate the app and use it regularly, feel free to [Buy me a Beer](https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=6EBCDCCZRNSWW&source=url)!

## Issues
Create a GitHub Issue: https://github.com/cognetif/apimail or better yet become a contributor and share your connections!

## Developer
Cognetif : Jordin Brown jbrown@cognetif.com
