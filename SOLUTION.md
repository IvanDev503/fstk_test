## Guía breve (puntos)

- Punto 1.1 - Validación  
  `POST /api/validate-user` revisa `name`, `email`, `age >= 18` y devuelve JSON. Código en `backend/app/Http/Controllers/ValidationController.php` y ruta en `backend/routes/api.php`.

- Punto 1.2 - Tabla de productos (React)  
  `ProductTable` muestra lista y total en `frontend/src/App.js`, estilos en `frontend/src/App.css`.

- Punto 1.3 - Tareas (CRUD)  
  - Crear: `POST /api/tasks` con `title`, `description?`, `status` `pendiente|completado`.  
  - Listar: `GET /api/tasks` con filtro opcional `?status=pendiente|completado`.  
  Modelo `backend/app/Models/Task.php`, migración `backend/database/migrations/2025_12_10_000000_create_tasks_table.php`, controlador `backend/app/Http/Controllers/TaskController.php`.

## Auth con JWT

- Punto 2.1 - Autenticación JWT  
  - Rutas: `POST /api/auth/register`, `POST /api/auth/login`, `POST /api/auth/logout`, `GET /api/auth/me`, `POST /api/auth/refresh`.  
  - Protegidas con `auth:api` en el grupo privado.  
  - Tokens generados con `tymon/jwt-auth`; refresco en `/api/auth/refresh`.

## Datos y relaciones

- Punto 3 - Modelo de datos (bonus)  
  - `projects` (id, name, description, owner_id?, timestamps)  
  - `tasks` (id, project_id FK, title, description, status pendiente|completado|en_progreso, due_date, timestamps)  
  - `users` (id, name, email, password, timestamps)  
  - `task_user` (task_id FK, user_id FK, role?)  
  Relaciones: proyecto tiene muchas tareas; cada tarea pertenece a un proyecto; tarea se asocia a muchos usuarios vía pivote; usuario a muchas tareas.

## Cómo correr

- Backend: `cd backend && php artisan migrate && php artisan serve`
- Frontend: `cd frontend && npm start`
