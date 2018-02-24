# Gestionnaire de Réunion

## Introduction

Ce projet a été réalisé dans le cadre d'un projet d'école pour le compte de Télécom Saint-Etienne.

## 1) Installation
### Récupérer le code source
`git clone https://github.com/rommni/reunion.git`

### Installer les dépendances
Commencer par vous rendre dans le dossier du projet:
`cd reunion`
Il faut npm(Node.js) et composer pour installer les dépendances, si vous ne les possèdez pas déjà:
```
wget https://raw.githubusercontent.com/composer/getcomposer.org/c1ad3667731e9c5c1a21e5835c7e6a7eedc2e1fe/web/installer -O - -q | php -- --quiet
php composer-setup.php --install-dir=usr/local/bin --filename=composer
php -r "unlink('composer-setup.php');"
curl -sL https://deb.nodesource.com/setup_8.x | sudo -E bash -
sudo apt-get install -y nodejs
```
Puis pour installer les dépendances:
```
npm install
composer install
```

## 2) Configuration
### DB et Assets
Créer un fichier .env à part de .env.dist
`cp .env.dist .env`
Ouvrer le fichier .env et modifier la ligne DATABASE_URL pour faire correspondre à votre base de donnée Mysql.

Générer les assets du projet:
`./node_modules/.bin/encore production`

### Démarer le serveur
`php bin/console server:run`

## 3) Utilisation
Rendez vous à l'adresse http://127.0.0.1:8000
Vous pouvez sur cette page créer de nouvelle réunion en choisissant un nom à celle-ci et un ensemble de date.
En cliquant sur une réunion vous êtes ammené sur la liste des Ordres du Jour de cette réunion, vous pouvez en créer, en modifier, en supprimer.
L'enregistrement du titre et des échanges de l'ordre du jour se fait lorsque le champs perd le focus (changement de champs).
Depuis cette page et l'accueil vous pouvez accéder à un compte-rendu de la réunion sous forme d'un tableau contenant l'ensemble des points à l'ordre du jour dans un tableau triable par titre ou par contenue.
