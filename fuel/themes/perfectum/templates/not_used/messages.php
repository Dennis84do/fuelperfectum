				<!-- Begin messages -->
				<?php if (Session::get_flash('error')): ?>
					<div class="alert alert-error">
						<button class="close" data-dismiss="alert" type="button">×</button>
						<strong>Error</strong>
						<?php echo implode('</p><p>', e((array) Session::get_flash('error'))); ?>
					</div>
				<?php endif; ?>

				<?php if (Session::get_flash('warning')): ?>
					<div class="alert alert-block">
						<button class="close" data-dismiss="alert" type="button">×</button>
						<strong>Warning</strong>
						<?php echo implode('</p><p>', e((array) Session::get_flash('warning'))); ?>
					</div>	
				<?php endif; ?>

				<?php if (Session::get_flash('success')): ?>
					<div class="alert alert-success">
						<button class="close" data-dismiss="alert" type="button">×</button>
						<strong>Success</strong>
						<?php echo implode('</p><p>', e((array) Session::get_flash('success'))); ?>
					</div>		
				<?php endif; ?>

				<?php if (Session::get_flash('info')): ?>
					<div class="alert alert-info">
						<button class="close" data-dismiss="alert" type="button">×</button>
						<strong>Info</strong>
						<?php echo implode('</p><p>', e((array) Session::get_flash('info'))); ?>
					</div>			
				<?php endif; ?>
				<!-- End of messages -->

 <!--start: JavaScript-->
  <!--<script type="text/javascript">
 
	 function message_welcome1(){
		var unique_id = $.gritter.add({
		// (string | mandatory) the heading of the notification
		title: 'Welcome on Perfectum Dashboard',
		// (string | mandatory) the text inside the notification
		text: 'I hope you like this template',
		// (string | optional) the image to display on the left
		image: '../img/avatar.jpg',
		// (bool | optional) if you want it to fade out on its own or just sit there
		sticky: false,
		// (int | optional) the time you want it to be alive for before fading out
		time: '',
		// (string | optional) the class name you want to apply to that specific message
		class_name: 'my-sticky-class'
	});
} 

	function message_welcome2(){
		var unique_id = $.gritter.add({
		// (string | mandatory) the heading of the notification
		title: 'Perfectum is Amazing Theme',
		// (string | mandatory) the text inside the notification
		text: 'Perfectum works on all devices, computers, tablets and smartphones. Perfectum has lots of great features. Try It!',
		// (string | optional) the image to display on the left
		image: '../img/avatar.jpg',
		// (bool | optional) if you want it to fade out on its own or just sit there
		sticky: false,
		// (int | optional) the time you want it to be alive for before fading out
		time: '',
		// (string | optional) the class name you want to apply to that specific message
		class_name: 'my-sticky-class'
	});
} 

	function message_welcome3(){
		var unique_id = $.gritter.add({
		// (string | mandatory) the heading of the notification
		title: 'Buy Perfectum!',
		// (string | mandatory) the text inside the notification
		text: 'This great template can be yours today.',
		// (string | optional) the image to display on the left
		image: '../img/avatar.jpg',
		// (bool | optional) if you want it to fade out on its own or just sit there
		sticky: false,
		// (int | optional) the time you want it to be alive for before fading out
		time: '',
		// (string | optional) the class name you want to apply to that specific message
		class_name: 'gritter-light'
	});
} 

	$(document).ready(function(){
	
	setTimeout("message_welcome1()",5000);
	setTimeout("message_welcome2()",10000);	
	setTimeout("message_welcome3()",15000);
	
});

</script>-->
<!-- end: JavaScript