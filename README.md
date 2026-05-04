# LocAuto - Plateforme PHP MVC

Ce projet a été réalisé dans le cadre d'une série de Travaux Pratiques (TP1, TP2, TP3) visant à concevoir une application web complète, dynamique et sécurisée en PHP pur (sans framework), utilisant une architecture MVC et une base de données PostgreSQL.

## 📝 Présentation du projet

### Pourquoi ce site ?
Ce site est un site qui permet de répertorier des offres de locations de voiture sur un site externe à celui-ci. Il est une plateforme centrale pour regrouper des offres de locations de plusieurs sites.

### Comment ?
L'application repose sur une architecture **MVC (Modèle-Vue-Contrôleur)** pour séparer la logique métier, les données et l'affichage. Le développement a suivi un cycle complet : modélisation UML, création de la base de données, implémentation des classes métier, et sécurisation finale.

---

## 🛠 Technologies utilisées

* **Langage :** PHP 8.x (POO stricte, sans Framework)
* **Base de données :** PostgreSQL
* **Front-end :** HTML5, CSS3 (Design Responsive)
* **Sécurité :** Tokens CSRF, Hachage de mots de passe, Transactions SQL, Sessions & Cookies sécurisés.

---

## 📂 Architecture du projet (Structure MVC)

Le projet respecte l'arborescence suivante imposée :

```text
/
├── class/          # Classes métier (avec héritage et méthodes magiques)
├── control/        # Contrôleurs (logique de traitement PHP)
├── interface/      # Interfaces correspondantes aux classes
├── model/          # Classes d'accès aux données (PDO, CRUD, Exceptions)
├── view/           # Vues (fichiers HTML/PHP pour l'affichage)
├── .htaccess       # Configuration de la réécriture d'URL
└── sitemap.xml     # Plan du site pour les moteurs de recherche
