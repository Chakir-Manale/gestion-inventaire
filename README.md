# Prérequis

* git
* composer
* Accès au repository Gitlab: https://gitlab.com/belhadjgi/gestion-de-stock.git
* Avoir une clé ssh Gitlab https://gitlab.com/profile/keys


#
# Installation

1. Cloner le projet : <code> git clone  https://gitlab.com/belhadjgi/gestion-de-stock.git </code> 
2. Ignore les changements de permission : <code>git config --global core.fileMode false</code>
3. Force le lf quand  git pull sur windows: 
    <code>git config --global core.eol lf</code>
    <code>git config --global core.autocrlf input</code>
4. Installation des dépendances : <code>composer install</code>
5. L'importde la base de donnée de recette: <code>vendor/bin/drush sql-cli < database.sql</code><br/>
6. Vidage du cache Drupal: <code>vendor/bin/drush cr </code>

# Développement Front

Nous utilisons GULP afin de gérer nos fichiers HTML / CSS / JS

1. Il faut installer NODEJS dans sa dernière version LTS (https://nodejs.org/en/download/)
2. Il faut installer le projet gulp 
    - SE positionner dans le répertoire  web/themes/custom/sqli_inventaire/assets
    - Lancer la commande "npm install"
3. Utilisation de gulp
    - serveur:
En lancant la commande "npm start". Un serveur sera lancé en local avec Browser-sync et toutes les modifications de css / js seront visisble automatiquement.
    - build: 
En lancant la commande "npm run build" les fichiers css / js seront minifiés et aggrégés dans Drupal
4. Fichiers:
    - Les fichiers SCSS se trouvent dans le répertoire "web/themes/custom/sqli_inventaire/assets/scss"
    - Les fichiers javascripts se trouvent dans le répertoire "web/themes/custom/sqli_inventaire/assets/js"
    
    
# Développement Drupal

L'utilisation de Drush pour Drupal est obligatoire.

1. Pour vider le cache: <code>vendor/bin/drush cr </code>
2. Se connecter à la base de données: <code>vendor/bin/drush sqlc</code>
3. Importer un DUMP de base de données: <code>vendor/bin/drush sql-cli < /chemin-vers-le-dump.sql</code>

4. Gestion des configurations

- Lors de la modification des configurations dans le backoffice de Drupal il faut exporter la configuraitons avec la commande:
    <code>vendor/bin/drush cex</code>

- Ensuite il faut tester que nos fichiers contiennent bien la bonne configuration avec l'import:
    <code>vendor/bin/drush cim </code>(import complet)

