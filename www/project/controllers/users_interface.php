<?php
class Users_interface extends CI_Controller{

	var $user = array('uid'=>0,'ufullname'=>'','ulogin'=>'');
	var $loginstatus = array('company'=>FALSE,'status'=>FALSE);
	var $months = array("01"=>"января","02"=>"февраля","03"=>"марта","04"=>"апреля","05"=>"мая","06"=>"июня","07"=>"июля",
						"08"=>"августа","09"=>"сентября","10"=>"октября","11"=>"ноября","12"=>"декабря");
	
	function __construct(){
	
		parent::__construct();
		
		$cookieuid = $this->session->userdata('login_id');
		if(isset($cookieuid) and !empty($cookieuid)):
			$this->user['uid'] = $this->session->userdata('userid');
			if($this->user['uid']):
				$userinfo = $this->usersmodel->read_info($this->user['uid']);
				if($userinfo):
					$this->user['ufullname']		= $userinfo['uname'].' '.$userinfo['usubname'].' '.$userinfo['uthname'];
					$this->user['ulogin'] 			= $userinfo['uemail'];
					$this->loginstatus['status'] 	= TRUE;
				endif;
			endif;
			
			if($this->session->userdata('login_id') != md5($this->user['ulogin'].$this->user['uconfirmation'])):
				$this->loginstatus['status'] = FALSE;
				$this->user = array();
			endif;
		endif;
	}
	
	/* ----------------------------------------	users menu ---------------------------------------------------*/
	
	function index(){
		
		$pagevar = array(
					'description'	=> '',
					'keywords'		=> '',
					'author'		=> '',
					'title'			=> '',
					'baseurl' 		=> base_url(),
					'userinfo'		=> $this->user
			);
		$this->load->view('users_interface/index',$pagevar);
	}

	/* ----------------------------------- authorization/shutdown ----------------------------------------------*/
	function authorization(){
		
		$statusval = array('status'=>FALSE,'message'=>'Неверный логин или пароль');
		$login = trim($this->input->post('login'));
		$password = trim($this->input->post('password'));
		if(!isset($login) or empty($login)) show_404();
		if(!isset($password) or empty($password)) show_404();
		$user = $this->usersmodel->auth_user($login,$password);
		if($user):
			if($user['umanager'] || $user['ucompany']):
				if($user['ustatus'] == 'enabled'):
					$this->session->set_userdata('login_id',md5($user['uemail'].$user['uconfirmation']));
					$this->session->set_userdata('userid',$user['uid']);
					$this->usersmodel->active_user($user['uid']);
					$statusval['status'] = TRUE;
				else:
					$statusval['message'] = 'Учетная запись не активирована';
				endif;
			else:
				$statusval['message'] = 'Для администратора данная авторизация не допустима';
			endif;
		endif; 
		echo json_encode($statusval);
	}
	
	function shutdown(){
		
		$uid = $this->session->userdata('userid');
		if($uid):
			$this->usersmodel->deactive_user($uid);
			$this->session->sess_destroy();
		else:
			show_404();
		endif;
	}
	
	function admin_login(){
		
		if($this->session->userdata('adminid')):
			redirect('admin/control-panel/'.$this->session->userdata('adminconfirm'));
		endif;
		$pagevar = array(
					'description'	=> '',
					'keywords'		=> '',
					'author'		=> '',
					'title'			=> 'Practice-Book - Администрирование | Авторизация',
					'baseurl' 		=> base_url(),
					'userinfo'		=> $this->user,
			);
		if($this->input->post('submit')):
			$this->form_validation->set_rules('login-name','','required|trim');
			$this->form_validation->set_rules('login-pass','','required');
			$this->form_validation->set_error_delimiters('<div class="fvalid_error">','</div>');
			if(!$this->form_validation->run()):
				$_POST['submit'] = NULL;
				redirect("admin");
			else:
				$user = $this->usersmodel->auth_admin($_POST['login-name'],$_POST['login-pass']);
				if($user):
					if($user['ustatus'] == 'disabled'):
						redirect("admin");
					endif;
					$this->session->sess_destroy();
					$this->session->sess_create();
					$this->session->set_userdata('cookieaid',md5($user['uemail'].$user['uconfirmation']));
					$this->session->set_userdata('adminid',$user['uid']);
					$this->session->set_userdata('adminconfirm',$user['uconfirmation']);
					$this->usersmodel->active_user($user['uid']);
					redirect('admin/control-panel/'.$user['uconfirmation']);
				endif;
				redirect("admin");
			endif;
		endif;
		$this->load->view('users_interface/admin-login',$pagevar);
	}

	/* -----------------------------------------	other function -------------------------------------------*/
	
