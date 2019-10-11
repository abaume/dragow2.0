API Dragow
==
Installation de l'environnement de dévelopemment
-
    composer install
    composer dump-autoload
    
Lancer le serveur en local
-
    php artisan serve
    
Remplir la base de données avec les seeder
-
    php artisan migrate:fresh --seed
Relancer si l'erreur suivante survient (j'ai juste pas réussi à seeder de manière unique)

    Integrity constraint violation: 1062 Duplicate entry for key 'guilds_name_unique'

Générer un token dans le .env
-
    php artisan jwt:secret
    
