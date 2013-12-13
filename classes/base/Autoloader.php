<? 
    class Autoloader 
    {
        static public $classNames = array();
     
        public static function registerDirectory($dirName) 
        {
            $di = new DirectoryIterator($dirName);

            foreach ($di as $file)
            {
                if ($file -> isDir() && !$file -> isLink() && !$file -> isDot()) 
                {
                    self::registerDirectory($file->getPathname());
                } 
                elseif (substr($file -> getFilename(), -4) === '.php') 
                {
                    $className = substr($file -> getFilename(), 0, -4);
                    Autoloader::registerClass($className, $file -> getPathname());
                }
            }
        }
     
        public static function turnOn()
        {
            spl_autoload_register(array('Autoloader', 'loadClass'));    
        }

        public static function registerClass($className, $fileName) 
        {
            Autoloader::$classNames[$className] = $fileName;
        }
     
        public static function loadClass($className) 
        {
            if (isset(Autoloader::$classNames[$className])) 
            {
                require_once(Autoloader::$classNames[$className]);
            }
         }
     
    }