	function sendmail($email,$msg,$subject,$from){
		
		$this->email->clear(TRUE);
		$config['smtp_host'] = 'localhost';
		$config['charset'] = 'utf-8';
		$config['wordwrap'] = TRUE;
		$this->email->initialize($config);
		$this->email->from($from,'Practice-book.ru');
		$this->email->to($email);
		$this->email->bcc('');
		$this->email->subject($subject);
		$this->email->message(strip_tags($msg));
		if (!$this->email->send()):
			return FALSE;
		endif;
		return TRUE;
	}

	function login_check($login){
		
		if($this->usersmodel->user_exist('uemail',$login)):
			$this->form_validation->set_message('login_check','Логин уже занят');
			return FALSE;
		endif;
		return TRUE;
	}

	function userfile_check($file){
		
		$tmpName = $_FILES['userfile']['tmp_name'];
		if($_FILES['userfile']['error'] != 4):
			if(!$this->case_image($tmpName)):
				$this->form_validation->set_message('userfile_check','Формат не поддерживается!');
				return FALSE;
			endif;
		endif;
		if($_FILES['userfile']['error'] == 1):
			$this->form_validation->set_message('userfile_check','Размер более 5 Мб!');
			return FALSE;
		endif;
		return TRUE;
	}

	function resize_img($tmpName,$wgt,$hgt){
			
		chmod($tmpName,0777);
		$img = getimagesize($tmpName);		
		$size_x = $img[0];
		$size_y = $img[1];
		$wight = $wgt;
		$height = $hgt; 
		if(($size_x < $wgt) or ($size_y < $hgt)):
			$this->resize_image($tmpName,$wgt,$hgt,FALSE);
			$image = file_get_contents($tmpName);
			return $image;
		endif;
		if($size_x > $size_y):
			$this->resize_image($tmpName,$size_x,$hgt,TRUE);
		else:
			$this->resize_image($tmpName,$wgt,$size_y,TRUE);
		endif;
		$img = getimagesize($tmpName);		
		$size_x = $img[0];
		$size_y = $img[1];
		switch ($img[2]){
			case 1: $image_src = imagecreatefromgif($tmpName); break;
			case 2: $image_src = imagecreatefromjpeg($tmpName); break;
			case 3:	$image_src = imagecreatefrompng($tmpName); break;
		}
		$x = round(($size_x/2)-($wgt/2));
		$y = round(($size_y/2)-($hgt/2));
		if($x < 0):
			$x = 0;	$wight = $size_x;
		endif;
		if($y < 0):
			$y = 0; $height = $size_y;
		endif;
		$image_dst = ImageCreateTrueColor($wight,$height);
		imageCopy($image_dst,$image_src,0,0,$x,$y,$wight,$height);
		imagePNG($image_dst,$tmpName);
		imagedestroy($image_dst);
		imagedestroy($image_src);
		$image = file_get_contents($tmpName);
		/*$file = fopen($tmpName,'rb');
		$image = fread($file,filesize($tmpName));
		fclose($file);
		header('Content-Type: image/jpeg' );
		echo $image;
		exit();*/
		return $image;
	}

	function resize_image($image,$wgt,$hgt,$ratio){
	
		$this->load->library('image_lib');
		$this->image_lib->clear();
		$config['image_library'] 	= 'gd2';
		$config['source_image']		= $image; 
		$config['create_thumb'] 	= FALSE;
		$config['maintain_ratio'] 	= $ratio;
		$config['width'] 			= $wgt;
		$config['height'] 			= $hgt;
				
		$this->image_lib->initialize($config);
		$this->image_lib->resize();
	}

	function case_image($file){
			
		$info = getimagesize($file);
		switch ($info[2]):
			case 1	: return TRUE;
			case 2	: return TRUE;
			case 3	: return TRUE;
			default	: return FALSE;	
		endswitch;
	}
	
	function operation_date($field){
			
		$list = preg_split("/-/",$field);
		$nmonth = $this->months[$list[1]];
		$pattern = "/(\d+)(-)(\w+)(-)(\d+)/i";
		$replacement = "\$5 $nmonth \$1 г."; 
		return preg_replace($pattern, $replacement,$field);
	}

	function operation_date_slash($field){
		
		$list = preg_split("/-/",$field);
		$nmonth = $this->months[$list[1]];
		$pattern = "/(\d+)(-)(\w+)(-)(\d+)/i";
		$replacement = "\$5/\$3/\$1"; 
		return preg_replace($pattern, $replacement,$field);
	}

	function operation_date_minus($field){
		
		$list = preg_split("/-/",$field);
		$nmonth = $this->months[$list[1]];
		$pattern = "/(\d+)(-)(\w+)(-)(\d+)/i";
		$replacement = "\$5-\$3-\$1"; 
		return preg_replace($pattern, $replacement,$field);
	}
}