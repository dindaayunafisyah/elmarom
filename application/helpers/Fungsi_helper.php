<?php
	
	function check_sudah_login()
	{
		//hak akses yuk koding media
		$ci =& get_instance();
		$user_session = $ci->session->userdata('id');
		if($user_session){
			redirect('admin/Dashboard');
		}
	}
	function check_tidak_login()
	{
		//hak akses yuk koding media
		$ci =& get_instance();
		$user_session = $ci->session->userdata('id');
		if(!$user_session){
			redirect('admin/Login');
		}
	}
