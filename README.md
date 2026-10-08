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

### Instalar Talwind e rodar ao mesmo tempo que o php artisan serve ( num segundo terminal )
```bash
npm install -D tailwindcss postcss autoprefixer
npx tailwindcss init -p
```