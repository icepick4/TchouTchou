# SAE-SNCF
![MKT](https://img.shields.io/badge/license-copyleft-red.svg)
![MKT](https://img.shields.io/badge/version-v1.0.0-blue.svg)
![MKT](https://img.shields.io/badge/languages-PHP_JS_HTML_CSS-orange.svg)
![MKT](https://img.shields.io/badge/platform-Web-1ightgrey.svg)

<img src="assets/images/fav.png"><br>
Connue pour posséder le second plus grand chemin de fer en Europe, la France a pour moyen de transport prédominant sur son territoire le train. Disposant de 2 734 km de ligne à grande vitesse qui transporte chaque année se sont plus de 1 milliards de passagers qui transitent sur ce réseau. Pour rendre ce système fonctionnel il a donc fallu faire appel à des outils de gestion tant pour les achats des clients que pour les opérations techniques.
Afin de moderniser ses services, la SNCF lance en 2021 son application de réservation : SNCF Connect. Cette dernière vient s’implanter aux côtés d’autres applications de réservation comme Trainline ou Tictactrip.
Étant nous-mêmes utilisateurs de ces applications nous avons pu constater leurs défauts, leurs qualités mais également les améliorations que nous aurions aimé y apporter. Au vu de ce constat, nous avons donc cherché à proposer une solution technique à ce postulat.

# Objectif
L'objet de ce projet est de réaliser un site de réservation de billets de train avec des options pour consulter le trafic. Le projet est constitué d’un site internet avec une version PC et mobile pour les clients mais aussi d’une partie pour l’entreprise afin de gérer le trafic.

# Périmètre
Ce projet est réalisé par un groupe de 5 personnes d’un niveau équivalent en 2ème année du BUT informatique. Le projet n'utilisera pas de framework, ni de PWA. Le développement du projet se fait en dehors des heures de cours avec deux heures toutes les deux semaines de réunion avec notre tuteur. Le projet se déroule sur 4 mois et se termine par une soutenance de 40 minutes.
# GUIDE

Pour facilement avoir accès à toutes les branches,
après avoir cloner le repo :
 ```git worktree add ../<nom dossier> <nom branche>  ```

pour plus, d'info <a href="https://morgan.cugerone.com/blog/how-to-use-git-worktree-and-in-a-clean-way/">ici</a>


Pour le serveur il est conseillé d'utiliser Filezilla ou WinSCP en synchronisant son répertoire de travail et le dossier public_html de l'univ
# Base de données

Les trajets disponibles au tier 1 sont disponible <a href="https://forge.univ-lyon1.fr/p2103642/sae-sncf/-/raw/main/bdd/overview.pdf?inline=true" target="_blank">ici</a>
# FIGMA

<a href="https://www.figma.com/file/JoDxjyH653MXO4MKjn987D/SNCF?node-id=10%3A10">lien</a>

# SNCF DATA
<a href="https://ressources.data.sncf.com/explore/dataset/referentiel-gares-voyageurs/table/?disjunctive.gare_ug_libelle&sort=gare_alias_libelle_noncontraint">Gares</a>
<a href="https://ressources.data.sncf.com/explore/dataset/liste-des-quais/table/">Quais</a>


# DOCKER

Il faut évidemment avoir docker installer

L’objectif de docker est de crée un serveur php en local,
ce qui permet de dev en local sans passer par le serveur de l’iut.

 
Il faut commencer par récupérer l”os”:

```docker pull kmcgill88/php-oracle```

Pour lancer le serveur:

déplacez vous dans le dossier que vous voulez faire héberger puis ,<br>

```docker run -it  -p 80:80 --mount type=bind,source=$(pwd),target=/var/www/html  --name=web kmcgill88/php-oracle    ```
pour construire et lancer le serveur la permière fois

``` docker stop web```
pour l'arreter

``` docker start web```
pour le demarrer



# ORACLE
 voici les informations de connections vers notre serveur Oracle

 nom utilisateur `Tchou` <br>
 mdp `Tchoutchou69` <br><br>
 nom hôte `tchoutchou.ovh` <br>
 port `5521` <br>
 SID `xe` <br>

# CONNEXION SERVEUR DISTANT
```ssh vo269ma@tchoutchou.ovh -p 226```

