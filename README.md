# pbkk-eventful

## Config
### Virtual Host
* buat `.env` dari `.env.example` yang disediakan
* Tambahkan snippet berikut ke `xampp\apache\conf\extra\httpd-vhosts.conf`
  ```
  <VirtualHost *:80>
    DocumentRoot "C:/xampp/htdocs/eventful/public"
    ServerName eventful.llc
    <Directory "C:/xampp/htdocs/eventful/public">
    </Directory>
  </VirtualHost>
  ```
* Tambahkan pada file `C:/Windows/System32/drivers/etc/hosts`
  ```
  127.0.0.1 eventful.llc
  ```
* 
### Database
* TBA
### Mailing
* TBA

## Local Deployment
* TBA
