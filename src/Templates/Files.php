<?php declare(strict_types=1);
namespace Eiko\Cli\Templates;

enum Files: string
{
    /**
     * return 'index.php' template;
    */
    case index = <<<TXT
    <?php declare(strict_types=1);

    require_once __DIR__ . '/../vendor/autoload.php';

    final class App
    {
        private function __construct() {}
        private function __clone() {}

        public static function boot(): void {}
    }

    App::boot();

    TXT;

    /**
     * return '.env' and '.env.exampple' templates;
     */
    case env = <<<TXT
    # Database;
    DB_HOST=''
    DB_PORT=''
    DB_NAME=''
    DB_USER=''
    DB_PASS=''

    # JWT;
    JWT_KEY=''

    # Admin;
    USERNAME=''
    PASSWORD=''

    TXT;

    /**
     * return '.gitignore' template;
     */
    case gitignore = <<<TXT
    # Logs;
    *.log

    # Application enviroment;
    .env

    # PHP dependencies;
    vendor/

    TXT;

    /**
     * return 'composer.json' template;
     */
    case composer = <<<TXT
    {
        "name": "[app_name]/server",
        "description": "None",
        "type": "project",
        "license": "MIT",
        "authors": [
            {
                "name": "[your_name]",
                "email": "[your_email@gmail.com]",
                "homepage": "[https:\\//your_homepage.com/]",
                "role": "Developer"
            }
        ],
        "require": {
            "php": ">=8.2.0"
        },
        "autoload": {
            "psr-4": {
                "Core\\\\": "src/core/",
                "Modules\\\\": "src/modules/"
            }
        },
        "minimum-stability": "stable",
        "prefer-stable": true
    }

    TXT;
}
