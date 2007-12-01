<html>

<head>
	<title>Memorize Chinese! - Flashcards</title>
	<link rel="stylesheet" href="<?php echo site_url('css/default.css'); ?>" type="text/css">
	<link rel="stylesheet" href="<?php echo site_url('css/memorize.css'); ?>" type="text/css">
	
	<script type="text/javascript" src="<?php echo site_url('js/jquery.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo site_url('js/elapsedtime.js'); ?>"></script>
	<script type="text/javascript">
  	$(document).ready(function(){
   		// Your code here
   		$("#content div.answer div.real").hide();
   		$("#content div.grade").hide();
   		
   		$("#content div.answer p.clicktoshow a").click(function(){
   			$("#content div.answer p.clicktoshow").hide();
				$("#content div.answer div.real").show();
				$("#content div.grade").show();
			});
			/*
   		$("#content div.answer p.clicktoshow").click(function(){
   			$("#content div.answer p.clicktoshow").hide();
				$("#content div.answer p.real").show();
			});
			*/
		});
  </script>
</head>

<body>

<div id="header">
<h1><a href="<?php echo base_url(); ?>">Memorize Chinese!</a></h1>
</div>

<div id="content">

<div class="question">
	<h2>Question (<?php out('category'); ?>):</h2>
	<div class="real">
		<p class="main"><?php out('question'); ?></p>
		<?php 
			$question_extra = get('question_extra');
			if(!empty($question_extra)):
		?>
			<p class="extra"><?php out('question_extra'); ?></p>
		<?php endif; ?>
	</div>
</div>

<div class="answer">
	<h2>Answer:</h2>
	<p class="clicktoshow"><a href="#">Show Answer</a></p>
	<div class="real">
		<p class="short_answer"><?php out('answer'); ?></p>
		<?php 
			$answer_extra = get('answer_extra');
			if(!empty($answer_extra)):
		?>
			<p class="extra"><?php out('answer_extra'); ?></p>
		<?php endif; ?>
	</div>
</div>

<div class="grade">
	<h2>Grade your answer to continue:</h2>
	<ul>
		<li><a href="<?php echo site_url('memorize/grade/'.get('id').'/0'); ?>">0</a></li>
		<li><a href="<?php echo site_url('memorize/grade/'.get('id').'/1'); ?>">1</a></li>
		<li><a href="<?php echo site_url('memorize/grade/'.get('id').'/2'); ?>">2</a></li>
		<li><a href="<?php echo site_url('memorize/grade/'.get('id').'/3'); ?>">3</a></li>
		<li><a href="<?php echo site_url('memorize/grade/'.get('id').'/4'); ?>">4</a></li>
		<li><a href="<?php echo site_url('memorize/grade/'.get('id').'/5'); ?>">5</a></li>
	</ul>
</div>

</div>

<div id="footer">
<p>Created by Michael Huynh. Page rendered in {elapsed_time} seconds.</p>
</div>

</body>

</html>
