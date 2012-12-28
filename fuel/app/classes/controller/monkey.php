<?php
class Controller_Monkey extends \Controller_Base_Public
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
		$data['monkeys'] = Model_Monkey::find('all');
		$data['table_head'] = 'Monkeys Overview';
		$data['create_Object'] = 'Add Monkey';	
		$data['read_Object'] = 'Show Monkey';			
		$data['edit_Object'] = 'Update Monkey';			
		$data['delete_Object'] = 'Delete Monkey';	
		$this->theme->set_partial('content', 'monkey/index')->set($data);	
		#Debug::dump($data);
	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('monkey');
		$this->theme->set_partial('content', 'monkey/view')->set('monkey', Model_Monkey::find($id));	
	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Monkey::validate('create');
			
			if ($val->run())
			{
				$monkey = Model_Monkey::forge(array(
					'name' => Input::post('name'),
					'description' => Input::post('description'),
					'bio' => Input::post('bio'),
				));

				if ($monkey and $monkey->save())
				{
					Session::set_flash('success', 'Added monkey #'.$monkey->id.'.');
					Response::redirect('monkey');
				}

				else
				{				
					Session::set_flash('error', 'Could not save monkey.');
				}
			}
			else
			{					
				Session::set_flash('error', $val->error());
			}
		}
		$this->theme->set_partial('content', 'monkey/create');			
	}

	public function action_edit($id = null)
    {
        is_null($id) and Response::redirect('monkey');

        $monkey = Model_Monkey::find($id);

        $val = Model_Monkey::validate('edit');

        if ($val->run())
        {
            $monkey->name = Input::post('name');
            $monkey->description = Input::post('description');
            $monkey->bio = Input::post('bio');

            if ($monkey->save())
            {
                    Session::set_flash('success', 'Updated monkey #' . $id);
                    Response::redirect('monkey');
            }

            else
            {
                    Session::set_flash('error', 'Could not update monkey #' . $id);
            }
        }

        else
        {
            if (Input::method() == 'POST')
            {
                    $monkey->name = $val->validated('name');
                    $monkey->description = $val->validated('description');
                    $monkey->bio = $val->validated('bio');

                    Session::set_flash('error', $val->error());
            }
            $this->theme->get_template()->set_global('monkey', Model_Monkey::find($id));
        }
        $this->theme->set_partial('content', 'monkey/edit');
    }

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('monkey');

		if ($monkey = Model_Monkey::find($id))
		{
			$monkey->delete();

			Session::set_flash('success', 'Deleted monkey #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete monkey #'.$id);
		}
		Response::redirect('monkey');
	}

}