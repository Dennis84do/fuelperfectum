<?php echo '<?php' ?>

class Controller_<?php echo $controller_name; ?> extends \Controller_Base_Public
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

<?php foreach ($actions as $action): ?>
	public function action_<?php echo $action['name']; ?>(<?php echo $action['params']; ?>)
	{
<?php echo $action['code'].PHP_EOL; ?>
	}

<?php endforeach; ?>

}