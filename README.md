## Deuxième évaluation en cours de formation de Nassim Fernane 05/04/2021

## **CONTEXTE EVALUATION**

"Vous travaillez pour une entreprise qui édite un site internet qui tente de faire concurrence à AlloCiné et SensCritique dans le domaine des animes. Le but du projet est d’avoir des critiques de bonne qualité, et de pouvoir permettre aux visiteurs du site de découvrir de nouveaux animes."

## **ORGANISATION DU CODE**

Le code est organisé en architecture MVC.

### **1ère section : les Routes**

Les requêtes sont en premier lieu analysées par le routeur de Laravel. En fonction de l'url rencontrée et du "verbe" utilisé (GET, POST, DELETE, UPDATE, PUT ou PATCH), le routeur redirige vers une autre page ou vers une "action", le plus souvent liée à une méthode attachée à un Controller. Ici les routes ont été organisées par catégories, les routes liées à l'authentification, aux animes, aux watchlists et aux reviews.

Les catégories principales ont toutes un préfixe et une base nominale communs, et suivent la convention Laravel pour les actions CRUD concernant les ressources :

-   **_Index_** pour afficher l'ensemble de la ressource
-   **_Show_** pour affiche une ressource particulière sur son ID
-   **_Create_** pour afficher le formulaire qui sert à ajouter une nouvelle ressource
-   **_Store_** pour la persister dans la base de données
-   **_Edit_** pour afficher le formulaire d'édition
-   **_Update_** pour persister cette édition
-   **_Destroy_** pour supprimer une ressource

### 2ème section : les Controlleurs

Les controlleurs contiennent la logique concernant les actions effectuées par l'utilisateur. Ils suivent le même pattern de regroupement que le routeur, chacun regroupant les méthodes relatives à une ressource ou un thème spécifique.

AnimeController par exemple contient toutes les actions en lien avec les données des animes:

-   Une méthode statique pour mettre à jour la note moyenne d'un anime dans la bdd.
-   Une méthode statique pour ajouter la répartition des notes à un anime qu'on veut afficher dans une page.
-   Des méthodes index et show correspondant aux routes expliquées plus haut.
-   Une méthode pour afficher la top liste des utilisateurs.

Les controlleurs peuvent opérer directement des requêtes sur la BDD, ou se mettre en relation avec des Modèles pour établir une connexion via Eloquent ou le Query Builder, et envoient ensuite généralement les résultats de ces requêtes à une Vue qui se chargera de les afficher.

### 3ème section : les Modèles

Les modèles contiennent les données et la logique qui leur sont associées. Ils ne sont pas très développés dans ce projet mais ils servent entre autres à définir la structure des tables et la validation des données reçues.

Dans le cas de Laravel, on peut associer ces Modèles à des Factories pour générer des ressources de manière automatisée, et à des Seeders pour pré-remplir des tables de données.

Pour ce projet, en plus des seeders présents dans l'énoncé de base pour peupler les animes, ont été inclus l'utilisation des factories pour créer 10 utilisateurs avec Faker, et des seeders pour ajouter automatiquement des critiques de la part de tous les utilisateurs sur chaque anime, couplé avec un générateur de texte pour obtenir des reviews aléatoires en fonction de la note donnée par l'utilisateur.

### 4ème section : les Vues

Les vues constituent la partie visible d'une interface graphique. Elles se servent du modèle ou des données renvoyées par les conrolleurs pour les intégrer et les afficher dans des templates HTML.

Elles sont encore une fois organisées par thème, avec un dossier en plus regroupant la base du layout et les composants réutilisables.

J'ai utilisé Sass comme framework css, sur la base adaptée d'un pattern 7-1 et en notation BEM.

## **OUTILS LARAVEL**

En dehors de l'architecture MVC et des outils déjà cités plus haut, j'ai pu aussi découvrir pendant cette évalusation :

### Les migrations

Constituées de deux fonctions natives pour la création ou leur déplétion, elles permettent de créer facilement des tables et des colonnes dans la BDD, en incluant les types de données et les relations entre les tables.

Elles permettent de partager facilement le setup d'une bdd entre plusieurs devs et de "reboot" sur une simple commande toute la BDD sur une base saine.

### Les tests phpunit

Je n'ai pas encore pris le temps d'explorer ça en profondeur, mais j'ai découvert et ajouté quelques tests phpunit pour opérer des tests unitaires ou de features sur les requêtes au site ou à la bdd.

### Les instances Request

En créant des instances Request, on peut séparer la logique de validation des données reçues par les utilisateurs, y ajouter des fonctions d'autorisation et sans doutes d'autres choses. (A creuser).
