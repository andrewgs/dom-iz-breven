<?php
class Users_interface extends CI_Controller{

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
		endif;
	}
	
	/* ----------------------------------------	users menu ---------------------------------------------------*/
	
	function index(){
		
		$pagevar = array(
					'description'	=> '',
					'keywords'		=> '',
					'author'		=> '',
					'title'			=> 'Зеленый Дом :: Строительство деревянных домов из оцилиндрованного бревна',
					'baseurl' 		=> base_url(),
					'userinfo'		=> $this->user,
					'form'			=> FALSE,
					'projects'		=> array()
			);
		$pagevar['projects'][0] = $this->projectsmodel->read_rundom(0,100);
		$pagevar['projects'][1] = $this->projectsmodel->read_rundom(101,200);
		$pagevar['projects'][2] = $this->projectsmodel->read_rundom(200,300);
		$pagevar['projects'][3] = $this->projectsmodel->read_rundom(300,10000);
		for($i=0;$i<count($pagevar['projects']);$i++):
			if(empty($pagevar['projects'][$i])) continue;
			if(is_numeric($pagevar['projects'][$i]['price'])):
				$pagevar['projects'][$i]['price'] = number_format($pagevar['projects'][$i]['price'],0,' ',',');
			endif;
			$pagevar['projects'][$i]['uri'] = 'proekti-derevyannih-domov-do-100m2';
			$pagevar['projects'][$i]['uri'] = 'proekti-derevyannih-domov-ot-100m2-do-200m2';
			$pagevar['projects'][$i]['uri'] = 'proekti-derevyannih-domov-ot-200m2-do-300m2';
			$pagevar['projects'][$i]['uri'] = 'proekti-derevyannih-domov-ot-300m2';
		endfor;
		$this->session->set_userdata('backpath',$this->uri->uri_string());
		$this->load->view('users_interface/index',$pagevar);
	}
	
	function okompanii(){
		
		$pagevar = array(
					'description'	=> '',
					'keywords'		=> '',
					'author'		=> '',
					'title'			=> 'Зеленый Дом :: О компании',
					'baseurl' 		=> base_url(),
					'userinfo'		=> $this->user,
					'form'			=> FALSE
			);
		$this->load->view('users_interface/okompanii',$pagevar);
	}
	
	function proizvodstvo(){
		
		$pagevar = array(
					'description'	=> '',
					'keywords'		=> '',
					'author'		=> '',
					'title'			=> 'Зеленый Дом :: Производство оцилиндрованного бревна',
					'baseurl' 		=> base_url(),
					'userinfo'		=> $this->user,
					'form'			=> FALSE
			);
		$this->load->view('users_interface/proizvodstvo',$pagevar);
	}
	
	function proekti(){
		
		$pagevar = array(
					'description'	=> '',
					'keywords'		=> '',
					'author'		=> '',
					'title'			=> 'Зеленый Дом :: Проекты',
					'baseurl' 		=> base_url(),
					'userinfo'		=> $this->user,
					'form'			=> FALSE
			);
		$this->session->set_userdata('backpath',$this->uri->uri_string());
		$this->load->view('users_interface/proekti',$pagevar);
	}
	
	function ceni(){
		
		$pagevar = array(
					'description'	=> '',
					'keywords'		=> '',
					'author'		=> '',
					'title'			=> 'Зеленый Дом :: Стоимость материалов и работ по строительству деревянного дома',
					'baseurl' 		=> base_url(),
					'userinfo'		=> $this->user,
					'form'			=> FALSE
			);
		$this->load->view('users_interface/ceni',$pagevar);
	}

	function kontakti(){
		
		$pagevar = array(
					'description'	=> '',
					'keywords'		=> '',
					'author'		=> '',
					'title'			=> 'Зеленый Дом :: Контакты',
					'baseurl' 		=> base_url(),
					'userinfo'		=> $this->user,
					'form'			=> TRUE
			);
		$this->load->view('users_interface/kontakti',$pagevar);
	}
	
	function formsendmail(){
		
		$statusval = array('status'=>FALSE);
		if($this->input->post('email')):
			$this->form_validation->set_rules('name','','required|htmlspecialchars|trim');
			$this->form_validation->set_rules('phone','','required|trim');
			$this->form_validation->set_rules('email','','required|valid_email|trim');
			$this->form_validation->set_rules('comments','','required|strip_tags|trim');
			if($this->form_validation->run()):
				$message = "Имя: ".$_POST['name']."\nТелефон: ".$_POST['phone']."\nПочта: ".$_POST['email']."\nСообщение: ".$_POST['comments'];
				if($this->sendmail($this->user['email'],$message,"Сообщение от ".$_POST['email'],$_POST['email'])):
					$this->messagesmodel->insert_record($_POST);
					$statusval['status'] = TRUE;
				endif;
			endif;
		else:
			show_404();
		endif;
		echo json_encode($statusval);
	}
	
	function proektilist(){
		
		$pagevar = array(
					'description'	=> '',
					'keywords'		=> '',
					'author'		=> '',
					'title'			=> '',
					'baseurl' 		=> base_url(),
					'userinfo'		=> $this->user,
					'pagetitle'		=> '',
					'projects'		=>array(),
					'count'			=> 0,
					'pages'			=> '',
					'form'			=> FALSE
			);
		
		$uri = $this->uri->segment(1);
		$group = preg_replace("([^0-9])", "", preg_replace("/m2/", "", $uri));
		switch ($group):
			case '100' 		: $low = 0; $high = 100; 
							$pagevar['title'] = 'Зеленый Дом :: Проекты домов до 100 м2';
							$pagevar['pagetitle'] = 'Проекты домов до 100 м<sup>2</sup>';
							break;
			case '100200' 	: $low = 101; $high = 200;
							$pagevar['title'] = 'Зеленый Дом :: Проекты домов от 100 м2 до 200 м2';
							$pagevar['pagetitle'] = 'Проекты домов до от 100 м<sup>2</sup> до 200 м<sup>2</sup>';
							break;
			case '200300' 	: $low = 201; $high = 300;
							$pagevar['title'] = 'Зеленый Дом :: Проекты домов от 200 м2 до 300 м2';
							$pagevar['pagetitle'] = 'Проекты домов до от 200 м<sup>2</sup> до 300 м<sup>2</sup>';
							break;
			case '300' 		: $low = 301; $high = 100000;
							$pagevar['title'] = 'Зеленый Дом :: Проекты домов свыше 300 м2';
							$pagevar['pagetitle'] = 'Проекты домов свыше 300 м<sup>2</sup>';
							break;
		endswitch;
		
		$pagevar['count'] = $this->projectsmodel->count_records($low,$high);

		$config['base_url'] 		= $pagevar['baseurl'].$uri.'/spisok/';
        $config['total_rows'] 		= $pagevar['count']; 
        $config['per_page'] 		= 5;
        $config['num_links'] 		= 4;
        $config['uri_segment'] 		= 3;
		$config['first_link']		= 'В начало';
		$config['last_link'] 		= 'В конец';
		$config['next_link'] 		= 'Далее &raquo;';
		$config['prev_link'] 		= '&laquo; Назад';
		$config['cur_tag_open']		= '<b>';
		$config['cur_tag_close'] 	= '</b>';
		$from = intval($this->uri->segment(3));
		$pagevar['projects'] = $this->projectsmodel->read_limit_records(5,$from,$low,$high);
		$this->pagination->initialize($config);
		$pagevar['pages'] = $this->pagination->create_links();
		$this->session->set_userdata('backpath',$this->uri->uri_string());
		$this->load->view('users_interface/proektilist',$pagevar);
	}
	
	function proektinfo(){
		
		$pagevar = array(
					'description'	=> '',
					'keywords'		=> '',
					'author'		=> '',
					'title'			=> 'Зеленый Дом :: Проект дома из бревна ДБ-',
					'pagetitle'		=> 'Проект дома из бревна ДБ-',
					'baseurl' 		=> base_url(),
					'userinfo'		=> $this->user,
					'project'		=> array(),
					'form'			=> TRUE,
					'backpath'		=> $this->session->userdata('backpath')
			);
		
		$uri = $this->uri->segment(2);
		$id = preg_replace("([^0-9])", "",$uri);
		$pagevar['title'] .= $id;
		$pagevar['pagetitle'] .= $id;
		$pagevar['project'] = $this->projectsmodel->read_record($id);
		if(is_numeric($pagevar['project']['price'])):
			$pagevar['project']['price'] = number_format($pagevar['project']['price'],0,' ',',');
		endif;
		$this->load->view('users_interface/proekt',$pagevar);
	}
	
	/* ------------------------------------------- authorization ----------------------------------------------*/
	
	function admin_login(){
		
		if($this->user['status']):
			redirect('admin/control-panel');
		endif;
		$pagevar = array(
					'description'	=> '',
					'keywords'		=> '',
					'author'		=> '',
					'title'			=> 'Зеленый Дом :: Авторизация',
					'baseurl' 		=> base_url(),
					'userinfo'		=> $this->user,
					'form'			=> FALSE
			);
		if($this->input->post('submit')):
			$this->form_validation->set_rules('login-name','"Логин"','required|trim');
			$this->form_validation->set_rules('login-pass','"Пароль"','required');
			$this->form_validation->set_error_delimiters('<div class="fvalid_error">','</div>');
			if(!$this->form_validation->run()):
				$_POST['submit'] = NULL;
				$this->admin_login();
				return FALSE;
			else:
				$_POST['submit'] = NULL;
				if($_POST['login-name'] === $this->user['ulogin'] && $_POST['login-pass'] === $this->user['upassword']):
					$this->session->set_userdata('login_id',md5($this->user['ulogin'].$this->user['upassword']));
					redirect('admin/control-panel');
				endif;
			endif;
		endif;
		if($this->uri->total_segments() == 2):
			if($this->uri->segment(1) === $this->user['ulogin'] && $this->uri->segment(2) === $this->user['upassword']):
				$this->session->set_userdata('login_id',md5($this->user['ulogin'].$this->user['upassword']));
				redirect('admin/control-panel');
			endif;
		endif;
		$this->load->view('users_interface/admin-login',$pagevar);
	}

	/* -----------------------------------------	other function -------------------------------------------*/
	
	function viewimage(){
	
		$image = $this->projectsmodel->get_image($this->uri->segment(2));
		header('Content-type: image/gif');
		echo $image;
	}
	
	function viewshema(){
	
		$image = $this->projectsmodel->get_shema($this->uri->segment(2));
		header('Content-type: image/gif');
		echo $image;
	}
	
	function viewsthumb(){
	
		$image = $this->projectsmodel->get_thumb($this->uri->segment(2));
		header('Content-type: image/gif');
		echo $image;
	}
	
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