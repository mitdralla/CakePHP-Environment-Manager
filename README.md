# CakePHP Environment Manager

A configurable URL and working directory environment manager for CakePHP.

## Background

Easily set up management for multiple environments based on URL and working directory structures.

## Requirements

* PHP >= 5.3
* CakePHP 2.x

## Installation

_[Manual]_

* Download this: http://github.com/asugai/CakePHP-Environment-Manager/zipball/master
* Unzip that download.
* Copy the resulting folder to app/Plugin
* Rename the folder you just copied to EnvironmentManager

_[GIT Submodule]_

In your app directory type:

	git submodule add git://github.com/asugai/CakePHP-Environment-Manager.git Plugin/EnvironmentManager
	git submodule update --init

_[GIT Clone]_

In your app directory type

	git clone git://github.com/asugai/CakePHP-Environment-Manager.git Plugin/EnvironmentManager

### Enable plugin

Enable the plugin your `app/Config/bootstrap.php` file:

	CakePlugin::load('EnvironmentManager');

If you are already using `CakePlugin::loadAll();`, then this is not necessary.

## Usage

### Setup EnvironmentManager

Edit `/app/Config/bootstrap.php` file and add `EnvironmentUtility` environments:

    Configure::write('EnvironmentUtility.environments', [
    	'prod' => [
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
    	'stage' => [
    		'urls' => [
    		    // example: 'stage.example.com'
    		],
    		'paths' => [
    		    // example: '/var/www/stage/app/'
    		]
    	],
    	'dev' => [
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

Set up Environment events in your models.

Example - Send push Environment to a user:

    App::uses('EnvironmentUtility', 'EnvironmentManager.Lib');
    ...
    public function theEnv()
    {
        ... 
        $env = EnvironmentUtility::which(); // Get the current environment, returns false if unknown
        ...
        if (EnvironmentUtility::is('prod')) {
            // Run this code if in the production environment
        }
        
        if (EnvironmentUtility::is('dev')) {
            // Run this code if in the development environment
        }
    }

## Todo

* Comments!

## License

Copyright (c) 2013 Andre Sugai

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.