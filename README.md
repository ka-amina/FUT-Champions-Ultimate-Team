# FUT Champions Ultimate Team - Backend Management System
## Présentation du Projet
Ce système backend est une solution de gestion de contenu robuste pour la plateforme FUT Champions Ultimate Team, développé en PHP (procédural) et MySQLi. 
Le projet se concentre sur la création d'un backend flexible, sécurisé et multilingue pour gérer les joueurs, les équipes, les nationalités et d'autres entités connexes.
## Technologies Utilisées
- PHP (Procédural)
- MySQLi
- HTML5
- JavaScript
- CSS3
## Fonctionnalités Principales
1. Gestion des Entités:
- Ajouter, modifier, supprimer et lister des joueurs
- Gérer les équipes et leurs relations
- Gérer les informations de nationalité
## Tableau de Bord et Statistiques
- Tableau de bord dynamique avec statistiques clés
- Graphiques interactifs utilisant Chart.js
- Visualisation des données de joueurs et d'équipes
3. Internationalisation (i18n)
- Support multilingue
- Possibilité de changement de langue
- Fichiers de langue séparés pour chaque langue supportée
## Étapes d'Installation
1. Cloner le dépôt
2. Importer le schéma SQL
3. Configurer la connexion à la base de données
4. Configurer les variables d'environnement
5. Vérifier les permissions de fichiers
## Configuration de la Base de Données
- Consulter `config/database.php` pour les paramètres de connexion
- Utiliser des variables d'environnement pour les informations sensibles
# Structure du Code
```bash
racine-du-projet/
│
├── assets/
│   ├── js/
│   ├── css/
│   └── lang/
│       ├── en.ini
│       ├── fr.ini
│       └── lan.php
│
├── config/
│   ├── connection.php
│   └── database.sql
│
├── uml/
│   ├── uml.php
│   └── uml.png
│
├── views/
│   ├── dashboard/
│   |   └── dashboard.php
│   └── Home/
└── README.md
```