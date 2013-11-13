<?php
class ControllerModuletwittertimeline extends Controller {
	
	protected function index($setting) {
	
		$this->language->load('module/twittertimeline');

		$this->data['setting'] = $setting; 

		if (file_exists('catalog/view/theme/' . $this->config->get('config_template') . '/css/twittertimeline.css')) {
			$this->document->addStyle('catalog/view/theme/' . $this->config->get('config_template') . '/css/twittertimeline.css');
		} else {
			$this->document->addStyle('catalog/view/theme/default/css/twittertimeline.css');
		}

		$this->load->model('design/twittertimeline');
		$tweets = $this->model_design_twittertimeline->getTwitterFeed();
		
		if (empty($setting['limit'])) {
			$setting['limit'] = 1;
		}

		$tweets = array_slice($tweets, 0, (int)$setting['limit']);

		if (count($tweets) == 1){
			$this->data['heading_title'] = $this->language->get('heading_title_singular');
		} elseif (count($tweets) > 1){
			$this->data['heading_title'] = $this->language->get('heading_title_plural');
		}

		foreach ($tweets as $tweet) {
			$this->data['tweets'][] = array(
				'text'  => $this->makeClickableLinks($tweet['text']),
				'user'  => $tweet['user']['screen_name'],
				'created_at' => $this->fuzzyTimeFormat($tweet['created_at']),
			);
		}

		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/module/twittertimeline.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/module/twittertimeline.tpl';
		} else {
			$this->template = 'default_progeny/template/module/twittertimeline.tpl';
		}

		$this->render();
	}

	public function fuzzyTimeFormat($date){
		// Configuration
		$date = strtotime($date);
		$singular = array( 'second' , 'minute' , 'hour' , 'day' , 'week' , 'month' , 'year' , 'decade'  );
		$plural = array( 'seconds', 'minutes', 'hours', 'days', 'weeks', 'months', 'years', 'decades' );
		$suffix = 'ago';
		$now = 'now';

		// Prepare
		$time = time();
		$difference = $time - $date;
		$lengths = array( 1, 60, 3600, 86400, 604800, 2630880, 31570560, 315705600 );

		// Calculate lowest dividable amount
		for( $i = 7; $i >= 0 && ( $amount = $difference / $lengths[$i] ) <= 1; --$i );

		// Now or in the future
		if( $amount <= 0 ) return $now;

		// Return as string
		$amount = floor( $amount );

		return $amount . ' ' . ( $amount > 1 ? $plural[$i] : $singular[$i] ) . ' ' . $suffix;
	}

	public function makeClickableLinks($text){
		$text = preg_replace('/(((f|ht){1}tp:\/\/)[-a-zA-Z0-9@:%_\+.~#?&\/\/=]+)/i','<a href="\\1">\\1</a>', $text);
		$text = preg_replace('/(((f|ht){1}tps:\/\/)[-a-zA-Z0-9@:%_\+.~#?&\/\/=]+)/i','<a href="\\1">\\1</a>', $text);

		$text = preg_replace('/([[:space:]()[{}])(www.[-a-zA-Z0-9@:%_\+.~#?&\/\/=]+)/i','\\1<a href="http://\\2">\\2</a>', $text);
		$text = preg_replace('/([_\.0-9a-z-]+@([0-9a-z][0-9a-z-]+\.)+[a-z]{2,3})/i','<a href="mailto:\\1">\\1</a>', $text);
		$text = preg_replace('/(^|\s)#(\w*[a-zA-Z_]+\w*)/', '\1<a href="http://twitter.com/search?q=%23\2&src=hash">#\2</a>', $text);
		$text = preg_replace("/(?<=\A|[^A-Za-z0-9_])@([A-Za-z0-9_]+)(?=\Z|[^A-Za-z0-9_])/", "<a href='http://twitter.com/$1' target='_blank'>$0</a>", $text);
		return $text;
	}
}
?>