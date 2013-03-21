<?php
/**
 * The sidebar containing the main widget area.
 */
 ?>
<div id="sidebar" class="col span_8 clr">
	<div id="social">
		<a href="https://github.com/pattonwebz/theme-dev" class="genericon genericon-github"></a>
		<a href="http://www.facebook.com/ThemeDevFramework" class="genericon genericon-facebook"></a>
		<a href="https://twitter.com/Theme_Dev_Frame" class="genericon genericon-twitter"></a>
		<a href="https://plus.google.com/u/0/b/100985048306496223683/" class="genericon genericon-googleplus"></a>
	</div>
<ul id="sidebar">
		  <?php
		  if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('primary-sidebar') ) :
		  endif; 
	  ?>
</ul>
</div>
