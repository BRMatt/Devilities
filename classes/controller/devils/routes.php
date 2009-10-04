<?php defined('SYSPATH') OR die('No Direct Script Access');


Class Controller_Devils_Routes extends Controller_Devils_Main
{
	function action_index()
	{
		// TODO: Allow users to "generate" code for routes
		$this->request->redirect($this->request->uri(array('action' => 'check')));
	}
	
	function action_check()
	{
		$all_routes = Route::all();
		$errors = array();
		$routes	= array();
		$results= array();
		
		$validation = Validate::factory($_POST)
						->filter('tests', 'trim')
						->rule('route_id', 'is_array')
						->rule('route_id', 'count')
						->rule('tests', 'not_empty');
		
		$submitted 	= $validation->check();
		$data		= $validation->as_array();
		
		if($submitted)
		{
			$data['tests'] 	= str_replace("\n\r", "\n", $data['tests']);
			$tests  		= explode("\n", $data['tests']);
			
			for($test = 0, $test_count = count($tests); $test < $test_count; ++$test)
			{
				$tests[$test] = trim(trim($tests[$test], '/'));
			}
			
			foreach((array) $data['route_id'] as $route_id)
			{
				$route = NULL;
				
				if($route_id === '::CREATE::')
				{
					// Create a route on the fly
					$route_id 	= 'KohanaRocksMySocks';
					
					$route 		= new Route($route_id, $data['route_uri']);
				}
				else
				{
					$route = Route::get($route_id);
				}
				
				$route_id = $route_id . ' - <em>'.htmlspecialchars($route->uri).'</em>';
				$results[$route_id] = array();
				
				foreach($tests as $test)
				{
					$matches  = $route->matches($test);
					
					// Make the test display as /
					if(empty($test))
						$test = '/';
					
					// Store the result and the parsed parameters
					$results[$route_id][$test] = array(
													'matched' 	=> $matches !== FALSE, 
													'params'	=> $matches !== FALSE ? $matches : array()
												);
				}
			}
		}
		
		$this->template->title 	= 'Check your Routes';
		$this->template->body 	= new View('devils/routes/check');
		$this->template->body->data				= $data;
		$this->template->body->defined_routes 	= $all_routes;
		$this->template->body->errors 			= $validation->errors();		
		$this->template->body->results			= $results;
	}
}