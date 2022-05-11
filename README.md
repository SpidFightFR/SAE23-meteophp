# SAE23-PJ2
Bienvenue sur le projet  2 de la SAÉ 23 Mené par le groupe 4 (Jimmy, Chadi, Vincent).


Objectifs:
====================================================================

Créer une application web récupérant de façon récurrente la météo et la température des étudiants du groupe 4 et stocker les données récurrentes dans une base de données.

Documentation:
====================================================================
Le site web est divisé en plusieurs partie dans le but de pouvoir s'y retrouver dans le code. Dans cette partie nous allons vous expliquer le rôle des fichiers présents.

#### form.html
Form.html est la porte d'entrée vers notre site, il est constitué (pour l'instant) que d'une zone de texte, accueillant jusqu'à 10 caractères, dans laquelle on entrera le nom d'un étudiant pour obtenir le climat de son lieu de résidence.

#### form.php
Ce fichier est le principal fichier de notre site, c'est ici que l'on se connecte à la base de données des noms et ça sera ici qu'on exercera toutes les requêtes d'obtention du climat, pour les stoquer dans la base de données.

## Fichiers "Meta":
La catégorie "Meta" désigne les fichiers qui sont des dépendences du programme, elle peuvent contenir une variété d'informations comme des fonctions ou des variables. Sans ces fichiers, le programme ne marchera pas.

#### var.php
Ce fichier contient simplement toutes les variables dont nous avons besoin dans le programme; il est invoqué au début de la partie php du fichier principal, voir ligne 9. Son utilité première est de fluidifier la lecture du code, et de servir de "dictionnaire de variables".

### fonct.php
Ce fichier est un dictionnaire de toutes les fonctions que l'on utilisera. Il fait appel au fichier var.php au tout début de son éxécution pour récolter les variables requises (par exemple, la ville qui a une valeur pré-attribuée -avant modifications d'éxecution- pour éviter les problèmes d'avertissements).
Son but premier est de pouvoir invoquer une commande, située en son contenu, au lieu de la ré-écrire entièrement plusieurs fois dans le programme principal.
Ainsi, en plus de gagner en place et en lisibilité, si nous faisons une erreur dans la fonction, on peut modifier qu'une seule fois la fonction, et le reste sera automatiquement mis à jour.
