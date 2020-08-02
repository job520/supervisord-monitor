<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends MY_Controller {
	public function Index()	{

		$credentials = $this->config->item('credentials');
		if(!(isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW']) && $_SERVER['PHP_AUTH_USER'] == $credentials['user'] && $_SERVER['PHP_AUTH_PW'] == $credentials['pass'])){
			header('WWW-Authenticate: Basic realm="Secured Area"');
			header('Status: 401 Unauthorized');
			exit(); 
		}


		$mute = $this->input->get('mute');
		if($this->input->get('mute') == 1){
			$mute_time = time()+600;
			setcookie('mute',$mute_time,$mute_time,'/');
			Redirect();
		}
		if($this->input->get('mute')==-1){
			setcookie('mute',0,time()-1,'/');
			Redirect();
		}

		$data['muted'] = $this->input->cookie('mute');

		$this->load->helper('date');
		$servers = $this->config->item('supervisor_servers');
		foreach($servers as $name=>$config){
			$data['list'][$name] = $this->_request($name,'getAllProcessInfo');
			$data['version'][$name] = $this->_request($name,'getSupervisorVersion');
		}
		$data['cfg'] = $servers;
		$this->load->view('welcome',$data);
	}
}

