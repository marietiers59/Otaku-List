# OtakuList — Groupe B4

Application Laravel de consultation et de gestion d'animes et de mangas, réalisée dans le cadre des ressources R3.01 et R3.03 du BUT Informatique (IUT de Lens).

**Groupe B4** : Ikram Alouli, Thibault Breguet, Aurora Thellier, Marie Tiers.

## Installation

```bash
git clone https://gitlab.univ-artois.fr/marie_tiers/projet-otaku-list_groupe-b4_r3.01-03.git
cd projet-otaku-list_groupe-b4_r3.01-03
composer install
npm install
cp .env.example .env
php artisan key:generate
touch database/database.sqlite   # base SQLite par défaut
php artisan migrate:fresh --seed
composer run dev
```

### Comptes de test (mot de passe : `password`)

| Rôle | E-mail |
| --- | --- |
| Utilisateur | test@example.com |
| Contributeur | contributeur@example.com |
| Administrateur | admin@example.com |

## Jalons

| Jalon | Tag | État |
| --- | --- | --- |
| 1. Fondations (base) | [jalon-1](https://gitlab.univ-artois.fr/marie_tiers/projet-otaku-list_groupe-b4_r3.01-03/-/tags/jalon-1) | Terminé |
| 2. Authentification | [jalon-2](https://gitlab.univ-artois.fr/marie_tiers/projet-otaku-list_groupe-b4_r3.01-03/-/tags/jalon-2) | Fonctionnel, partie secondaire non faite |
| 3. CRUD et contrôle d'accès | [jalon-3](https://gitlab.univ-artois.fr/marie_tiers/projet-otaku-list_groupe-b4_r3.01-03/-/tags/jalon-3) | Terminé (gestion des utilisateurs : liste seulement) |
| 4. Studios, épisodes, médias | — | Non réalisé |
| 5. Genres, avis, lectures | — | Non réalisé |

## Qui a fait quoi

| Membre | Tâches réalisées | Tickets réalisés | Relectures assignées |
| --- | --- | --- | --- |
| Marie Tiers | Création du dépôt, découpage en tickets, développement des jalons 1 à 3 | #2 à #8, #10 à #13, #15, #19, #20, #23 à #30, #50 | — |
| Thibault Breguet | — | — | #4, #6, #7, #12, #20, #26, #29, #50 |
| Ikram Alouli | — | — | #5, #8, #10, #13, #19, #23, #27, #30 |
| Aurora Thellier | Ajout du fichier de consignes | — | #2, #3, #11, #15, #24, #25, #28 |

## Retour d'expérience

- **Outils** : GitLab (tickets, une branche `issue-N` par ticket, merge requests vers `dev`, fusion de `dev` dans `main` en fin de jalon), PhpStorm, `composer run dev` (serveur et Vite en parallèle). Un assistant d'IA a servi de guide pour comprendre les notions et structurer le travail. Chaque ticket a été testé et compris avant d'être fusionné.
- **Objectifs atteints** : les jalons 1 à 3 tournent. Le rendu ayant été fixé au 1er novembre, et le travail ayant reposé sur une seule personne, nous avons choisi de livrer trois jalons maîtrisés plutôt que cinq jalons fragiles.

## Notes d'intention

### Jalon 1 : Fondations
**Choix techniques.** Layout Blade sous forme de composant (`x-layouts.app`) et Tailwind compilé par Vite. Pages statiques en `Route::view`. Modèle `Oeuvre` avec migration, fabrique et seeder : celui-ci lit un fichier JSON s'il existe, sinon il génère 20 œuvres. La liste utilise des composants réutilisables (`oeuvre-grid`, `oeuvre-card`). Le filtre passe par un formulaire en GET, pour que l'URL soit partageable, et par un *scope* local `filtre()` dans le modèle, pour que le contrôleur reste lisible. Le dernier filtre est mémorisé 30 jours dans un cookie chiffré par Laravel, et effacé par le bouton « Réinitialiser ».
**Difficultés.** Mise en place du dépôt (commande lancée dans le mauvais dossier, push refusé à cause d'un commit concurrent). Sur une page en GET, `validate()` peut boucler en redirigeant vers la même page : les valeurs du filtre sont donc nettoyées plutôt que validées.
**Recul critique.** Le filtre se limite au statut et à l'année, et la liste n'a pas de pagination.

### Jalon 2 : Authentification
**Choix techniques.** Alpine.js et FontAwesome. Un composant d'alerte unique (`x-partials.alert`) sert aux erreurs de validation des deux layouts et aux messages flash. Fortify gère l'inscription et la connexion avec nos propres vues Blade. Le menu s'adapte grâce à `@auth` et `@guest`. La page profil permet de modifier son compte ; changer de mot de passe exige le mot de passe actuel. Une mise à jour de sécurité de `symfony/mime` a été appliquée (#50).
**Difficultés.** Comprendre ce que Fortify fournit (routes, logique) et ce qui reste à écrire (les vues).
**Recul critique.** Non réalisé, par choix de priorité : messages d'erreur en français (#14), inscription avec nom et prénom (#16), réinitialisation du mot de passe et e-mails (#17, #18, #21).

### Jalon 3 : CRUD des œuvres et contrôle d'accès
**Choix techniques.** `Route::resource` pour les sept actions. Règles de validation communes à la création et à la modification. Redirection après chaque envoi de formulaire, puis message flash (motif PRG). Le formulaire de modification réutilise le composant de champs, pré-rempli avec `old()`. La suppression passe par un composant `oeuvre-delete` réutilisable, avec une fenêtre de confirmation en Alpine. Les rôles sont stockés dans une colonne `role`, avec une seule valeur retenue, `admin`, car les énoncés se contredisaient ; `role` est volontairement exclu de `$fillable` pour qu'on ne puisse pas devenir administrateur via le formulaire d'inscription. Les droits reposent sur trois mécanismes : la policy `OeuvrePolicy` (ajout, modification et suppression réservés aux contributeurs et administrateurs, `@can` dans les vues), le middleware `auth` sur toutes les routes sauf la liste, et la gate `manage-users` qui réserve la liste des utilisateurs à l'administrateur.
**Difficultés.** `/oeuvres/create` était intercepté par la route `oeuvres/{oeuvre}`, à cause d'une double déclaration de `Route::resource` : corrigé en #25. Depuis Laravel 11, `$this->authorize()` impose d'ajouter le trait `AuthorizesRequests` au contrôleur de base.
**Recul critique.** La gestion des utilisateurs (#31, optionnelle) se limite à une liste, sans modification des rôles.

### Jalons 4 et 5 : non réalisés
Studios, épisodes, médias, genres, avis et lectures (#33 à #48) n'ont pas été développés. Nous avons préféré livrer trois jalons fonctionnels et compris. Les tickets restent ouverts et prêts, avec leurs dépendances, pour une suite du projet.
