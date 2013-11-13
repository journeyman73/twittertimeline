<?php
	if (isset($setting['position'])) {

		if ($setting['position'] == 'content_bottom') {
			echo '<section class="twitter-wrapper-bottom">';
		 	echo '<div class="container">';
		  echo '<div class="row ">';
		  echo '<div class="col-lg-12 text-center">';
		  echo '<h2 class="section-header"><i class="icon-twitter"></i>' . $heading_title . '</h2>';
		  echo '<ul class="list-unstyled">';
			foreach ($tweets as $tweet) {
				echo '<li class="tweet">';
				echo '<p class="lead tweet_text">' . $tweet['text'] . ' - ' . $tweet['user'] . '</p>';
				echo '<p class="tweet_time">' . $tweet['created_at'] . '</p>';
				echo '</li>';
			}
			echo '</ul>';
		  echo '</div>';
		  echo '</div>';
		  echo '</div>';
			echo '</section>';
		} 
		else if ($setting['position'] == 'content_top') {
			echo '<section class="twitter-wrapper-top">';
		 	echo '<div class="container">';
		  echo '<div class="row ">';
		  echo '<div class="col-lg-12 text-center">';
		  echo '<h2 class="section-header"><i class="icon-twitter"></i> ' . $heading_title . '</h2>';
		  echo '<ul class="list-unstyled">';
			foreach ($tweets as $tweet) {
				echo '<li class="tweet">';
				echo '<p class="lead tweet_text">' . $tweet['text'] . ' - ' . $tweet['user'] . '</p>';
				echo '<p class="tweet_time">' . $tweet['created_at'] . '</p>';
				echo '</li>';
			}
			echo '</ul>';
		  echo '</div>';
		  echo '</div>';
		  echo '</div>';
			echo '</section>';
		} 
		else if (($setting['position'] == 'column_left') || ($setting['position'] == 'column_right')) {
			echo '<h2 class="section-header"><i class="icon-twitter"></i>' . $heading_title . '</h2>';
			echo '<ul class="list-unstyled">';
			foreach ($tweets as $tweet) {
				echo '<li class="tweet">';
				echo '<p class="tweet_text">' . $tweet['text'] . ' - ' . $tweet['user'] . '</p>';
				echo '<p class="tweet_time">' . $tweet['created_at'] . '</p>';
				echo '</li>';
			}
			echo '</ul>';
		}

	} else {
		echo '<section class="twitter-wrapper-footer">';
		echo '<div class="container">';
		echo '<div class="row ">';
		echo '<div class="col-lg-12 text-center">';
	  echo '<h2 class="section-header"><i class="icon-twitter"></i> ' . $heading_title . '</h2>';
	  echo '<ul class="list-unstyled">';
	  foreach ($tweets as $tweet) {
			echo '<li class="tweet">';
			echo '<p class="lead tweet_text">' . $tweet['text'] . ' - ' . $tweet['user'] . '</p>';
			echo '<p class="tweet_time">' . $tweet['created_at'] . '</p>';
			echo '</li>';
		}
		echo '</ul>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</section>';
	}
?>