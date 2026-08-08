# Portfolio Core

Plugin WordPress personnalisé qui fournit la logique métier du portfolio utilisé par le thème `blog` disponible ici : https://github.com/karim-khfr/blog

Le plugin est volontairement indépendant du thème : il enregistre les contenus, taxonomies et champs métier, tandis que le thème reste responsable de leur présentation. Il fonctionne en lien avec SCF (Secure Custom Fields).

## Technologies

- WordPress
- PHP 8.x
- Gutenberg
- REST API WordPress
- SCF (Secure Custom Fields)
- Git / GitHub

## Fonctionnalités

### CPT Projet

Le plugin enregistre le Custom Post Type :

```text
project
```

Interface WordPress :

```text
Projet / Projets
```

URLs publiques :

```text
/portfolio/
/portfolio/nom-du-projet/
```

Fonctionnalités supportées : titre, éditeur Gutenberg, extrait, image mise en avant, révisions et REST API.

### Taxonomies

#### Type de projet

Identifiant interne : `project_type`.

Taxonomie hiérarchique, destinée à classer les projets par nature.

Exemples : Site web, Application, Expérimentation.

#### Technologies

Identifiant interne : `project_technology`.

Taxonomie non hiérarchique, destinée à associer plusieurs technologies à un projet.

Exemples : WordPress, PHP, CSS, JavaScript, Excel.

## Champs SCF

Le groupe **Informations du projet** est enregistré par code dans `inc/fields.php`.

| Champ | Nom interne | Type | Obligatoire |
|---|---|---|---|
| Année | `project_year` | Nombre | Non |
| Statut | `project_status` | Sélection | Non |
| Rôle | `project_role` | Texte | Non |
| Client / organisation | `project_client` | Texte | Non |
| URL du projet | `project_url` | URL | Non |
| URL du dépôt | `project_repository_url` | URL | Non |

Les champs URL restent facultatifs afin de prendre en charge les projets non publiés en ligne ou sans dépôt de code public.

## Structure

```text
portfolio-core/
├── inc/
│   ├── fields.php
│   ├── post-types.php
│   └── taxonomies.php
└── portfolio-core.php
```

### `portfolio-core.php`

Fichier principal du plugin. Il déclare le plugin, charge les modules et gère les hooks d'activation et de désactivation ainsi que le flush des règles de réécriture.

### `inc/post-types.php`

Enregistrement du CPT `project`.

### `inc/taxonomies.php`

Enregistrement de `project_type` et `project_technology`.

### `inc/fields.php`

Définition locale et versionnée des champs SCF.

## Réécriture des URLs

Le plugin reconstruit les règles de réécriture lors de son activation afin que les URLs du portfolio fonctionnent immédiatement.

À l'activation :

1. le CPT est enregistré ;
2. les taxonomies sont enregistrées ;
3. `flush_rewrite_rules()` est exécuté.

Un flush est également effectué à la désactivation. Le plugin ne déclenche pas de flush à chaque requête.

## Architecture

Le plugin gère la logique métier : type de contenu Projet, taxonomies, champs SCF et règles de réécriture.

Le thème `blog` gère la présentation : `archive-project.html`, `single-project.html`, grille des projets, affichage des métadonnées, responsive et styles.

Cette séparation permet de changer de thème sans perdre le modèle de données du portfolio.

## Développement

Workflow Git :

```text
main
└── feature/nom-de-la-fonctionnalite
```

Le socle fonctionnel du plugin est terminé et fusionné dans `main`.

Historique fonctionnel principal :

- initialisation de la structure ;
- ajout du CPT Projet et de ses taxonomies ;
- ajout des champs SCF ;
- gestion des règles de réécriture.

## Installation locale

Le plugin doit être placé dans :

```text
wp-content/plugins/portfolio-core/
```

Puis activé depuis **Extensions → Extensions installées → Portfolio Core**.

SCF doit être installé et activé pour afficher les champs personnalisés du projet.

## État actuel

Fonctionnalités validées :

- menu Projets dans l'administration ;
- création et édition de projets avec Gutenberg ;
- attribution d'un Type de projet ;
- attribution de Technologies ;
- champs SCF affichés dans l'éditeur ;
- champs facultatifs acceptés lorsqu'ils sont vides ;
- URL `/portfolio/nom-du-projet/` fonctionnelle ;
- règles de réécriture régénérées automatiquement après activation.

## Prochaine étape

Le développement se poursuit dans le thème `blog` avec la Phase 7 :

1. `archive-project.html` ;
2. `single-project.html` ;
3. grille et cartes Portfolio ;
4. affichage conditionnel des champs SCF ;
5. navigation entre projets ;
6. responsive.
