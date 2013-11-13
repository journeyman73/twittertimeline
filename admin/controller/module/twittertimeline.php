<?php

class ControllerModuleTwittertimeline extends Controller {
	
	private $error = array(); 
	
	public function index() {   

		$this->load->language('module/twittertimeline');

		$this->document->setTitle($this->language->get('heading_title'));
		
		$this->load->model('setting/setting');
		
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$this->model_setting_setting->editSetting('twittertimeline', $this->request->post);		
					
			$this->session->data['success'] = $this->language->get('text_success');
						
			$this->redirect($this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL'));
		}

		$this->data['heading_title'] = $this->language->get('heading_title');

		$this->data['text_select'] = $this->language->get('text_select');
		$this->data['text_none'] = $this->language->get('text_none');
		$this->data['text_yes'] = $this->language->get('text_yes');
		$this->data['text_no'] = $this->language->get('text_no');
		$this->data['tab_connect'] = $this->language->get('tab_connect');
		$this->data['tab_display'] = $this->language->get('tab_display');

		$this->data['text_enabled'] = $this->language->get('text_enabled');
    $this->data['text_disabled'] = $this->language->get('text_disabled');
    $this->data['text_content_top'] = $this->language->get('text_content_top');
    $this->data['text_content_bottom'] = $this->language->get('text_content_bottom');
    $this->data['text_column_left'] = $this->language->get('text_column_left');
    $this->data['text_column_right'] = $this->language->get('text_column_right');

		$this->data['entry_limit'] = $this->language->get('entry_limit');
		$this->data['entry_image'] = $this->language->get('entry_image');
		$this->data['entry_layout'] = $this->language->get('entry_layout');
		$this->data['entry_position'] = $this->language->get('entry_position');
		$this->data['entry_status'] = $this->language->get('entry_status');
		$this->data['entry_sort_order'] = $this->language->get('entry_sort_order');

		$this->data['entry_twitter_screen_name'] = $this->language->get('entry_twitter_screen_name');
		$this->data['entry_twitter_cache_expire'] = $this->language->get('entry_twitter_cache_expire');
		$this->data['entry_twitter_oauth_access_token'] = $this->language->get('entry_twitter_oauth_access_token');
		$this->data['entry_twitter_oauth_access_token_secret'] = $this->language->get('entry_twitter_oauth_access_token_secret');
		$this->data['entry_twitter_consumer_key'] = $this->language->get('entry_twitter_consumer_key');
		$this->data['entry_twitter_consumer_secret'] = $this->language->get('entry_twitter_consumer_secret');
		$this->data['entry_twitter_count'] = $this->language->get('entry_twitter_count');
		$this->data['entry_twitter_exclude_replies'] = $this->language->get('entry_twitter_exclude_replies');
		$this->data['entry_twitter_include_rts'] = $this->language->get('entry_twitter_include_rts');
		
		$this->data['button_save'] = $this->language->get('button_save');
		$this->data['button_cancel'] = $this->language->get('button_cancel');
		$this->data['button_add_module'] = $this->language->get('button_add_module');
    $this->data['button_remove'] = $this->language->get('button_remove');

		if (isset($this->error['warning'])) {
			$this->data['error_warning'] = $this->error['warning'];
		} else {
			$this->data['error_warning'] = '';
		}
		if (isset($this->error['config_twitter_screen_name'])) {
			$this->data['error_twitter_screen_name'] = $this->error['config_twitter_screen_name'];
		} else {
			$this->data['error_twitter_screen_name'] = '';
		}
		if (isset($this->error['config_twitter_cache_expire'])) {
			$this->data['error_twitter_cache_expire'] = $this->error['config_twitter_cache_expire'];
		} else {
			$this->data['error_twitter_cache_expire'] = '';
		}
		if (isset($this->error['config_twitter_oauth_access_token'])) {
			$this->data['error_twitter_oauth_access_token'] = $this->error['config_twitter_oauth_access_token'];
		} else {
			$this->data['error_twitter_oauth_access_token'] = '';
		}
		if (isset($this->error['config_twitter_oauth_access_token_secret'])) {
			$this->data['error_twitter_oauth_access_token_secret'] = $this->error['config_twitter_oauth_access_token_secret'];
		} else {
			$this->data['error_twitter_oauth_access_token_secret'] = '';
		}
		if (isset($this->error['config_twitter_consumer_key'])) {
			$this->data['error_twitter_consumer_key'] = $this->error['config_twitter_consumer_key'];
		} else {
			$this->data['error_twitter_consumer_key'] = '';
		}
		if (isset($this->error['config_twitter_consumer_secret'])) {
			$this->data['error_twitter_consumer_secret'] = $this->error['config_twitter_consumer_secret'];
		} else {
			$this->data['error_twitter_consumer_secret'] = '';
		}
		if (isset($this->error['config_twitter_count'])) {
			$this->data['error_twitter_count'] = $this->error['config_twitter_count'];
		} else {
			$this->data['error_twitter_count'] = '';
		}
		if (isset($this->error['config_twitter_exclude_replies'])) {
			$this->data['error_twitter_exclude_replies'] = $this->error['config_twitter_exclude_replies'];
		} else {
			$this->data['error_twitter_exclude_replies'] = '';
		}
		if (isset($this->error['config_twitter_include_rts'])) {
			$this->data['error_twitter_include_rts'] = $this->error['config_twitter_include_rts'];
		} else {
			$this->data['error_twitter_include_rts'] = '';
		}
		
		$this->data['breadcrumbs'] = array();

		$this->data['breadcrumbs'][] = array(
			'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'),
			'separator' => false
		);

