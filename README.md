# GESTION PRODUITS

## Prérequis
 * `PHP8`
 * [Composer](https://getcomposer.org/)
 * Base de données `MySQL ou Postgres`

## Installation avec docker
### Version MYSQL

```bash
git clone https://github.com/ClemLcs/Kubernetes_Eval.git
cd gestion-produits
```
Placez un fichier .env à la racine du dossier `php/www` avec le contenu suivant :

```ini
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=gestion_produits
DB_USERNAME=user
DB_PASSWORD=userpassword
```
Puis éxécuter la commande.
```bash
cd docker/mysql
docker compose up -d
```
Connectez-vous à l'adresse http://localhost:8080/ pour accéder à l'application.

### Version Postgres
```bash
git clone https://github.com/ClemLcs/Kubernetes_Eval.git
cd gestion-produits
```
Placez un fichier .env à la racine du dossier `php/www` avec le contenu suivant :
```ini
DB_CONNECTION=pgsql
DB_HOST=localhost
DB_PORT=5432
DB_DATABASE=gestion_produits
DB_USERNAME=user
DB_PASSWORD=userpassword
```
Puis éxécuter la commande.
```bash
cd docker/mysql
docker compose up -d
```
Connectez-vous à l'adresse http://localhost:8080/ pour accéder à l'application.

## Installation sans docker
- Effectuer la commande : `composer install`
- Modifier le fichier `php/www/.env` avec les bonnes valeurs
- Copier les fichiers du dossier `www` dans un dossier accessible par le serveur Web.
- Assurez vous que le dossier `uploads` est accessible en lecture et écriture par le serveur Web : `chmod 777 uploads`
- Importez la base de données test à partir du dump SQL `database/gestion_produits-mysql.sql`.
- Connectez vous à l'application avec l'url adaptée avec les informations suivantes :
    - Login : `admin`
    - Mot de passe : `password`

## Fonctionnalités
L'application permet de :
- Lister les produits
- Afficher la fiche produit en lecture seule
- Ajouter des produits
- Modifier les produits
- Supprimer les produits
- Pour chaque produit, il est possible d'ajouter autant de photos que nécessaire
