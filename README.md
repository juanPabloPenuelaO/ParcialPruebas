php 8.2.26
Laravel
composer
PostgreSQL

git clone "https://github.com/juanPabloPenuelaO/ParcialPruebas"

composer install
npm install && npm run dev

php artisan key:generate

ejemplo env:
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:bA1kgvZVijamSwNxD+ihfJ4VpoYhrnWCEF8g0ooLliY=
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=ParcialInventario
DB_USERNAME=postgres
DB_PASSWORD=1234

ejecutar las migraciones con : php artisan migrate

ejecución de pruebas: php artisan test