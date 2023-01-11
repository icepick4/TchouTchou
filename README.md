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

Un fichier .sql est disponible pour pouvoir recrée la base de donnée en local [ :warning: à venir ]

# Figma

Accès vers notre <a href="https://www.figma.com/file/JoDxjyH653MXO4MKjn987D/SNCF?node-id=10%3A10">figma</a>

Merci de garder un historique des modifications / étapes (avant de modifier une frame, veuillez la dupliquer)

# Sncf Data

Voici des liens vers des datasets

<a href="https://ressources.data.sncf.com/explore/dataset/referentiel-gares-voyageurs/table/?disjunctive.gare_ug_libelle&sort=gare_alias_libelle_noncontraint">Gares</a>
<br>
<a href="https://ressources.data.sncf.com/explore/dataset/liste-des-quais/table/">Quais</a>

# Docker

Il faut évidemment avoir docker installé

## Web

Il faut commencer par récupérer l”os”:

`docker pull kmcgill88/php-oracle`

Pour lancer le serveur:

:warning: Placez vous à la source du repo puis tapez cette commande,<br>

`docker run -it  -p 80:80 --mount type=bind,source=$(pwd)/web,target=/var/www/html  --name=web kmcgill88/php-oracle`
pour construire et lancer le serveur la permière fois

Le serveur se mettra directement à jour à chaque modification

` docker stop web`
pour l'arreter

` docker start web`
pour le demarrer

Une fois le docker construit et lancé, rendez-vous sur http://localhost/
Vous pouvez dès à présent faire vos modifications en local et développer !

## Oracle

Il faut commencer par récupérer l'image:

`docker pull gvenzl/oracle-xe`

puis:

`docker run -it  -p 1521:1521 -e ORACLE_PASSWORD=<your password> -v oracle-volume:/opt/oracle/oradata --name=DBB kmcgill88/php-oracle`

dernière etape:
construire la BDD à partir du fichier <a href="db/Backup.sql">Backup.sql</a>

[:warning: à venir]
