 <?php
    require (__DIR__ . '/../config/config.php');
    class DatabaseClass
    {
        public $database;

        public function __construct()
        {
            $this->database = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        }
    }
    ?>