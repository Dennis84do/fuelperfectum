        is_null($id) and Response::redirect('<?php echo $controller_name ?>');

        $<?php echo $singular_name; ?> = Model_<?php echo $model_name; ?>::find($id);

        $val = Model_<?php echo $model_name; ?>::validate('edit');

        if ($val->run())
        {
<?php foreach ($fields as $field): ?>
<?php if ($field['name'] != 'xml'): ?>    
			$<?php echo $singular_name; ?>-><?php echo $field['name']; ?> = Input::post('<?php echo $field['name']; ?>');
<?php endif; ?>
<?php endforeach; ?>

            if ($<?php echo $singular_name; ?>->save())
            {
                Session::set_flash('success', 'Updated <?php echo $singular_name; ?> #'.$id);
                Response::redirect('<?php echo $uri; ?>');
            }
            else
            {
                Session::set_flash('error', 'Could not update <?php echo $singular_name; ?> #' . $id);
            }
        }
        else
        {
            if (Input::method() == 'POST')
            {
	<?php foreach ($fields as $field): ?>
			$<?php echo $singular_name; ?>-><?php echo $field['name']; ?> = $val->validated('<?php echo $field['name']; ?>');
	<?php endforeach; ?>            
                Session::set_flash('error', $val->error());
            }
            $this->theme->get_template()->set_global('<?php echo $singular_name; ?>', Model_<?php echo $model_name; ?>::find($id));
        }
        $this->theme->set_partial('content', '<?php echo $view_path ?>/edit');	