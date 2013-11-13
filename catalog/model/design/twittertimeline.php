<?php
	class ModelDesigntwittertimeline extends Model {

		public function getTwitterFeed() {
			require_once(DIR_SYSTEM . 'library/TwitterAPIExchange.php');

			$screen_name      = $this->config->get('config_twitter_screen_name');
			$count            = $this->config->get('config_twitter_count');
			$exclude_replies  = $this->config->get('config_twitter_exclude_replies');
			$include_retweets = $this->config->get('config_twitter_include_rts');

			$settings = array(
				'oauth_access_token'        => $this->config->get('config_twitter_oauth_access_token'),
				'oauth_access_token_secret' => $this->config->get('config_twitter_oauth_access_token_secret'),
				'consumer_key'              => $this->config->get('config_twitter_consumer_key'),
				'consumer_secret'           => $this->config->get('config_twitter_consumer_secret')
			);

			$tweets = $this->getCache('twittertimeline');

			if(!$tweets){
				$url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
				$getfield = '?screen_name='.$screen_name.'&count='.$count.'&exclude_replies='.$exclude_replies.'&include_rts='.$include_retweets;
				$requestMethod = 'GET';

				$twitter = new TwitterAPIExchange($settings);

				$tweets = $twitter->setGetfield($getfield)
													->buildOauth($url, $requestMethod)
													->performRequest();

        $this->setCache('twittertimeline', $tweets);
      }

			$tweets = json_decode($tweets, true);
			
			return $tweets;
		}

		public function getCache($key) {
			$files = glob(DIR_CACHE . 'cache.' . preg_replace('/[^A-Z0-9\._-]/i', '', $key) . '.*');

			if ($files) {
				$cache = file_get_contents($files[0]);
				
				$data = unserialize($cache);
				
				foreach ($files as $file) {
					$time = substr(strrchr($file, '.'), 1);
						if ($time < time()) {
							if (file_exists($file)) {
								unlink($file);
							}
	      		}
	    		}
				return $data;			
			}
		}

  	public function setCache($key, $value) {
    	$this->deleteCache($key);
		
			$file = DIR_CACHE . 'cache.' . preg_replace('/[^A-Z0-9\._-]/i', '', $key) . '.' . (time() + $this->config->get('config_twitter_cache_expire'));
	    	
			$handle = fopen($file, 'w');

	    fwrite($handle, serialize($value));
			
	    fclose($handle);
	  }
	
  	public function deleteCache($key) {
			$files = glob(DIR_CACHE . 'cache.' . preg_replace('/[^A-Z0-9\._-]/i', '', $key) . '.*');
		
			if ($files) {
    		foreach ($files as $file) {
      		if (file_exists($file)) {
						unlink($file);
					}
    		}
			}
  	}
	}
?>