<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'PrincipalWriters',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.modules.user.models.*',
        'application.modules.user.components.*',
		'application.extensions.easyPaypal.*',
		'application.modules.user.*',
		'application.modules.accounting.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		/*'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'password',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),*/
		
		'Accounting'=>array(
			"params"=>array(
				 "uploadPath"=>dirname(__FILE__).DIRECTORY_SEPARATOR.'../accounting/upload/',
				 "uploadUrlPath"=>'/upload/', //relative Url dari direktori upload gambar
			 ),
		),
		'user'=>array(
            # encrypting method (php hash function)
            'hash' => 'md5',
 
            # send activation email
            'sendActivationMail' => false,
 
            # allow access for non-activated users
            'loginNotActiv' => true,
 
            # activate user on registration (only sendActivationMail = false)
            'activeAfterRegister' => true,
 
            # automatically login from registration
            'autoLogin' => true,
 
            # registration path
            'registrationUrl' => array('/user/registration'),
 
            # recovery password path
            'recoveryUrl' => array('/user/recovery'),
 
            # login form path
            'loginUrl' => array('/user/login'),
 
            # page after login
            'returnUrl' => array('/tblArticleOrder/order'),
 
            # page after logout
            'returnLogoutUrl' => array('/user/login'),
        ),
		
	),

	// application components
	'components'=>array(
		 'user'=>array(
            // enable cookie-based authentication
           // 'class' => 'WebUser',
            'allowAutoLogin'=>true,
            'loginUrl' => array('/user/login'),
        ),
		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
				'<view>'=>'site/page/view/<view>',
			),
			'showScriptName'=>false,
		),
		
		'db'=>array(
			//'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=writer',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
			'tablePrefix' => 'tbl_',
		),
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'support@principalwriters.com',
		'PAYPAL_API_USERNAME'=>'principalwriters68_api1.gmail.com',
   
        'PAYPAL_API_PASSWORD'=>'G6A9TP6W4APMHSDX',
   
        'PAYPAL_API_SIGNATURE'=>'AFcWxV21C7fd0v3bYYYRCpSSRl31Afj9jjnaCF03ws0L43zkVl4rSBKZ',
                            
        'PAYPAL_MODE'=>'live' ,  // sandbox/live  default=sandbox
							
		),
);