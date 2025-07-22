<?php declare(strict_types=1);
namespace Eiko\Cli\Templates;

final class Template
{
    private function __construct() {}
    private function __clone() {}

    public const indexPhp = <<<'TXT'
    <?php declare(strict_types=1);

    require_once __DIR__ . '/../vendor/autoload.php';

    use Leaf\App;
    //use Core\Routes\{Auth, Post, User};

    final class Core
    {
        private static ?App $app = null;

        private function __construct() {}
        private function __clone() {}

        public static function boot(): void
        {
            self::$app = new App();

            self::$app->cors();
            self::$app->get(pattern: '/', handler: function(): void {
                /** */
            });

            //Auth::defineRoutes(app: self::$app);
            //Post::defineRoutes(app: self::$app);
            //User::defineRoutes(app: self::$app);

            self::$app->run();
        }
    }

    Core::boot();

    TXT;

    public const env = <<<TXT
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

    public const gitignore = <<<TXT
    # Logs;
    *.log

    # Application enviroment;
    .env

    # PHP dependencies;
    vendor/

    TXT;

    public const htaccess = <<<TXT
    RewriteEngine On
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule ^ server/public/index.php [L]

    TXT;

    public const composerJson = <<<TXT
    {
        "name": "app/server",
        "description": "None",
        "type": "project",
        "require": {
            "php": ">=8.4.0",
            "leafs/leaf": "^4.2"
        },
        "license": "MIT",
        "autoload": {
            "psr-4": {
                "Core\\\\": "src/core/",
                "Modules\\\\": "src/modules/"
            }
        },
        "minimum-stability": "stable"
    }

    TXT;

    public const readmeMd = <<<TXT
    ## None;
    TXT;
}
