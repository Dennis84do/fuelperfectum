<?php
/**
 * Part of Fuel Depot.
 *
 * @package    FuelDepot
 * @version    1.0
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2012 Fuel Development Team
 * @link       http://depot.fuelphp.com
 */

class Controller_Base_Template extends Controller_Hybrid
{
	/**
	* @var string global date format to use
	*/
	public $date_format = 'eu';

	/**
	* @var array navigation bar entries
	*/
	public $navbar = array();

	/**
	 * @param   none
	 * @throws  none
	 * @returns	void
	 */
	public function before()
	{
		if (\Input::is_ajax())
		{
			return parent::before();
		}

		// load the theme template
        $this->theme = \Theme::instance();	
        // set the page template
        $this->theme->set_template('templates/homepage');     

        // set the homepage navigation menu
        #$this->theme->set_partial('messagebar', 'templates/header'); //To Do later: umbauen in Partial 

        // set the breadcrumb parameters
        if (Uri::segment(2)) 
        {
        	$this->theme->set_partial('breadcrumb', 'templates/breadcrumb2')->set(array('linkhome' => Uri::base(false), 'linkcurr' => Uri::current(), 'namecurr' => ucfirst(Uri::segment(2)),));
        }
        else
        {
        	$this->theme->set_partial('breadcrumb', 'templates/breadcrumb1')->set('linkhome', Uri::base(false));
        }

        // set the messages 
        $this->theme->set_partial('messages', 'templates/messages');    

		// define the navigation
		$navitems = array(
			array('name' => 'Dashboard', 'link' => Uri::base(false).'homepage/dashboard', 'class' => '', 'icon' => 'icon-home icon-white'),
			array('name' => 'Animals', 'link' => Uri::base(false).'animal/index', 'class' => '', 'icon' => 'icon-leaf icon-white'),			
			array('name' => 'Monkeys', 'link' => Uri::base(false).'monkey/index', 'class' => '', 'icon' => 'icon-tint icon-white'),			
			array('name' => 'About', 'link' =>  Uri::base(false).'homepage/about', 'class' => '', 'icon' => 'icon-eye-open icon-white'),
		);
		if (\Auth::check())
		{
			$navitems[] = array('name' => 'Profile', 'link' =>  Uri::base(false).'users/profile', 'class' => '', 'icon' => '');
			$navitems[] = array('name' => 'Logout', 'link' =>  Uri::base(false).'users/logout', 'class' => '', 'icon' => '');

			// set the correct timezone for logged in users
			$profile = \Auth::get_profile_fields();

			isset($profile['timezone']) and \Date::display_timezone($profile['timezone']);
			isset($profile['dateformat']) and $this->date_format = $profile['dateformat'];
		}
		else
		{
			$navitems[] = array('name' => 'Login', 'link' =>  Uri::base(false).'users/login', 'class' => '', 'icon' => 'icon-lock icon-white');
		}
		// see if we need to highlight one
		$uri = '/'.\Request::active()->uri->get();
		foreach ($navitems as $navitem)
		{
			// highlight the current navigation item
			strpos($uri, $navitem['link']) === 0 and $navitem['class'] .= ' current';

			// and set the navbar item if not already set
			empty($this->navbar[$navitem['name']]) and $this->navbar[$navitem['name']] = $navitem;
		}

		// define the navbar partial and add the navbar data
		$this->theme->set_partial('navigation', 'templates/navigation')->set('navitems', $this->navbar);
	}

	/**
	 * After controller method has run, render the theme template
	 *
	 * @param  Response  $response
	 */
	public function after($response)
	{
		if ( ! \Input::is_ajax())
		{
	        // If no response object was returned by the action,
	        if (empty($response) or  ! $response instanceof Response)
	        {
	            // render the defined template
	            $response = \Response::forge(\Theme::instance()->render());
	        }
	        return parent::after($response);
		}
		return parent::after($response);
	}
}
