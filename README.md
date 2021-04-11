## Deuxième évaluation en cours de formation de Nassim Fernane 05/04/2021

## **CONTEXTE EVALUATION**

"Vous travaillez pour une entreprise qui édite un site internet qui tente de faire concurrence à AlloCiné et SensCritique dans le domaine des animes. Le but du projet est d’avoir des critiques de bonne qualité, et de pouvoir permettre aux visiteurs du site de découvrir de nouveaux animes."

## **ORGANISATION DU CODE**

Le code est organisé en architecture MVC.

### **1ère phase : les Routes**

Les requêtes sont en premier lieu analysées par le routeur de Laravel. En fonction de l'url rencontrée et du "verbe" utilisé (GET, POST, DELETE, UPDATE, PUT ou PATCH), le routeur redirige vers une autre page ou vers une "action", le plus souvent liée à une méthode attachée à un Controller. Ici les routes ont été organisées par catégories, les routes liées à l'authentification, aux animes, aux watchlists et aux reviews.

Les catégories principales ont toutes un préfixe et une base nominale communs, et suivent la convention Laravel pour les actions CRUD concernant les ressources :

-   Index pour afficher l'ensemble de la ressource
-   show pour affiche une ressource particulière sur son ID
-   create pour afficher le formulaire qui sert à ajouter une nouvelle ressource
-   store pour la persister dans la base de données
-   edit pour afficher le formulaire d'édition
-   update pour persister cette édition
-   destroy pour supprimer une ressource

#### 2ème phase : les Controlleurs

Les controlleurs contiennent la logique concernant les actions effectuées par l'utilisateur.

## **FONCTIONNEMENT ET DESCRIPTION DU SITE**

### Page 1

### Page 2
