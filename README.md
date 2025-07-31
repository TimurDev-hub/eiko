# File structure generator - Eiko;
File structure generator for PHP projects.
Simplifies the creation of standard directories and files for a quick start of development.
***
## Installation;
```bash
composer global require eiko/cli
```
***
## Initialize Project;
```bash
eiko init
```
### Creates a complete LeafPHP project structure:
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
├── composer.json
└── README.md
```
#### After generation, run command:
```bash
cd server
```
***
## Create Components;
```bash
eiko create <type> <name>
```
Types:
1. controller
2. middleware
3. model
4. route
***
### Examples:
```bash
eiko create controller Post
eiko create middleware Validation
eiko create model Product
eiko create route User
```
