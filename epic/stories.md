# INTERFACE ADMINISTRATION

## Un Administateur souhaite

### Donnez/retirez le rôle d'Administrateur à un utilisateur
Cette fonctionnalité permettra d’ajouter ou de retirer d’autres administrateurs au site via une case à cocher dans chaque profil d’utilisateur. Cette case n’est visible que quand on est administrateur.

### Modifier/supprimer du contenu
Un Administrateur aura la possibilité de modifier ou de supprimer du contenu publié par un utilisateur sur la plateforme.

### Modifier/supprimer un utilisateur
Un Administrateur aura la possibilité de modifier ou de supprimer un utilisateur de la plateforme.
<br>
<br>
<br>

# INTERFACE UTILISATEUR

## Un utilisateur, quel que soit son rôle, souhaite


### S'inscrire
En cliquant sur "Inscription" l'utilisateur est redirigé vers un formulaire comportant tous les champs nécessaire à la création d’un profil sur le site:
- Mail: il s’agit de l’adresse mail de l’utilisateur souhaitant s’inscrire sur la plateforme ;
- Rôle: l’utilisateur devra déterminer s’il s’inscrit sur la plateforme en tant que Candidat (développeur possédant des compétences qu’il souhaite mettre à disposition d’un projet) ou en tant que Recruteur (employeur souhaitant trouver un effectif compétent pour la réalisation d’un projet informatique) ;
- Nom: nom de famille de l’utilisateur ;
- Prénom: prénom de l’utilisateur ;
- Compétences (Candidat uniquement): l’utilisateur sera amené à déterminer les compétences qu’il maîtrise (langages de programmation, frameworks, CMS…) et qu’il est apte à mettre au service d’un projet. Pour ce faire, il devra cocher les différentes compétences maîtrisées ;
- Upload CV (facultatif, Candidat uniquement): il sera possible pour un utilisateur Candidat d’importer son CV directement sur la plateforme, afin qu’il puisse être téléchargé et consulté par un Recruteur qui le souhaiterait ;
- Image de profil (facultatif): il s’agit de l’image qui figurera en en-tête du profil d’un utilisateur, quel que soit son rôle.

Une fois le formulaire totalement rempli sur tous les champs étant un pré-requis, l’utilisateur sera renvoyé vers une page qui confirme la création de son compte.

### Se connecter
En cliquant sur “Connexion”, l’utilisateur est renvoyé vers une page de connexion sur laquelle il doit rentrer ses informations (adresse mail et mot de passe) afin de pouvoir se connecter à son compte et ainsi pouvoir interagir avec les annonces publiées et accéder à son espace personnel

### Modifier son compte
Via la page de son propre profil, un utilisateur peut modifier ses informations telles que l’adresse mail, le mot de passe ou le rôle (Candidat/Recruteur) en cliquant sur Modifier les informations.

### Supprimer son compte
Via la page de son propre profil, un utilisateur peut supprimer son compte de la plateforme en cliquant sur “Supprimer le compte”. De fait, l’utilisateur sera définitivement supprimé de la plateforme et il n’aura plus accès à son espace personnel.

### Disposer d'une page d'accueil explicative
En arrivant sur la plateforme, l’utilisateur sera amené automatiquement sur la page d’accueil. Sur cette page d’accueil, il y trouvera un résumé explicatif des services que propose la plateforme.

### Naviguer dans une interface simple et intuitive
Grâce à une interface ergonomique et simple d’utilisation, l’utilisateur pourra aisément naviguer entre les différentes pages et retrouver toutes les informations dont il a besoin.

### Naviguer sur n’importe quel navigateur (mobile compris)
La plateforme sera codée de telle manière à ce que l’utilisateur puisse y naviguer avec une fluidité et une ergonomie identique et ce, peu importe le navigateur ou le périphérique utilisé.



## Un membre Candidat souhaite :


### Contacter un Recruteur
Lorsqu’il verra une annonce susceptible de l’intéresser, un Candidat pourra alors prendre contact avec un Recruteur directement via la page de l’annonce publiée par ce dernier, grâce à un bouton “Contacter”.

### Accéder à la place de marché
Le Candidat pourra accéder à la place de marché afin d'afficher les annonces de recruteur, de la plus pertinente à la moins pertinente.


## Un membre Recruteur souhaite


### Gérer ses annonces
Le Recruteur pourra publier une annonce en expliquant en quelques lignes son projet, et en indiquant éventuellement le nom de l'entreprise au nom de laquelle il poste l'annonce ainsi que les différentes compétences techniques recherchées pour le projet. Il aura également la possibilité de modifier ces dernières, ou même de les supprimer.

### Contacter un Candidat
Lorsqu’il verra un profil susceptible de l’intéresser, un Recruteur pourra alors prendre contact avec un Candidat directement via son profil grâce à un bouton “Contacter”

### Accéder à la place de marché
Le Recruteur pourra accéder à la place de marché afin d'afficher les profils de candidats, du plus pertinent au moins pertinent
<br>
<br>
<br>

# ALGORITHME DE MISE EN RELATION

Notre algorithme de mise en relation portera d'une part, sur le profil des candidats inscrits et d'autre part, sur les annonces postées par les recruteurs. Il analysera les différentes capacités techniques (PHP, Laravel, UML...) afin d'afficher dans la place de marché les candidats/annonces susceptibles de l'intéresser. Pour ce faire, l'algorithme vérifiera les skills cochées par un candidat sur son profil, et celles cochées par un recruteur lorsqu'il poste une annonce. La place de marché affichera alors en premier lieu les profils/annonces contenant le plus de matches, jusqu'à ceux/celles en contenant le moins. S'il n'y a aucun match, l'annonce/le profil ne sera pas afficher.