<?php
$router = new Router([
	'group'	   => '', //Set by default
	'strategy' => Router::STRATEGY_NONE, // default value, does not make assumptions about children routes
	[
		'routes'  => ['index'], // results in route: /index
		'handler' => 'indexHandler'
	],
	[
		'group'    => 'posts',
		'strategy' => Router::STRATEGY_CRUD
		'handler'  => [
			'class'			 => 'Controllers\Posts',
			'methodPrefix'   => '', // is default, can be set to a string e.g.: action
			'methodSufix'    => '', // is default, can be set to a string e.g.: action
			'methodNameGlue' => '', // is default (no transformation applied to names), can be set to a string e.g.: camelCase
		], // or can be shorter as: 'handler' => 'Controllers\Posts'
		'routes' => [
			[ //Example of overriding a route, by default route is generated automatically
				'routes'  => ['', '(page: d+)' => ['page' => 1]],
				'handler' => 'index',
			],
			//Auto-generates:
			[
				'routes'  => ['create'],
				'handler' => 'create',
			],
			[
				'group'  => '(id: \d+)'
				'routes' => [
					[
						'routes'  => 'view',
						'handler' => 'view',
					],
					[
						'routes'  => 'update',
						'handler' => 'update',
					],
					[
						'routes'  => 'delete',
						'handler' => 'delete',
					],
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