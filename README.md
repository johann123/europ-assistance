# Europ-assistance Laravel teszt APP

### Requirements

`php8, node`

### Konfig (DB)

`.env` állományban a következő paraméterek kitöltése

```
DB_CONNECTION=
DB_HOST=
DB_PORT=
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```

### Telepítés és futtatás

```
composer install
npm install
npm run build
php artisan migrate:refresh --seed  #destroy, migrate + seed tables
php artisan serve
```
