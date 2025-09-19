# Laravel MVC Architecture

## Request Flow Diagram

```
                                   ┌─────────────────────────┐
                                   │     User (Browser)      │
                                   └──────────┬──────────────┘
                                              │
                                              │ HTTP Request
                                              ▼
                                   ┌─────────────────────────┐
                                   │    Routes (web.php)     │
                                   └──────────┬──────────────┘
                                              │
                                              │ maps to
                                              ▼
                          ┌─────────────────────────────────────┐
                          │           Middleware                │
                          │        AuthMiddleware               │
                          └──────────────┬──────────────────────┘
                                         │
                                         │ passes through
                                         ▼
                          ┌─────────────────────────────────────┐
                          │          Controller                 │
                          │      QuestionController             │
                          └──────────────┬──────────────────────┘
                                         │
                                         │ uses
                                         ▼
                     ┌─────────────────────────────────────────────┐
                     │               Model                         │
                     │            Question.php                     │
                     └──────────────┬──────────────────────────────┘
                                    │
                                    │ queries
                                    ▼
                     ┌─────────────────────────────────────────────┐
                     │             Database                        │
                     │         MySQL / PostgreSQL                  │
                     └──────────────┬──────────────────────────────┘
                                    │
                                    │ returns data
                                    ▼
                     ┌─────────────────────────────────────────────┐
                     │               Model                         │
                     │            Question.php                     │
                     └──────────────┬──────────────────────────────┘
                                    │
                                    │ returns data to
                                    ▼
                          ┌─────────────────────────────────────────┐
                          │          Controller                     │
                          │      QuestionController                 │
                          └──────────────┬──────────────────────────┘
                                         │
                                         │ passes data to
                                         ▼
                          ┌─────────────────────────────────────────┐
                          │            View (Blade)                 │
                          │         show.blade.php                  │
                          └──────────────┬──────────────────────────┘
                                         │
                                         │ returns HTML response
                                         ▼
                                   ┌─────────────────────────┐
                                   │     User (Browser)      │
                                   └─────────────────────────┘
```

## Architecture Components

### 1. Routes (web.php)
- Entry point for HTTP requests
- Maps URLs to controller actions
- Defines middleware groups and route parameters

### 2. Middleware
- Cross-cutting concerns (authentication, CORS, etc.)
- Filters requests before reaching controllers
- Can modify requests and responses

### 3. Controller
- Contains application business logic
- Orchestrates between Models and Views
- Handles user input and returns responses

### 4. Model
- Represents data structure and business rules
- Interacts with the database using Eloquent ORM
- Handles data validation and relationships

### 5. View (Blade Templates)
- Presentation layer
- Renders HTML responses
- Contains template logic and UI components

### 6. Database
- Data persistence layer
- MySQL, PostgreSQL, or other supported databases
- Managed through Laravel migrations and schema builder

## Request Lifecycle

1. **User Request**: Browser sends HTTP request to Laravel application
2. **Route Resolution**: Routes file maps the request to appropriate controller method
3. **Middleware Processing**: Request passes through registered middleware stack
4. **Controller Execution**: Controller processes the request and business logic
5. **Model Interaction**: Controller uses models to interact with database
6. **Data Retrieval**: Model queries database and returns data
7. **View Rendering**: Controller passes data to Blade template for rendering
8. **Response**: Rendered HTML is sent back to user's browser
