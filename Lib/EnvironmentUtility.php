<?php

/**
 * Convenience methods to identify the environment currently 
 * running.
 * 
 */
class EnvUtil 
{
	private $envs = [
    	'production' => [
    		'urls' => [
    			// example: 'www.example.com'
                // example: 'api.example.com'
                // example: 'example.com'
    		],
    		'paths' => [
                // example: '/path/to/my/cakephp/app/'
    		    // example: '/var/www/html/app/'
                // example: '/var/www/public/app/'
    		]
        ],
    	'beta' => [
    		'urls' => [
    		    // example: 'beta.example.com'
    		],
    		'paths' => [
    		    // example: '/var/www/beta/app/'
    		]
    	],
    	'staging' => [
    		'urls' => [
    		    // example: 'stage.example.com'
    		],
    		'paths' => [
    		    // example: '/var/www/stage/app/'
    		]
    	],
    	'development' => [
    		'urls' => [
    		    // example: 'dev.example.com'
    		],
    		'paths' => [
    		    // example: '/var/www/dev/app/'
    		]
    	],
    	'local' => [
    		'urls' => [
    			// example: 'local.example.com'
    		],
    		'paths' => [
    		    // example: '/var/www/local/app/'
    		]
        ]
	];
	
	public function __construct()
	{
        if (!empty(Configure::read('EnvironmentUtility.environments'))) {
            $this->envs = Configure::read('EnvironmentUtility.environments');
        }
	}
    
    static public function which()
    {
        $envUtil = new EnvUtil();
        
        foreach ($envUtil->envs as $env => $data) {
            if (self::is($env)) {
                return $env;
            }
        }
        
        return false;
    }
    
	static public function is($env)
	{
		$envUtil = new EnvUtil();

		if (
			(isset($_SERVER['SERVER_NAME']) && 
			in_array(strtolower($_SERVER['SERVER_NAME']), $envUtil->envs[$env]['urls'])) ||
			in_array(APP, $envUtil->envs[$env]['paths'])
		) {
			return true;
		}
		
		return false;
	}
}