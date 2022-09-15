# SAE-SNCF
<img src="src/ASSETS/fav.png">

# GUIDE

Pour facilement avoir accès à tout les branches,
après avoir cloner le repo :
 ```git worktree add ../<nom dossier> <nom branche>  ```

pour plus, d'info <a href="https://morgan.cugerone.com/blog/how-to-use-git-worktree-and-in-a-clean-way/">ici</a>


Pour le serveur il est conseillé d'utiliser Filezilla ou WinSCP en synchronisant son répertoire de travail et le dossier public_html de l'univ

# FIGMA

<a href="https://www.figma.com/file/JoDxjyH653MXO4MKjn987D/SNCF?node-id=10%3A10">lien</a>

# SNCF DATA
<a href="https://ressources.data.sncf.com/explore/dataset/referentiel-gares-voyageurs/table/?disjunctive.gare_ug_libelle&sort=gare_alias_libelle_noncontraint">Gares</a>
<a href="https://ressources.data.sncf.com/explore/dataset/liste-des-quais/table/">Quais</a>


# DOCKER

Il faut évidemment avoir docker installer

L’objectif de docker est de crée un serveur php en local,
ce qui permet de dev en local sans passer par le serveur de l’iut.

 
Il faut commencer par récupérer l”ios”:

```docker pull 2233466866/lnmp```

Pour lancer le serveur:

```docker run -it  -p 80:80  -p 443:443  -p 3306:3306  -p 9000:9000  --mount type=bind,source=<chemin vers le git> ,target=/www   --privileged=true  --name=lnmp 2233466866/lnmp```

<chemin vers le git> exemple : `/D/projet_internet/SAE-SNCF/sae-sncf`

Finalement pour arreter le serveur:

```docker stop lnmp```


# Première idée des requêtes nécessaires:

- Tableau d'arrivée des trains en gars
- Tableau de départ des trains en gars

- Liste des lignes

Liste des arrêts d’une ligne

Le temps théorique entre chaque arrêt

- Liste des quais par gars

Liste des quais disponible

*La mise en maintenance d’un quais*

- Liste des trains

Pour un train sa prochaine arrivé en gars

Pour un train son nombre de place restant
        
Pour un train son statut (arrêt/ marche)

- Crée un compte

- Se connecter

- liste de billets

# Idée base de donnée

|   |

| USER  |
|---|
| USER_ID  |
| USER_MAIL  |
| USER_PASS  |
| USER_LASTNAME  |
| USER_FIRSTNAME  |
| USER_CATEGORIE  |


| TICKET  |
|---|
| LINE_ID  |
| TRAIN_ID  |
| USER_ID  |
| DEPATURE_STATION  |
| ARRIVAL_STATION  |

| LINE  |
|---|
| LINE_ID  |
| START_STATION  |
| END_STATION  |

| LINE_STOP  |
|---|
| LINE_ID  |
| STATION_ID  |
| EDT  |

| STATION  |
|---|
| STATION_ID  |
| STATION_NAME  |
| STATION_ID  |
| TURN_AROUND_TIME  |

| PLATFORM  |
|---|
| PLATFROM_LETTER  |
| STATION_ID  |
| PLATFROM_STATUS  |
| PLATFROM_LENGHT  |

| TRAIN  |
|---|
| TRAIN_ID  |
| TRAIN_CAPACITY  |
| TRAIN_LENGHT  |
| TRAIN_STATUS  |
