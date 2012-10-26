<?php

class Controller_Api extends Controller_Rest
{
	public function action_editores($empresa)
	{		
		
		$editores = Model_User::find('all',
				array(
                'where' =>
                array(
                    array('group', '=', 50),
					array('padre', '=', 0),
                    array('empresa', 'like', $empresa)
                )
            ));
		
		$select_editores = array();
		
		foreach($editores as $e)
		{
			$select_editores[$e->id] = $e->username;
		}
		
		
		
		$this->response(array('select_editores'=>$select_editores,'empty' => null));		
	}	
}
