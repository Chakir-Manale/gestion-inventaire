# Prérequis

* git
* composer
* Accès au repository Gitlab: https://gitlab.com/belhadjgi/gestion-de-stock.git
* Avoir une clé ssh Gitlab https://gitlab.com/profile/keys


#
# Installation

1. Cloner le projet : <code> git clone  https://gitlab.com/belhadjgi/gestion-de-stock.git </code> 
2. Ignore les changements de permission : <code>git config --global core.fileMode false</code>
3. Force le lf quand  git pull sur windows: <code>git config --global core.eol lf</code>
4. git config --global core.autocrlf input
5. Installation des dépendances : <code>composer install</code>
6. L'importde la base de donnée de recette: <code>vendor/bin/drush sql-cli < database.sql</code><br/>
7. Vidage du cache Drupal: vendor/bin/drush cr 

# Développement Front

*****
    
# Développement Drupal

L'utilisation de Drush pour Drupal est obligatoire.

1. Pour vider le cache: vendor/bin/drush cr 
2. Se connecter à la base de données: vendor/bin/drush sqlc
3. Importer un DUMP de base de données: vendor/bin/drush sql-cli < /chemin-vers-le-dump.sql

4. Gestion des configurations

- Lors de la modification des configurations dans le backoffice de Drupal il faut exporter la configuraitons avec la commande:
    vendor/bin/drush cex

- Ensuite il faut tester que nos fichiers contiennent bien la bonne configuration avec l'import:
    vendor/bin/drush cim (import complet) et 

