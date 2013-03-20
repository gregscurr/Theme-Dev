<?php
/**
 * The sidebar containing the main widget area.
 */
 ?>
<div id="sidebar" class="col span_8 clr">
<ul id="sidebar">
		  <?php
		  if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('primary-sidebar') ) :
		  endif; 
	  ?>
</ul>
</div>
