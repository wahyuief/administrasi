<?php
defined('BASEPATH') OR exit('No direct script access allowed');

app()->load->library('cc_app');

define('DIRNAME', basename(__DIR__));

define('IS_DEMO', true);

if ($ccExtension->actived()) {
   /* app()->cc_app->onEvent('extension_info_'.DIRNAME, function(){
    echo '<div class="callout callout-warning-cc ">click this if you need refresh and remove all files your generated '.anchor('clean/data', 'clean data', ['style' => 'color:#000', 'class' => 'remove-data']).'</div>';
    });*/
}

cicool()->onEvent('backend_content_top', function(){
	echo  '
	<div class="callout callout-warning message-alert" style="margin-bottom: 0!important; border-left:none; border-radius:0px">
        Database will reset at every 60th minute past every hour.
        <button class="close pull-right" >&times;</button>
      </div>
	<script>
	$(function(){
		$(document).find(".message-alert .close").click(function(event) {
			$(this).parent(".message-alert").hide();
          });
	});
	</script>
      ';	
});

cicool()->onRoute('clean/data', 'get', function(){
	$app = app()->load->library(DIRNAME . '/clean');

	app()->clean->clean();
});
