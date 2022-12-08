# INSTALLATION DES COMPOSANTS

- composer install
- copy .env.example .env
- créer une base de données


# PARAMETRAGE DES VARIABLES D'ENVIRONNEMENT POUR LE RESET DU PASSWORD

## Dans le fichier .env, modifier les variables d'environnement suivantes comme indiqué ci-dessus:
<pre>
    MAIL_MAILER=smtp
    MAIL_HOST=smtp.gmail.com
    MAIL_PORT=465
    MAIL_USERNAME=5devmate@gmail.com
    MAIL_PASSWORD=rnhqppuamoolnljp
    MAIL_ENCRYPTION=ssl
    MAIL_FROM_ADDRESS="5devmate@gmail.com"
    MAIL_FROM_NAME="${APP_NAME}"
</pre>

# INITIALISATION DE LA BASE DE DONNEES, DE LA CLE D'APPLICATION, DES COMPOSANTS ET DE L'HERBEGEMENT WEB

- php artisan key:generate
- php artisan migrate
- npm install
- npm run build
- php artisan serve

