# [SAE-SNCF](http://tchoutchou.ovh)

![MKT](https://img.shields.io/badge/license-MIT_License-red.svg)
<img src="https://img.shields.io/badge/license-Creative%20Commons-red">
![MKT](https://img.shields.io/badge/version-v1.0.0-blue.svg)
![MKT](https://img.shields.io/badge/languages-PHP_JS_HTML_CSS-orange.svg)
![MKT](https://img.shields.io/badge/platform-Web-1ightgrey.svg)
![Website](https://img.shields.io/website?down_color=lightgrey&down_message=offline&up_color=blue&up_message=online&url=http%3A%2F%2Ftchoutchou.ovh)

<img src="web/assets/images/fav.png"><br>
Connue pour posséder le second plus grand chemin de fer en Europe, la France a pour moyen de transport prédominant sur son territoire le train. Disposant de 2 734 km de ligne à grande vitesse qui transporte chaque année se sont plus de 1 milliards de passagers qui transitent sur ce réseau. Pour rendre ce système fonctionnel il a donc fallu faire appel à des outils de gestion tant pour les achats des clients que pour les opérations techniques.
Afin de moderniser ses services, la SNCF lance en 2021 son application de réservation : SNCF Connect. Cette dernière vient s’implanter aux côtés d’autres applications de réservation comme Trainline ou Tictactrip.
Étant nous-mêmes utilisateurs de ces applications nous avons pu constater leurs défauts, leurs qualités mais également les améliorations que nous aurions aimé y apporter. Au vu de ce constat, nous avons donc cherché à proposer une solution technique à ce postulat.

# Objectif

L'objet de ce projet est de réaliser un site de réservation de billets de train avec des options pour consulter le trafic. Le projet est constitué d’un site internet avec une version PC et mobile pour les clients mais aussi d’une partie pour l’entreprise afin de gérer le trafic.

# Périmètre

Ce projet est réalisé par un groupe de 5 personnes d’un niveau équivalent en 2ème année du BUT informatique. Le projet n'utilisera pas de framework, ni de PWA. Le développement du projet se fait en dehors des heures de cours avec deux heures toutes les deux semaines de réunion avec notre tuteur. Le projet se déroule sur 4 mois et se termine par une soutenance de 40 minutes.

# Outils et technologies utilisés
Ce projet utilise volontairement aucun framework <br>
<img src="https://img.shields.io/badge/JavaScript-323330?style=for-the-badge&logo=javascript&logoColor=F7DF1E"/>
<img src="https://img.shields.io/badge/html5-%23E34F26.svg?style=for-the-badge&logo=html5&logoColor=white"/>
<img src="https://img.shields.io/badge/css3-%231572B6.svg?style=for-the-badge&logo=css3&logoColor=white"/>
<img src="https://img.shields.io/badge/PHP-%23800080?style=for-the-badge&logo=php&logoColor=white"/>
<img src="https://img.shields.io/badge/SQL-%23ff0000?style=for-the-badge&logo=oracle&logoColor=white"/>
<img src="https://img.shields.io/badge/Docker-%230db7ed?style=for-the-badge&logo=docker&logoColor=white"/>




# Contribuer au Projet

Tout d'abord choisissez entre soit fork ou clone le projet, pour commencer à développer sur le projet en local référez vous à la partie sur <a href="#docker">docker</a>. Une fois le serveur local mis en place, si vous constatez un bug n'hésitez pas a créer une issue, si vous développez une nouvelle fonctionnalité ou en améliorez une, faites une pull request. De plus pour repérer les bugs vous pouvez simplement visiter notre site <a href="http://tchoutchou.ovh">Tchoutchou</a>.

Pour update le server il suift de aller sur ce <a href="http://82.65.238.70:5569/">lien</a> et attendre que la page charge

Pour facilement avoir accès à toutes les branches,
après avoir cloner le repo :
`git worktree add ../<nom dossier> <nom branche>  `

pour plus d'infos cliquez <a href="https://morgan.cugerone.com/blog/how-to-use-git-worktree-and-in-a-clean-way/">ici</a>

# Base de données

Un graphe de la BDD est disponible ici.

Les trajets disponibles des différents tiers sont disponibles <a href="rapport.pdf" target="_blank">ici</a>


# Figma

Accès vers notre <a href="https://www.figma.com/file/JoDxjyH653MXO4MKjn987D/SNCF?node-id=10%3A10">figma</a>

Merci de garder un historique des modifications / étapes (avant de modifier une frame, veuillez la dupliquer)

# Docker

Il faut évidemment avoir docker installé.

</br><a href="https://docs.docker.com/engine/install/">Comment installer docker ?</a>


## Web

Il faut commencer par récupérer l”os”:

`docker pull kmcgill88/php-oracle`

Pour lancer le serveur:

:warning: Placez vous à la source du repo puis tapez cette commande,<br>

`docker run -it  -p 80:80 --mount type=bind,source=$(pwd)/web,target=/var/www/html  --name=web kmcgill88/php-oracle`
pour construire et lancer le serveur la permière fois

Le serveur se mettra directement à jour à chaque modification

`docker stop web`
pour l'arreter

`docker start web`
pour le demarrer

Une fois le docker construit et lancé, rendez-vous sur http://localhost/
Vous pouvez dès à présent faire vos modifications en local et développer !

## Oracle

1. Commencez par récupérer l'image: `docker pull gvenzl/oracle-xe`
2. Ensuite, lancez le container: </br>
`docker run -it -p 1521:1521 -e ORACLE_PASSWORD=<your password> -v oracle-volume:/opt/oracle/oradata --name=DBB gvenzl/oracle-xe`
3. Une fois le container lancé, vous pouvez vous connecter à l'utilisateur system en utilisant le mot de passe utilisé lors de la création du container. Nous vous recommandons fortement de créer un utilisateur dédié pour plus de sécurité. </br>De plus, nous avons utilisé un utilisateur nommé `Tchou` pour l'intégralité de notre site, certaines requête sql y font référence, pour éviter tout souci nous vous recommandons fortement d'utiliser le même nom d'utilisateur.
4. Construisez la base de données à partir du fichier <a href="db/Backup.sql">Backup.sql</a>
5. En cas de problème vous pouvez consulter directement le <a href="https://github.com/gvenzl/oci-oracle-xe">git du docker</a> pour plus d’information.


# Setup


1. Clonez le projet sur votre machine locale.
2. Pour accéder à la base de données, vous devez ajouter un fichier config_connection.php dans le répertoire /web/config.
3. Le contenu du fichier doit être comme suit:
```PHP
<?php

// Accès base de données
const BD_HOST = '<adresse_ip>';
const BD_DBNAME = '';
const BD_USER = '<nom_utilisateur>';
const BD_PWD = '<mot_de_passe>';
const BD_PORT = '<port_par_default:1521>'; 
const BD_SID = 'xe';
```

4. Remplacez <adresse_ip>, <nom_utilisateur>, et <mot_de_passe> avec les informations appropriées pour votre base de données.
5. Le port par défaut est 1521, et le SID est 'xe', mais vous pouvez le changer si nécessaire.

</br>
Remarque : Pour des raisons de sécurité, ce fichier est exclu par défaut. Vous devez donc ajouter le fichier config_connection.php et remplir les informations nécessaires pour accéder à la base de données.

# Auteur

<a href="https://github.com/icepick4/TchouTchou/graphs/contributors">
  <img src="https://contrib.rocks/image?repo=icepick4/TchouTchou" />
</a>
