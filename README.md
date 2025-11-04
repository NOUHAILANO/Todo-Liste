

## 🗂️ 1. Page de couverture

**Titre du projet :** Application To-Do List en PHP et MySQL  
**Nom :** Nouhaila  
**Année scolaire :** 2025–2026

---

## 📘 2. Introduction

Ce projet a pour objectif de concevoir une application web simple et intuitive permettant à un utilisateur de gérer ses tâches quotidiennes. L’application offre une interface conviviale pour ajouter, modifier, supprimer et suivre l’état d’avancement des tâches. Elle est conçue pour être responsive et accessible sur tous types d’appareils.

---

## 🛠️ 3. Technologies utilisées

| Technologie | Rôle |
|------------|------|
| **PHP** | Traitement côté serveur, logique métier |
| **MySQL** | Stockage des données (tâches) |
| **HTML** | Structure de la page |
| **CSS** | Mise en forme et design |
| **Bootstrap** | Design responsive et composants UI |

---

## ✅ 4. Description détaillée des fonctionnalités

- **Ajouter une tâche :**  
  L’utilisateur peut saisir une nouvelle tâche via un champ de texte et l’ajouter à la liste.

- **Marquer comme faite / non faite :**  
  Chaque tâche peut être marquée comme accomplie ou non accomplie via un bouton ou une icône.

- **Supprimer une tâche :**  
  Une option permet de supprimer définitivement une tâche de la base de données.

- **Interface responsive :**  
  L’interface s’adapte automatiquement aux écrans de différentes tailles (ordinateur, tablette, mobile).

---

## 🧱 5. Structure du projet

```
/todo-app/
│
├── index.php
├── db.php
├── add.php
├── update.php
├── delete.php
├── assets/
│   ├── css/
│   │   └── style.css
│   └── js/
│       └── script.js
└── screenshots/
    └── interface.jpeg
```

---

## 🗄️ 6. Base de données

La base de données contient une table nommée `todo` avec les champs suivants :

| Champ        | Type         | Description                       |
|--------------|--------------|-----------------------------------|
| `id`         | INT (PK)     | Identifiant unique de la tâche    |
| `title`      | VARCHAR(255) | Titre ou description de la tâche  |
| `done`       | BOOLEAN      | État de la tâche (faite ou non)   |
| `created_at` | DATETIME     | Date de création de la tâche      |

---

## 🧩 7. Explication du code principal

- **Connexion à la base de données (`db.php`) :**
  ```php
  $conn = new mysqli('localhost', 'root', '', 'todo_db');
  ```

- **Insertion d’une tâche (`add.php`) :**
  ```php
  $title = $_POST['title'];
  $conn->query("INSERT INTO todo (title, done, created_at) VALUES ('$title', 0, NOW())");
  ```

- **Mise à jour de l’état (`update.php`) :**
  ```php
  $id = $_GET['id'];
  $conn->query("UPDATE todo SET done = NOT done WHERE id = $id");
  ```

- **Suppression d’une tâche (`delete.php`) :**
  ```php
  $id = $_GET['id'];
  $conn->query("DELETE FROM todo WHERE id = $id");
  ```

---

## 🖼️ 8. Interface (Captures d’écran)

### 📌 Page d’accueil et exemple de tâches

Voici une capture illustrant l’interface principale de l’application, avec des tâches marquées comme faites et non faites :

![Interface principale](Image insérée ci-dessus)

---

## 🧪 9. Tests réalisés et résultats

| Test | Résultat attendu | Résultat obtenu | Statut |
|------|------------------|------------------|--------|
| Ajout d’une tâche | Tâche visible dans la liste | ✅ | Réussi |
| Marquer comme faite | Tâche affichée comme complétée | ✅ | Réussi |
| Suppression | Tâche supprimée de la liste | ✅ | Réussi |
| Responsive sur mobile | Affichage adapté | ✅ | Réussi |

---

## 🚀 10. Améliorations futures possibles

- Ajout d’un système d’authentification pour gérer plusieurs utilisateurs
- Intégration d’un calendrier ou d’une date d’échéance
- Fonction de tri et de filtrage des tâches
- Ajout de notifications ou rappels

---

## 🎓 11. Conclusion académique

Ce projet m’a permis de mettre en pratique mes compétences en développement web, en particulier l’interaction entre PHP et MySQL. Il m’a également sensibilisée à l’importance de l’ergonomie et de la responsivité dans la conception d’interfaces utilisateur. L’application est fonctionnelle, évolutive, et constitue une base solide pour des projets plus complexes.

---

