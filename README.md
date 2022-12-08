-composer install
-copy .env.example .env
-créer une base de données
-mettre le nom de la base de données dans le .env
-remplacez ces lignes dans le fichier .env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=465
MAIL_USERNAME=5devmate@gmail.com
MAIL_PASSWORD=rnhqppuamoolnljp
MAIL_ENCRYPTION=ssl
MAIL_FROM_ADDRESS="5devmate@gmail.com"
MAIL_FROM_NAME="${APP_NAME}"

-php artisan key:generate
-php artisan migrate
-npm install
-npm run build
-php artisan serve