		$this->data['breadcrumbs'][] = array(
			'text'      => $this->language->get('text_module'),
			'href'      => $this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL'),
			'separator' => ' :: '
		);
		
		$this->data['breadcrumbs'][] = array(
			'text'      => $this->language->get('heading_title'),
			'href'      => $this->url->link('module/twittertimeline', 'token=' . $this->session->data['token'], 'SSL'),
			'separator' => ' :: '
		);

		if (isset($this->session->data['success'])) {
			$this->data['success'] = $this->session->data['success'];
			unset($this->session->data['success']);
		} else {
			$this->data['success'] = '';
		}

		$this->data['action'] = $this->url->link('module/twittertimeline', 'token=' . $this->session->data['token'], 'SSL');
		$this->data['cancel'] = $this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL');
		$this->data['token'] = $this->session->data['token'];

		$this->data['modules'] = array();

    if (isset($this->request->post['twittertimeline_module'])) {
      $this->data['modules'] = $this->request->post['twittertimeline_module'];
    } 
    	elseif ($this->config->get('twittertimeline_module')) 
    {
      $this->data['modules'] = $this->config->get('twittertimeline_module');
    } 
    	else 
    {
      $this->data['modules'] = array();
    }
 

		$this->load->model('design/layout');
		
		$this->data['layouts'] = $this->model_design_layout->getLayouts();

		if (isset($this->request->post['config_twitter_screen_name'])) {
			$this->data['config_twitter_screen_name'] = $this->request->post['config_twitter_screen_name']; 
		} else {
			$this->data['config_twitter_screen_name'] = $this->config->get('config_twitter_screen_name');
		}
		if (isset($this->request->post['config_twitter_cache_expire'])) {
			$this->data['config_twitter_cache_expire'] = $this->request->post['config_twitter_cache_expire']; 
		} else {
			$this->data['config_twitter_cache_expire'] = $this->config->get('config_twitter_cache_expire');
		}
		if (isset($this->request->post['config_twitter_oauth_access_token'])) {
			$this->data['config_twitter_oauth_access_token'] = $this->request->post['config_twitter_oauth_access_token']; 
		} else {
			$this->data['config_twitter_oauth_access_token'] = $this->config->get('config_twitter_oauth_access_token');
		}
		if (isset($this->request->post['config_twitter_oauth_access_token_secret'])) {
			$this->data['config_twitter_oauth_access_token_secret'] = $this->request->post['config_twitter_oauth_access_token_secret']; 
		} else {
			$this->data['config_twitter_oauth_access_token_secret'] = $this->config->get('config_twitter_oauth_access_token_secret');
		}
		if (isset($this->request->post['config_twitter_consumer_key'])) {
			$this->data['config_twitter_consumer_key'] = $this->request->post['config_twitter_consumer_key']; 
		} else {
			$this->data['config_twitter_consumer_key'] = $this->config->get('config_twitter_consumer_key');
		}
		if (isset($this->request->post['config_twitter_consumer_secret'])) {
			$this->data['config_twitter_consumer_secret'] = $this->request->post['config_twitter_consumer_secret']; 
		} else {
			$this->data['config_twitter_consumer_secret'] = $this->config->get('config_twitter_consumer_secret');
		}
		if (isset($this->request->post['config_twitter_count'])) {
			$this->data['config_twitter_count'] = $this->request->post['config_twitter_count']; 
		} else {
			$this->data['config_twitter_count'] = $this->config->get('config_twitter_count');
		}
		if (isset($this->request->post['config_twitter_exclude_replies'])) {
			$this->data['config_twitter_exclude_replies'] = $this->request->post['config_twitter_exclude_replies']; 
		} else {
			$this->data['config_twitter_exclude_replies'] = $this->config->get('config_twitter_exclude_replies');
		}
		if (isset($this->request->post['config_twitter_include_rts'])) {
			$this->data['config_twitter_include_rts'] = $this->request->post['config_twitter_include_rts']; 
		} else {
			$this->data['config_twitter_include_rts'] = $this->config->get('config_twitter_include_rts');
		}

		$this->template = 'module/twittertimeline.tpl';
		$this->children = array(
			'common/header',
			'common/footer',
		);

		$this->response->setOutput($this->render());
	}
	
	private function validate() {
		if (!$this->user->hasPermission('modify', 'module/twittertimeline')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		if (!$this->request->post['config_twitter_screen_name']) {
			$this->error['config_twitter_screen_name'] = $this->language->get('error_twitter_screen_name');
		}
		if ($this->request->post['config_twitter_screen_name']) {
			if (!$this->request->post['config_twitter_cache_expire']) {
				$this->error['config_twitter_cache_expire'] = $this->language->get('error_twitter_cache_expire');
			}
			if (!$this->request->post['config_twitter_oauth_access_token']) {
				$this->error['config_twitter_oauth_access_token'] = $this->language->get('error_twitter_oauth_access_token');
			}
			if (!$this->request->post['config_twitter_oauth_access_token_secret']) {
				$this->error['config_twitter_oauth_access_token_secret'] = $this->language->get('error_twitter_oauth_access_token_secret');
			}
			if (!$this->request->post['config_twitter_consumer_key']) {
				$this->error['config_twitter_consumer_key'] = $this->language->get('error_twitter_consumer_key');
			}
			if (!$this->request->post['config_twitter_consumer_secret']) {
				$this->error['config_twitter_consumer_secret'] = $this->language->get('error_twitter_consumer_secret');
			}
		}
		
		if (!$this->error) {
			return TRUE;
		} else {
			return FALSE;
		}	
	}


}
?>