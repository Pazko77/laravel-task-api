# 🚀 Laravel Task API (Project Test)

Une API de gestion de tâches robuste et sécurisée développée avec **Laravel 11**, conçue pour être intégrée facilement à des outils d'automatisation comme **Make (Integromat)**.

## ✨ Fonctionnalités

* **Architecture RESTful** : Utilisation des verbes HTTP standards (GET, POST, PATCH).
* **Sécurité API** : Authentification via **Laravel Sanctum** avec des Bearer Tokens.
* **Idempotence** : Endpoints dédiés pour compléter/incompléter une tâche, garantissant la fiabilité des données lors des automatisations.
* **Persistance** : Base de données **SQLite** légère et portable.
* **Route Model Binding** : Injection automatique des modèles pour un code propre et sécurisé (gestion native des 404).

## 🛠️ Installation

1.  **Cloner le projet** :
    ```bash
    git clone [https://github.com/Pazko77/laravel-task-api.git](https://github.com/Pazko77/laravel-task-api.git)
    cd laravel-task-api
    ```

2.  **Installer les dépendances** :
    ```bash
    composer install
    ```

3.  **Configurer l'environnement** :
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

4.  **Initialiser la base de données** :
    ```bash
    touch database/database.sqlite
    php artisan migrate
    ```

5.  **Lancer le serveur** :
    ```bash
    php artisan serve
    ```

## 🔒 Sécurité & API

Les routes de modification sont protégées. Pour tester avec **Thunder Client** ou **Make** :
1. Générez un token via Tinker : `App\Models\User::first()->createToken('api')->plainTextToken`.
2. Ajoutez le Header : `Authorization: Bearer <votre_token>`.
3. Ajoutez le Header : `Accept: application/json`.

## 📌 Endpoints principaux

| Méthode | URL | Description | Accès |
| :--- | :--- | :--- | :--- |
| `GET` | `/api/tasks` | Liste toutes les tâches | Public |
| `POST` | `/api/tasks` | Créer une nouvelle tâche | Privé |
| `PATCH` | `/api/tasks/{id}/completed` | Marquer comme terminée | Privé |
| `PATCH` | `/api/tasks/{id}/incompleted` | Marquer comme à faire | Privé |

---
*Développé dans le cadre d'une préparation technique pour un stage.*
