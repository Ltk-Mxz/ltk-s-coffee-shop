# Coffee LTK

Coffee LTK est une application web de gestion de café, permettant la présentation de produits (boissons, desserts), la gestion des commandes, des réservations de tables, des avis clients et un espace d'administration.

## Fonctionnalités principales

- **Catalogue produits** : Affichage des boissons et desserts avec images, descriptions et prix.
- **Panier et commandes** : Ajout au panier, gestion des quantités, validation de commande.
- **Réservations** : Formulaire de réservation de table avec gestion des utilisateurs.
- **Avis clients** : Système d'avis et témoignages affichés sur le site.
- **Espace administrateur** : Gestion des produits, utilisateurs, commandes et réservations.
- **Responsive design** : Interface adaptée aux mobiles et tablettes.
- **Intégration Google Maps** : Localisation du café.

## Technologies utilisées

- **Backend** : PHP (PDO, sessions)
- **Base de données** : MySQL/MariaDB
- **Frontend** : HTML5, CSS3, Bootstrap, JavaScript (jQuery)
- **Librairies** : TCPDF (génération PDF), IcoMoon (icônes), Owl Carousel, Google Maps API

## Installation

1. **Cloner le projet**  

2. **Base de données**  
   - Importer le fichier `coffee-ltk.sql` dans votre serveur MySQL/MariaDB.

3. **Configuration**  
   - Modifier les accès à la base de données dans `config/config.php` selon votre environnement.

4. **Démarrage**  
   - Placer le dossier dans votre serveur local (ex: XAMPP `htdocs`).
   - Accéder à `http://localhost/coffee-ltk/` dans votre navigateur.

## Structure du projet

- `/admin-panel` : Espace d'administration (gestion produits, utilisateurs, commandes, réservations)
- `/products` : Pages produits, panier, gestion des achats
- `/booking` : Réservations de tables
- `/includes` : Fichiers d'en-tête, pied de page, etc.
- `/fonts`, `/css`, `/js`, `/images` : Ressources statiques
- `/tcpdf` : Librairie pour génération de PDF

## Comptes de test

- **Administrateur** :  
  Email : <ltk@ltk.fr>  
  Mot de passe : (voir table `administrateurs` dans la base de données)

- **Utilisateur** :  
  Email : <user2@gmail.com>  
  Mot de passe : (voir table `utilisateurs` dans la base de données)

## Licence

Ce projet utilise des polices et librairies open source (voir dossiers `/fonts`, `/tcpdf`).  
Le code source du projet est sous licence MIT.
