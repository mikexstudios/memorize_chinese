<html>

<head>
	<title>Memorize Chinese! - Flashcards</title>
	<link rel="stylesheet" href="<?php echo site_url('css/default.css'); ?>" type="text/css">
	<link rel="stylesheet" href="<?php echo site_url('css/home.css'); ?>" type="text/css">
	
	<script type="text/javascript" src="<?php echo site_url('js/jquery.js'); ?>"></script>
	<script type="text/javascript">
  	$(document).ready(function(){
   		// Your code here
   		$("#content div.decks").hide();
   		
   		$("a.show_decks").click(function(){
				$("#content div.decks").show();
			});
		});
  </script>
</head>

<body>

<div id="header">
<h1>Memorize Chinese!</h1>
</div>



<div id="content">
<div class="right_option">
	<a href="<?php echo site_url('home/flipped'); ?>">Turn 
	<?php 
		$is_flipped = $this->session->userdata('flipped');
		if($is_flipped === true)
		{ echo 'off'; }
		else
		{ echo 'on'; }
	?>
	flipped mode</a>
</div>
<ul class="menu">
	<li>
		<a href="#" class="show_decks">Learn new words</a>
		<div class="decks">
			<ul>
				<?php foreach(get('decks') as $id => $each_deck): ?>
					<li><a href="<?php echo site_url('learn/'.$id); ?>"><?php echo $each_deck; ?></a></li>
				<?php endforeach; ?>
			</ul>
			<br />
		</div>
	</li>
	<li><a href="<?php echo site_url('review'); ?>">Review existing words</a></li>
</ul>
</div>

<div id="footer">
<p>Created by Michael Huynh. Page rendered in {elapsed_time} seconds.</p>
</div>

</body>

</html>
