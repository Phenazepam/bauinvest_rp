<div  id="top-menu">
	<?php echo Content::showMenu(Content::$topmenu); ?>
</div>

<script>
	$(document).ready(
		function(){
			$(".sub").hover(
				function(){
					$(this).children("ul").show();
				},
				function(){
					$(this).children("ul").hide();
				}
			)
		}
	);
</script>