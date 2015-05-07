<?php
use Doctrine\Common\ClassLoader,
    Doctrine\ORM\Configuration,
    Doctrine\ORM\EntityManager,
    Doctrine\Common\Cache\ArrayCache,
    Doctrine\DBAL\Logging\EchoSQLLogger,
    Doctrine\DBAL\Types\Type;

class Doctrine {

  public $em = null;

  public function __construct()
  {
    // load database configuration from CodeIgniter
    require_once APPPATH.'config/database.php';

    // Set up class loading. You could use different autoloaders, provided by your favorite framework,
    // if you want to.
    require_once APPPATH.'libraries/Doctrine/Common/ClassLoader.php';

    $doctrineClassLoader = new ClassLoader('Doctrine',  APPPATH.'libraries');
    $doctrineClassLoader->register();
    $entitiesClassLoader = new ClassLoader('models', rtrim(APPPATH, "/" ));
    $entitiesClassLoader->register();
    $proxiesClassLoader = new ClassLoader('Proxies', APPPATH.'models/proxies');
    $proxiesClassLoader->register();

    // Set up caches
    $config = new Configuration;
    $cache = new ArrayCache;
    $config->setMetadataCacheImpl($cache);
    $driverImpl = $config->newDefaultAnnotationDriver(array(APPPATH.'models'));
    $config->setMetadataDriverImpl($driverImpl);
    $config->setQueryCacheImpl($cache);

    $config->setQueryCacheImpl($cache);

    // Proxy configuration
    $config->setProxyDir(APPPATH.'/models/proxies');
    $config->setProxyNamespace('Proxies');

    // Set up logger
    // Comentado para evitar que fique desenhando na tela toda requisição SQL
    // $logger = new EchoSQLLogger;
    // $config->setSQLLogger($logger);

    $config->setAutoGenerateProxyClasses( TRUE );

    // Database connection information
    $connectionOptions = array(
        // alteração do driver de mysql para pgsql
        'driver' => 'pdo_pgsql',
        'user' =>     $db['default']['username'],
        'password' => $db['default']['password'],
        'host' =>     $db['default']['hostname'],
        'dbname' =>   $db['default']['database']
    );
    
    require_once APPPATH.'libraries/GeometryType.php';
    require_once APPPATH.'libraries/Geometry.php';
    require_once APPPATH.'libraries/extensions/TranslateLowerFunction.php';
    require_once APPPATH.'libraries/extensions/TranslateFunction.php';
    
    Type::addType('geometry', 'GeometryType');

    // Create EntityManager
    $this->em = EntityManager::create($connectionOptions, $config);
    $conn = $this->em->getConnection();
    $conn->getDatabasePlatform()->registerDoctrineTypeMapping('geometry', 'geometry');
    $conn->getDatabasePlatform()->registerDoctrineTypeMapping('_text', 'string');
    
    
    //comando para o mapeamento
    //--force  --from-database annotation ./entity
  }
}
