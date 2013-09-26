<?php

/**
 * Convenience methods to identify the environment currently 
 * running.
 * 
 */
class EnvUtil 
{
	private $envs = [];
	
	public function __construct()
	{
        if (Configure::check('EnvironmentUtility.environments')) {
            $this->envs = Configure::read('EnvironmentUtility.environments');
        }
	}
    
    static public function which()
    {
        $envUtil = new EnvUtil();
        
        foreach (self::envs as $env => $data) {
            if (self::is($env)) {
                return $env;
            }
        }
        
        return false;
    }
    
	static public function is($env)
	{
		$url = (
            isset(self::envs[$env] // if the environment exists 
            && isset($_SERVER['SERVER_NAME']) // server name exists (ex. it's not a cron call)
            && in_array(strtolower($_SERVER['SERVER_NAME']), self::envs[$env]['urls'])
        );
        
        $path = (
            isset(self::envs[$env] // if the environment exists 
            && in_array(APP, self::envs[$env]['paths']) // if it's in the path
        )

		if ($url || $path) {
			return true;
		}
		
		return false;
	}
}