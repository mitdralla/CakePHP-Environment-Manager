<?php

/**
 * Convenience methods to identify the environment currently 
 * running.
 * 
 */
class EnvironmentUtility 
{
	private $envs = [];
	
	public function __construct()
	{
        if (Configure::check('EnvironmentUtility.environments')) {
            $this->envs = Configure::read('EnvironmentUtility.environments');
        }
	}
    
    static public function getEnvs()
    {
        $e = new EnvironmentUtility();
        return $e->envs;
    }
    
    static public function which()
    {
        $static = getenv('ENV');
        if (!empty($static)) {
            return $static;
        }
        
        foreach (static::getEnvs() as $env => $data) {
            if (static::is($env)) {
                return $env;
            }
        }
        
        return false;
    }
    
	static public function is($env)
	{
        $static = getenv('ENV');
        if (!empty($static)) {
            if ($env == $static) {
                return true;
            } else {
                return false;
            }
        }
        
        $envs = static::getEnvs();
        
        $url = (
            isset($envs[$env]) // if the environment exists 
            && isset($_SERVER['SERVER_NAME']) // server name exists (ex. it's not a cron call)
            && in_array(strtolower($_SERVER['SERVER_NAME']), $envs[$env]['urls'])
        );
        
        $path = (
            isset($envs[$env]) // if the environment exists 
            && in_array(APP, $envs[$env]['paths']) // if it's in the path
        );
        
        if ($url || $path) {
            return true;
        }
		
		return false;
	}
}
