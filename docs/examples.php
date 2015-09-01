<?php
$router = new Router([
	'group'	   => '', //Set by default
	'strategy' => Router::STRATEGY_NONE, // default value, does not make assumptions about children routes
	'routes'   => [
		[
			'routes'  => ['', 'index'], // results in route: /index
			'handler' => 'indexHandler',
			'method'  => Router::METHOD_GET, // default value
		],
		[
			'group'    => 'posts',
			'strategy' => Router::STRATEGY_CRUD, //STRATEGY_REST
			'handler'  => [
				'class'			 => 'Controllers\Posts',
				'methodPrefix'   => '', // is default, can be set to a string e.g.: action
				'methodSufix'    => '', // is default, can be set to a string e.g.: action
				'methodNameGlue' => '', // is default (no transformation applied to names), can be set to a string e.g.: camelCase
			], // or can be shorter as: 'handler' => 'Controllers\Posts'
			'routes' => [
				//Auto-generates:
				[
					'routes'  => ['', 'index'], //Means: /posts/ and /posts/index
					'handler' => 'index',
				],
				[
					'routes'  => ['create'], //Means: /posts/create
					'handler' => 'create',
				],
				[
					'group'  => '(id: \d+)'
					'routes' => [
						[
							'routes'  => ['', 'view'], //Means: /posts/1/view
							'handler' => 'view',
						],
						[
							'routes'  => ['update'],
							'handler' => 'update',
						],
						[
							'routes'  => ['delete'],
							'handler' => 'delete',
						],
					]
				]
			]
		]
	]
]);

$handlerInfo = $router->handleRoute($route);

$handlerInfo = [
	'class' => 'Controllers/Acme', //Instantiates the class or
	'callable' => 'acme_handler', //Anything that works with call_user_function()
	'params' => [
		'row' => 1, //param name => param value (get params from the url)
	]
];