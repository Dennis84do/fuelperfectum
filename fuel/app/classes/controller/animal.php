<?php
class Controller_Animal extends \Controller_Base_Public
{

	/**
	 * The application homepage
	 *
	 * @access  public
	 * @return  Response
	 */
	public function before()
	{
		// call the parent to run the setup
		parent::before();

        // load the theme template
        $this->theme = \Theme::instance();

		// if this is a request for the index action, switch to the homepage layout template
		\Request::active()->action == 'index' and \Theme::instance()->set_template('templates/homepage');
	}

	public function action_index()
	{
		$this->theme->set_partial('content', 'animal/index')->set('animals', Model_Animal::find('all'));
	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('Animal');

		$data['animal'] = Model_Animal::find_by_pk($id);

		$this->template->title = "Animal";
		$this->template->content = View::forge('animal/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Animal::validate('create');
			
			if ($val->run())
			{
				$animal = Model_Animal::forge(array(
					'name' => Input::post('name'),
					'age' => Input::post('age'),
				));

				if ($animal and $animal->save())
				{
					Session::set_flash('success', 'Added animal #'.$animal->id.'.');
					Response::redirect('animal');
				}
				else
				{
					Session::set_flash('error', 'Could not save animal.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}
		$this->theme->set_partial('content', 'animal/create');	
	}

	public function action_edit($id = null)
	{
        is_null($id) and Response::redirect('Animal');

        $animal = Model_Animal::find($id);

        $val = Model_Animal::validate('edit');

        if ($val->run())
        {
			$animal->name = Input::post('name');
			$animal->age = Input::post('age');

            if ($animal->save())
            {
                Session::set_flash('success', 'Updated animal #'.$id);
                Response::redirect('animal');
            }
            else
            {
                Session::set_flash('error', 'Could not update animal #' . $id);
            }
        }
        else
        {
            if (Input::method() == 'POST')
            {
				$animal->name = $val->validated('name');
				$animal->age = $val->validated('age');
	            
                Session::set_flash('error', $val->error());
            }
            $this->theme->get_template()->set_global('animal', Model_Animal::find($id));
        }
        $this->theme->set_partial('content', 'animal/edit');	
	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('animal');

		if ($animal = Model_Animal::find($id))
		{
			$animal->delete();

			Session::set_flash('success', 'Deleted animal #'.$id);
		}
		else
		{
			Session::set_flash('error', 'Could not delete animal #'.$id);
		}
		Response::redirect('animal');		

	}


}