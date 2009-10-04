<?php


Route::set('devilities', 'devils(/<controller>(/<action>)(/<id>))', array('id' => '.*'))
	->defaults(array(
		'directory'   => 'devils',
		'controller'  => 'main',
		'action'      => 'index',
	));