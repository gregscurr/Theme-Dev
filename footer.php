<?php
/**
 * The footer template
 */
?>
	</div> <!-- #main -->
<div id="footer">
<div id="left-widget-area">
   <ul>
      <?php
		  if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('left-footer') ) :
		  endif;
	  ?>
   </ul>
</div>
<div id="right-widget-area">
   <ul>
      <?php
		  if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('right-footer') ) :
		  endif; 
	  ?>
   </ul>
</div>
<div class="clearfix"></div>
</div> <!-- #footer -->
</div> <!-- #wrapper -->
</div> <!-- #page -->
<?php wp_footer(); ?>
</body>
</html>