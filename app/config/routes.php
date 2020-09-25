<?php

return [
	//home
	'' => [
		'controller' => 'home',
		'action' => 'index',
	],
	'post/{id:\d+}' => [
		'controller' => 'home',
		'action' => 'post',
	],

	//admin
	'admin' => [
		'controller' => 'admin',
		'action' => 'login',
	],
	'admin/logout' => [
		'controller' => 'admin',
		'action' => 'logout',
	],
	'admin/add' => [
		'controller' => 'admin',
		'action' => 'add',
	],
	'admin/update/{id:\d+}' => [
		'controller' => 'admin',
		'action' => 'update',
	],
	'admin/delete/{id:\d+}' => [
		'controller' => 'admin',
		'action' => 'delete',
	],
	'admin/postslist' => [
		'controller' => 'admin',
		'action' => 'postslist',
	],	
];