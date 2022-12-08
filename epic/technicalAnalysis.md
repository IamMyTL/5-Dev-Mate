# LIER LA PLATEFORME A UNE BASE DE DONNEES #

Pour ce faire, nous utiliserons dans le cadre de ce projet une base de données MySQL. En effet, tous les membres du groupe sont familiarisés avec les requêtes MySQL et il est multiplateforme, sachant que l'un des membres du groupe dispose d'un Mac et que tous parmi nous dispose dores et déjà d'un WampServer configuré et opérationnel pour héberger des bases de données MySQL, cela nous fait donc trois bonnes raisons de partir sur cette solution. Les quelques inconvénients de MySQL ne nous importent pas pour un projet de cette ampleur. Voici d'ailleurs le schéma de notre base de données.

<img src="https://cdn.discordapp.com/attachments/761675551005605908/1049771316074524763/image.png"
     alt="Markdown Monster icon"/>
<br>

# DISPOSER D'UNE GESTION D'UTILISATEURS, ET DONC UN SYSTEME D'INSCRIPTION ET DE CONNEXION

Une fois l'application liée à notre base de données, l'utilisation de Laravel nous permet facilement d'intégrer un système d'authentification sécurisé et opérationnel. Les mots de passes sont cryptés, le reset de mot de passe et autres features relatives à l'authentification sont facilement implémentables.

# METTRE AU POINT UN SYSTEME DE MATCHMAKING PERMETTANT DE COMPARER LES COMPETENCES PROPOSEES ET RECHERCHEES

Déjà, et même si notre schéma DB le montre, il est important de préciser que nous aurons besoin de tables intermédiaires pour déterminer les compétences proposées par les candidats et les recruteurs. Nous avons ici une relation many to many (un utilisateur/une annonce peut contenir plusieurs compétences de la table skills, et une compétence peut être détenue par plusieurs candidats et conrenue dans plusieurs annonces).

Pour mettre en place ce système de matchmaking, nous devrons porter nos requêtes SQL sur les tables users et ads. On peut très bien imaginer récupérer les informations de l'utilisateur connecté, et effectuer une requête SQL récupérant les annonces disposant uniquement des skills de l'utilisateur authentifié. De là, on peut récupérer via une seconde requête, les compétences précises ayant matché entre les deux tables et ce, même si les deux passent par une table intermédiaire. Il nous suffira en effet de déterminer une relation belongsToMany, ce qui nous permettra d'accéder facilement aux compétences détenues par chaque candidat et recherchées dans chaque annonce.

Et cerise sur le gâteau: le framework Laravel dispose de méthodes effectuant les requêtes SQL dont nous aurons besoin et que nous avons détaillées ci-dessus.

# AVOIR UNE INTERFACE ADMINISTRATEUR POUR PERMETTRE LA GESTION DES DONNEES DE LA PLATEFORME




- Lier la plateforme à une base de données,
- Disposer d'une gestion d'utilisateurs, et donc un système d'inscription et de connexion afin de pouvoir spécifier le rôle et les compétences proposées/recherchées,
- Mettre au point un système de matchmaking permettant de comparer les compétences proposées et recherchées,
- Avoir une interface administrateur pour permettre la gestion des données de la plateforme,
- Proposer une interface modulable en fonction du périphérique utilisé,
- Proposer une gestion des annonces pour les recruteurs.