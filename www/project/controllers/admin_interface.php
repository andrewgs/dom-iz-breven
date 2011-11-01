<?php
class Admin_interface extends CI_Controller{

	var $user = array('uname'=>'Администратор','ulogin'=>'admin','upassword'=>'9846980','email'=>'info@dom-iz-breven.ru','status'=>FALSE);
	var $months = array("01"=>"января","02"=>"февраля","03"=>"марта","04"=>"апреля","05"=>"мая","06"=>"июня","07"=>"июля",
						"08"=>"августа","09"=>"сентября","10"=>"октября","11"=>"ноября","12"=>"декабря");
	
	function __construct(){
	
		parent::__construct();
		
		$this->load->model('messagesmodel');
		$this->load->model('projectsmodel');
		
		$cookieuid = $this->session->userdata('login_id');
		if(isset($cookieuid) and !empty($cookieuid)):
			$this->user['status'] = TRUE;
			if($this->session->userdata('login_id') != md5($this->user['ulogin'].$this->user['upassword'])):
				$this->user['status'] = FALSE;
				$this->user = array();
			endif;
		else:
			redirect('');
		endif;
	}

	function cpanel(){
	
		$pagevar = array(
					'description'	=> '',
					'keywords'		=> '',
					'author'		=> '',
					'title'			=> 'Администрирование | Панель управления',
					'baseurl' 		=> base_url(),
					'userinfo'		=> $this->user,
					'list'			=> $this->messagesmodel->read_records()
			);
		$this->session->unset_userdata('msg');
		$this->load->view("admin_interface/cpanel",$pagevar);
	}
	
	function shutdown(){
		
		$this->session->sess_destroy();
		redirect('');
	}
	
	function delete_message(){
	
		$statusval = array('status'=>FALSE,'message'=>'Ошибка при удалении');
		$id = trim($this->input->post('id'));
		if(!$id) show_404();
		$success = $this->messagesmodel->delete_record($id);
		if($success) $statusval['status'] = TRUE;
		echo json_encode($statusval);
	}
	
	function add_project(){
		
		$pagevar = array(
					'description'	=> '',
					'keywords'		=> '',
					'author'		=> '',
					'title'			=> 'Администрирование | Добавление проекта',
					'baseurl' 		=> base_url(),
					'userinfo'		=> $this->user,
					'form'			=> FALSE,
					'msg'			=> $this->session->userdata('msg')
			);
		$this->session->unset_userdata('msg');
		if($this->input->post('submit')):
			$this->form_validation->set_rules('square','Название','required|trim');
			$this->form_validation->set_rules('userfile1','','callback_userfile1_check');
			$this->form_validation->set_rules('userfile2','','callback_userfile2_check');
			$this->form_validation->set_rules('text','Содержание','required|trim');
			if(!$this->form_validation->run()):
				$_POST['submit'] = NULL;
				$this->add_project();
				return FALSE;
			else:
				$_POST['submit'] = NULL;
				$_POST['image'] = $this->resize_image($_FILES['userfile1']['tmp_name'],400,300,TRUE);
				$_POST['thumb'] = $this->resize_image($_FILES['userfile1']['tmp_name'],220,170,TRUE);
				$_POST['shema'] = $this->resize_image($_FILES['userfile2']['tmp_name'],400,215,TRUE);
				$_POST['text'] = preg_replace('/\n{2}/','<br>',$_POST['text']);
				$this->projectsmodel->insert_record($_POST,17000);
				$this->session->set_userdata('msg','"Добавлен новый проект"');
				redirect('admin/add-project');
			endif;
		endif;
		
		$this->load->view("admin_interface/add-project",$pagevar);
	}
	
	function views_projects(){
		
		$pagevar = array(
					'description'	=> '',
					'keywords'		=> '',
					'author'		=> '',
					'title'			=> 'Администрирование | Список проектов',
					'baseurl' 		=> base_url(),
					'userinfo'		=> $this->user,
					'list'			=> $this->projectsmodel->read_records()
			);
		$this->session->unset_userdata('msg');
		$this->load->view("admin_interface/projects-list-page",$pagevar);
	}
	
	function delete_project(){
	
		$statusval = array('status'=>FALSE,'message'=>'Ошибка при удалении');
		$id = trim($this->input->post('id'));
		if(!$id) show_404();
		$success = $this->projectsmodel->delete_record($id);
		if($success) $statusval['status'] = TRUE;
		echo json_encode($statusval);
	}
	
	function sendmail($email,$msg,$subject,$from){
		
		$config['smtp_host'] = 'localhost';
		$config['charset'] = 'utf-8';
		$config['wordwrap'] = TRUE;
		$this->email->initialize($config);
		$this->email->from($from,'Администрация сайта');
		$this->email->to($email);
		$this->email->bcc('');
		$this->email->subject($subject);
		$this->email->message(strip_tags($msg));
		if (!$this->email->send()):
			return FALSE;
		endif;
		return TRUE;
	}
	
	function resize_image($tmpName,$wgt,$hgt,$ratio){
			
		chmod($tmpName,0777);
		$img = getimagesize($tmpName);
		$this->load->library('image_lib');
		$this->image_lib->clear();
		$config['image_library'] 	= 'gd2';
		$config['source_image']		= $tmpName; 
		$config['create_thumb'] 	= FALSE;
		$config['maintain_ratio'] 	= $ratio;
		$config['quality'] 			= 100;
		$config['master_dim'] 		= 'width';
		$config['width'] 			= $wgt;
		$config['height'] 			= $hgt;
		$this->image_lib->initialize($config);
		$this->image_lib->resize();
		
		$image = file_get_contents($tmpName);
		return $image;
	}

	function userfile1_check($file){
		
		$tmpName = $_FILES['userfile1']['tmp_name'];
		
		if($_FILES['userfile1']['error'] != 4):
			if(!$this->case_image($tmpName)):
				$this->form_validation->set_message('userfile1_check','Формат не поддерживается');
				$this->session->set_userdata('msg','"Схема: формат не поддерживается"');
				return FALSE;
			endif;
		endif;
		if($_FILES['userfile1']['error'] == 1):
			$this->form_validation->set_message('userfile1_check','Размер более 5 Мб!');
			$this->session->set_userdata('msg','"Схема: размер более 5 Мб!"');
			return FALSE;
		endif;
		return TRUE;
	}
	
	function userfile2_check($file){
		
		$tmpName = $_FILES['userfile2']['tmp_name'];
		
		if($_FILES['userfile2']['error'] != 4):
			if(!$this->case_image($tmpName)):
				$this->form_validation->set_message('userfile2_check','Формат не поддерживается');
				return FALSE;
			endif;
		endif;
		if($_FILES['userfile2']['error'] == 1):
			$this->form_validation->set_message('userfile2_check','Размер более 5 Мб!');
			return FALSE;
		endif;
		return TRUE;
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
}
?>