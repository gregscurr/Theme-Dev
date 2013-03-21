<?php
/**
 * The footer template
 */
?>
	</div> <!-- #main -->
<div id="footer" class="row">
<div class="col span_10 clr">
   <ul>
      <?php
		  if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('left-footer') ) :
		  endif;
	  ?>
   </ul>
</div>
<div class="col span_14 clr">
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