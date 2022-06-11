# pbkk-eventful

## Tech Stacks
Built with
* Laravel 9
* Tailwind CSS

## Branch Nomenclature
### Protected Branches
* `master`, main branch—all feature and hotfix branches should PR to here
* `production`, used by Heroku for online deployment—master should PR to here if needed
* `feature/{feature_name}`, development branch for app features—ex: `feature/authentication`
* `hotfix/{issue_name}`, to create bugfixes if needed

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

### Laravel Breeze
* `php artisan breeze:install`
* `npm install`
* `npm run dev`
* `php artisan migrate --seed`
* Password default bagi user adalah '12345678'
