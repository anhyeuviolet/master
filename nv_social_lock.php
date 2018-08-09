<?php
$header_message = 'Nội Dung Đã Được Khóa';
$message = 'Hãy Like - Tweet hoặc +1 để xem nội dung ẩn.';
// Link will share to Twitter

$twitter_link = $client_info['selfurl'];
$twitter_mess = 'Upgrade your social buttons to get more social traffic!';

//FB Page URL
$fb_link = $client_info['selfurl'];
$fb_appid = '1726972170850062';

$google_clientId = '';
// Look like 959106316043-n6dcllcul0mjo9nibuohji2uugk8n98f.apps.googleusercontent.com
$google_link = $client_info['selfurl'];

$js_link = 'https://gitcdn.link/repo/anhyeuviolet/social-locker/master/js/Locklike.js';

// Do not edit below
$html_str_1 = '
<div id="hide-content">
	<div class="social-lock" style="display: none;">
';

$html_str_2 = '
	</div>
</div>'
;
$html_css = '<link rel="stylesheet" href="https://rawgit.com/anhyeuviolet/social-locker/master/css/social-locker.css">';

$html_js = '
<script type="text/javascript" src="' . $js_link . '"></script>
<script>
jQuery(document).ready(function ($) {
	$("#hide-content .social-lock").sociallocker({
		demo: true,
		text: {
			header: "' . $header_message . '",
			message: "' . $message . '"
		},
        theme: "flat",           
		buttons: {
			order: [
				"facebook-share",
				"twitter-tweet",
				,"google-plus"
			]
		},
		 // twitter options
		twitter: {
			tweet: {
				// url to tweet
				url: "'.$twitter_link.'"
			}
		},
		// facebook options
		facebook: {
			appId: "'.$fb_appid.'",
			share: {
				// url to share
				url: "'.$fb_link.'"
			}
		},
        "google": {
            "clientId": "' . $google_clientId . '",
            "lang": "en",
            "plus": {
                "url": "' . $google_link . '",
                "title": "+1 us"
            },
            "share": {
                "url": "' . $google_link . '",
                "title": "share"
            }
        },
        "youtube": {
            "subscribe": {
                "clientId": "' . $google_clientId . '",
                "title": "Youtube"
            }
        }        
	});
});
</script>

'
;

$my_head .= $html_css;
$my_footer .= $html_js;

$contents = html_entity_decode($contents);

$_pt_1 = '/\[social-lock\](?:(.+?)?\[\/social-lock\])?/';
$check_shortcode = preg_match_all($_pt_1, $contents);
if($check_shortcode == 1){
	$contents = preg_replace(
		'/\[social-lock](.*?)\[\/social-lock]/s',
		$html_str_1. '\1' . $html_str_2 ,
		$contents
		);
		
	if (! empty($my_head)) {
		$contents = preg_replace('/(<\/head>)/i', $my_head . '\\1', $contents, 1);
	}
	if (! empty($my_footer)) {
		$contents = preg_replace('/(<\/body>)/i', $my_footer . '\\1', $contents, 1);
	}
}