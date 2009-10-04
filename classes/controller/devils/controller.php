<?php defined('SYSPATH') OR die('No direct script access');

Class Controller_Devils_Controller extends Controller_Template
{
	public $template = 'devils/layout';
	
	public $auto_render = TRUE;
	
	function after()
	{
		$devils = array();
		$route = Route::get('devilities');
		
		foreach(Kohana::list_files('classes/controller/devils') as $devil => $_ignore)
		{
			// The name of our devil, horns removed
			$devil  = substr($devil, strrpos($devil, '/') +1, - strlen(EXT));
			
			// The wolf is not a devil!
			if($devil === 'controller' OR $devil === 'media')
				continue;
				
			$attributes = ($devil == $this->request->controller) ? array('class' => 'selected') : array();
			$params		= array('controller'=>$devil);
			
			$devils[] = Html::anchor($route->uri($params), ucfirst($devil), $attributes);
		}
		
		
		$this->template->set('devils', $devils);
		
		// Render the template
		return parent::after();
	}
}