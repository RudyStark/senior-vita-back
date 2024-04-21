# SENIOR VITA BACKEND #
## Description ##
C'est le backend de l'application Senior Vita. Il est développé en PHP avec le framework Symfony (6.4) et utilise une base de données MySQL.

## Installation ##
1. Cloner le dépôt
2. Installer les dépendances avec la commande `composer install`
3. Créer un fichier `.env.local` à la racine du projet et y ajouter les informations de connexion à la base de données
4. Créer la base de données avec la commande `php bin/console doctrine:database:create`
5. Mettre à jour la base de données avec la commande `php bin/console doctrine:migrations:migrate`
6. Lancer le serveur avec la commande `symfony server:start`

## Documentation ##
La documentation de l'API est disponible à l'adresse `/api/doc`

## Auteurs ##
- [Rudy Saksik]

## Diagramme Relationnel ##
```mermaid
erDiagram
    USER ||--o{ PROFILE : "has"
    USER ||--o{ MESSAGE : "sends"
    USER ||--o{ REMINDER : "sets"
    USER ||--o{ MEDICAL-APPOINTMENT : "has"
    USER ||--o{ HEALTH-RECORD : "records"
    USER ||--o{ EMERGENCY-ALERT : "triggers"
    USER ||--o{ HEALTH-REPORT : "generates"
    MESSAGE ||--o{ ATTACHMENT : "includes"
    USER ||..o{ CARE-RELATIONSHIP : "participates"
    CARE-RELATIONSHIP }o..|| USER : "involves"

    USER {
        int id PK
        string email
        string password
        string role
    }

    PROFILE {
        int id PK
        int user_id FK
        string first_name
        string last_name
        string social_security_number
        date date_of_birth
        string phone_number
        string address
    }

    CARE-RELATIONSHIP {
        int id PK
        int elderly_id FK
        int caregiver_id FK
        boolean confirmed
        datetime start_date
        datetime end_date
    }

    MESSAGE {
        int id PK
        int sender_id FK
        int receiver_id FK
        text content
        datetime timestamp
    }

    ATTACHMENT {
        int id PK
        int message_id FK
        string file_path
    }

    REMINDER {
        int id PK
        int user_id FK
        string description
        datetime reminder_time
    }

    MEDICAL-APPOINTMENT {
        int id PK
        int user_id FK
        datetime appointment_time
        string location
        string description
    }

    HEALTH-RECORD {
        int id PK
        int user_id FK
        datetime record_date
        text details
    }

    EMERGENCY-ALERT {
        int id PK
        int user_id FK
        datetime alert_time
        string location
        string description
    }

    HEALTH-REPORT {
        int id PK
        int user_id FK
        datetime generated_date
        text report_details
    }



