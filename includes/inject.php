<?php 


/* HTML injection */
function wps2a_html_footer($content){
	$html = $content . '<div id="wps2a-after_content"></div><!-- TAG INSERITO -->';
	return $html;
}
add_filter( 'the_content', 'wps2a_html_footer', 5 );



/* script injection */
function footerInject() {
	global $post;
	global $wps2a_options;
	$search = get_post_meta( $post->ID, '_wps2a-selector', true );
	if (($search == '') && ($wps2a_options['wps2a_enable_global_endcontent']==1))  {
		$search = '#wps2a-after_content';
	} else if (($search == '') && ($wps2a_options['wps2a_enable_global_endcontent']=='')) {
		exit();
	}
	
?>

<script>
 	var toLookFor = '<?php echo $search; ?>' ;
	jQuery(function() {

		var sent = 0;
		var startTime = new Date();
		var beginning = startTime.getTime();
		var check = 0;

	    jQuery(window).scroll(function(){

	    	if (check==0) { 
				currentTime = new Date();
				scrollStart = currentTime.getTime();
				check = 1;
			}	

	        var isElementInView = Utils.isElementInView(jQuery(toLookFor), true);
			timeToScroll = Math.round((scrollStart - beginning) / 1000);

	        if ((isElementInView) && sent==0) {
	        	currentEnd = new Date();
        		currentEndTime = currentEnd.getTime();
	        	timeToEnd = Math.round((currentEndTime - scrollStart) / 1000 );
	            
	            
	            if (timeToEnd <= 3) {
	            	sent = 0;
	            	return
	            } else {
	            	sent = 1;
	            	sendToAnalytics(timeToEnd);
	            }     
	            
	        } else {

	        }
	        return;
	    });
	});
</script>

<?php
}

add_action( 'wp_footer', 'footerInject', 200 );




