# Fuzeria
Site web pour le serveur (v0.4.0)  
Basé sur [ExtazCMS](https://github.com/MrSaooty/ExtazCMS) v1.8 par MrSaooty
---
#### Fonctionnalités
* Page d'accueil
  *  Système de news
  *  Slider
  *  Affichage infos serveur
*  Système de support fonctionnel
   *  Création de tickets
   *  Classement par type de ticket/priorité
   *  Ouverture/fermeture des tickets
*  Système de votes
   *  Gestion du site de votes en back-office
   *  Affichage du top 5 sur la page de vote
   *  Affichage du classement complet des voteurs
*  Pages simples
   *  Règlement configurable en back-office
   *  Equipe du site configurable en back-office
   *  Page de contact des admins
*  Page de connexion/deconnexion/inscription unique
---
#### Installation
Le site utilise [CakePHP](http://cakephp.org/) et nécessite donc un environnement Apache pour fonctionner (LAMP, wamp). L'environnement NodeJS a été utilisé pendant le développement, il est donc recommandé de s'en servir pour les évolutions du site.  

__Installation rapide__:  
Lancez LAMP/wamp, puis dans un terminal avec git:
```
cd chemin/du/dossier/htdocs ou www
git clone https://github.com/chypriote/Fuzeria.git
```
Ouvrez ensuite votre navigateur et rendez vous sur *localhost/phpmyadmin*  
Créez une nouvelle table (par défaut 'fuzeria', sinon modifiez votre fichier config), puis importez y le fichier tables.sql.gz  
Rendez vous ensuite sur la page *localhost/Fuzeria*  
Si les liens ne fonctionnent pas, vérifier que mod_rewrite est activé dans votre php.ini

__Installation pour le développement__:  
Une fois les étapes précédentes effectuées:
```
cd Fuzeria/app/webroot
npm install && bower install
gulp
```
La tache gulp par défaut effectue un build complet du site, puis lance browser-sync et un watcher sur l'ensemble des fichiers du dossier app. Consultez le gulpfile pour plus d'informations ainsi que les autres taches.

---
#### Développements requis
* La majorité des templates a été refactorisée en HTML5, certaines pages restent à modifier:
    * Compte utilisateur
    * Achat de tokens/PO
    * Boutique
* La connexion à JSONAPI n'est pas encore fonctionnelle
* La boutique nécessitant JSONAPI, le design et les templates n'ont pas été modifiés
