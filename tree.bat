@echo off
:: Créer les dossiers principaux
mkdir app\controllers
mkdir app\models
mkdir app\views\commun
mkdir app\views\administrateur
mkdir app\views\utilisateur
mkdir config
mkdir core
mkdir vendor
mkdir public\assets\css
mkdir public\assets\js
mkdir public\assets\images

:: Créer les fichiers de base
type nul > app\controllers\AuthController.php
type nul > app\controllers\LogementController.php
type nul > app\controllers\EvenementController.php
type nul > app\controllers\EchangeController.php

type nul > app\models\Utilisateur.php
type nul > app\models\Logement.php
type nul > app\models\Evenement.php
type nul > app\models\Echange.php

type nul > app\views\commun\header.php
type nul > app\views\commun\footer.php
type nul > app\views\commun\login.php
type nul > app\views\commun\inscription.php

type nul > app\views\administrateur\index.php
type nul > app\views\utilisateur\index.php

type nul > config\database.php

type nul > core\Router.php
type nul > core\Controller.php
type nul > core\Model.php

type nul > public\index.php
type nul > public\assets\css\style.css
type nul > public\assets\js\script.js
type nul > public\assets\images\logo.png
type nul > public\.htaccess

:: Fichier d'index principal pour la redirection (facultatif)
type nul > index.php

:: Afficher un message de fin
echo Arborescence MVC générée dans le dossier mon_projet.
pause
