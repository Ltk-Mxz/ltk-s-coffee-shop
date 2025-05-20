# MCD de la base de données coffee-ltk

Ce diagramme représente les principales entités et les relations entre elles.

```mermaid
erDiagram
    ADMINISTRATEURS {
        int id_admin PK
        varchar nom_admin
        varchar email
        varchar mot_de_passe
        timestamp created_at
    }
    UTILISATEURS {
        int id_utilisateur PK
        varchar nom_utilisateur
        varchar email
        varchar mot_de_passe
        timestamp created_at
    }
    PRODUITS {
        int id_produit PK
        varchar nom_produit
        varchar image_produit
        text description_produit
        varchar prix
        varchar type_produit
        timestamp created_at
    }
    COMMANDES {
        int id_commande PK
        varchar prenom
        varchar nom
        varchar region
        varchar adresse
        varchar ville
        varchar code_postal
        varchar telephone
        int id_utilisateur FK
        varchar statut_commande
        int prix_total
        timestamp created_at
    }
    PANIER {
        int id_panier PK
        varchar nom_produit
        varchar image
        varchar prix
        int id_produit FK
        text description_produit
        int quantite
        int id_utilisateur FK
        timestamp created_at
    }
    AVIS {
        int id_avis PK
        varchar commentaire
        varchar nom_utilisateur
        timestamp created_at
    }
    RESERVATIONS {
        int id_reservation PK
        varchar prenom
        varchar nom
        varchar date_reservation
        varchar heure_reservation
        varchar telephone
        text message_reservation
        varchar statut_reservation
        int id_utilisateur FK
        timestamp created_at
    }

    UTILISATEURS ||--o{ COMMANDES : "passe"
    UTILISATEURS ||--o{ PANIER : "possède"
    PRODUITS ||--o{ PANIER : "inclut"
    UTILISATEURS ||--o{ RESERVATIONS : "fait"
