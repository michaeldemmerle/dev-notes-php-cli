# Dev Notes PHP CLI

Une application en ligne de commande pour gérer des notes de développeur.  
Développée en PHP avec Symfony Console.

## Fonctions

- Ajouter une note : `php bin/console note:add "Titre" "Contenu"`
- Lister les notes : `php bin/console note:list`
- Rechercher une note : `php bin/console note:search "mot-clé"`

## Stack

- PHP 8+
- Symfony Console
- Stockage local en JSON

## Licence

MIT
