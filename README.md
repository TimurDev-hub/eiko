# Leaf CLI Extension - Eiko;
A command-line tool for scaffolding LeafPHP projects with standardized structure and boilerplate code.

## Installation;
```bash
composer global require eiko/cli
```

## Initialize Project;
```bash
eiko init
```
Creates a complete LeafPHP project structure:
```txt
server/
├── logs/
├── public/
│   └── index.php
├── src/
│   ├── core/
│   │   ├── Config/
│   │   └── Routes/
│   └── modules/
│       ├── Controllers/
│       ├── Middleware/
│       ├── Models/
│       └── Utils/
├── .env
├── .env.example
├── .gitignore
├── .htaccess
├── composer.json
└── README.md
```
```bash
cd server
```

## Create Components;
```bash
eiko create <type> <name>
```
Types:
1. controller
2. model
3. route
```bash
eiko create controller User
eiko create model Product
eiko create route Auth
```
