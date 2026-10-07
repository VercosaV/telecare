## About Begin

- Começando a partir do zero

```bash
copy .env.example .env
```
### Mudar o DB_CONNECTION do .env para mysql e descomentar os códigos

```bash
composer composer install
composer update
php artisan key:generate
php artisan migrate
php artisan serve
```