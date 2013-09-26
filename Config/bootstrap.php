<?php

/**
 * Please copy the config below and place it on your /app/Config/bootstrap.php
 * Remember to fill in the fields!
 */

if (Configure::check('EnvironmentUtility.environments')) {
    Configure::write('EnvironmentUtility.environments', [
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
    ]);
}
    
?>