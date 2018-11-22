API Dragow
==
Installation de l'environnement de dévelopemment
-

    composer install
    
Lancer le serveur en local
-

    php artisan serve
    
Remplir la base de données avec les seeder
-

    php artisan migrate:fresh --seed
relancer si l'erreur suivante survient (j'ai juste pas réussi à seeder de manière unique)

    Integrity constraint violation: 1062 Duplicate entry for key 'guilds_name_unique'
