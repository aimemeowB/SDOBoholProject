<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		 $this->load->library('session');
		$this->load->model('Admin_users_model');

	}


	public function index()
	{
		if (isset($_POST['login_btn'])) {
			$email= $this->input->post('user_email');
			$pw= $this->input->post('user_password');

			$user_data=$this->Admin_users_model->authenticate($email);

			if (!empty($user_data)== TRUE) {
				if ($user_data[0]->admin_password == $pw) {
					$userdata = array(
										'user_id' 	=> $user_data[0]->admin_id,
										'fullname' 	=> $user_data[0]->fullname,
										'email' 	=> $user_data[0]->email,
										'contact' 	=> $user_data[0]->contact,


									);
					$this->session->set_userdata($userdata);
					redirect('dashboard');
				}else {
					$this->session->set_flashdata('msg_login','Invalid Password. Please try again.');
				}

			}else {
				$this->session->set_flashdata('msg_login','Account not found. Please try again.');
				// code...
			}
		}

		$this->load->view('backend/pages/login');
	}

	public function dashboard(){

		if (!$this->session->has_userdata('user_id')) {
            redirect('admin'); // Redirect to login page if not logged in
        }

		else {

				$this->load->view('backend/include/header');
				$this->load->view('backend/include/nav');
				$this->load->view('backend/pages/dashboard');
			    $this->load->view('backend/include/footer');
		}

	}

	public function users(){

		if (!$this->session->has_userdata('user_id')) {
            redirect('admin'); // Redirect to login page if not logged in
        }

		else {
			$data['user'] = $this->Admin_users_model->user_with_most_uploads();
			$this->load->view('backend/include/header');
			$this->load->view('backend/include/nav');
			$this->load->view('backend/pages/users', $data);
			$this->load->view('backend/include/footer');
		}

	}

	public function research_papers(){

		if (!$this->session->has_userdata('user_id')) {
            redirect('admin'); // Redirect to login page if not logged in
        }

		else {

				$this->load->view('backend/include/header');
				$this->load->view('backend/include/nav');
				$this->load->view('backend/pages/research_papers');
			    $this->load->view('backend/include/footer');
		}

	}

	public function create_admin() {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('fullname', 'Full Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');

		if (!$this->session->has_userdata('user_id')) {
            redirect('admin'); // Redirect to login page if not logged in
        }

		if ($this->form_validation->run() === FALSE) {
			// Validation failed, redirect back to the form
			$this->load->view('backend/include/header');
			$this->load->view('backend/include/nav');
			$this->load->view('backend/pages/create_admin');
			$this->load->view('backend/include/footer');
		} else {
			// Validation succeeded, proceed with data insertion
			$data = array(
				'fullname' => $this->input->post('fullname'),
				'email' => $this->input->post('email'),
				'password' => $this->input->post('password'),
				'status' => $this->input->post('status')
				
			);

			$result = $this->Admin_users_model->insert_data($data);

			if ($result) {
				// Data insertion was successful
				$this->session->set_flashdata('success', 'Data inserted successfully.');
			} else {
				// Data insertion failed
				$this->session->set_flashdata('error', 'Failed to insert data.');
			}

			// Redirect to a suitable page after the form submission
			redirect('create_admin');
		}

	}

	public function approveUser($id)
	{
		$this->Admin_users_model->approved($id,'Approved');
		redirect('not_veriusers');
	}

	public function denyUser($id)
	{
		$this->Admin_users_model->approved($id,'Denied');
		redirect('not_veriusers');
	}

	public function admin_table()
	{
	// Load the view to display the table with data
       	$data['veri_user'] = $this->Admin_users_model->get_verifieduser();
       	$this->load->view('backend/include/header');
		$this->load->view('backend/include/nav');
       	$this->load->view('backend/pages/admin_table',$data);
       	$this->load->view('backend/include/footer');
           
	}

	public function all_users()
	{
	// Load the view to display the table with data
       	$data['user'] = $this->Admin_users_model->get_allusers();
       	$this->load->view('backend/include/header');
		$this->load->view('backend/include/nav');
       	$this->load->view('backend/pages/all_users',$data);
       	$this->load->view('backend/include/footer');
           
	}
	
	public function not_veriusers()
	{
	// Load the view to display the table with data
       	$data['not_veriusers'] = $this->Admin_users_model->get_notverifieduser();
       	$this->load->view('backend/include/header');
		$this->load->view('backend/include/nav');
       	$this->load->view('backend/pages/Not_Verified_Users',$data);
       	$this->load->view('backend/include/footer');
	}

	public function denied_users()
	{
		// Load the view to display the table with data
       	$data['deniedusers'] = $this->Admin_users_model->get_denieduser();
       	$this->load->view('backend/include/header');
		$this->load->view('backend/include/nav');
       	$this->load->view('backend/pages/denied_users',$data);
       	$this->load->view('backend/include/footer');
	}

	public function deleteuser($user_id)
	{
		if($this->session->has_userdata('user_id') == TRUE){
            $this->Admin_users_model->delete($user_id);
            redirect('all_users');
        }
        else{
            redirect('admin');
        }
	}

	public function all_research_papers()
	{
		$data['all_research'] = $this->Admin_users_model->get_all_research_papers();
       	$this->load->view('backend/include/header');
		$this->load->view('backend/include/nav');
       	$this->load->view('backend/pages/all_research_papers',$data);
       	$this->load->view('backend/include/footer');
	}

	public function all_abstract()
	{
		$data['abstract'] = $this->Admin_users_model->get_all_abstract();
       	$this->load->view('backend/include/header');
		$this->load->view('backend/include/nav');
       	$this->load->view('backend/pages/abstract_list',$data);
       	$this->load->view('backend/include/footer');
	}

	public function all_fulldocument()
	{
		$data['fulldocument'] = $this->Admin_users_model->get_all_fulldocuments();
       	$this->load->view('backend/include/header');
		$this->load->view('backend/include/nav');
       	$this->load->view('backend/pages/fulldocument_list',$data);
       	$this->load->view('backend/include/footer');
	}

	public function completed_research_papers()
	{
		$data['completed_research'] = $this->Admin_users_model->get_completed_research();
       	$this->load->view('backend/include/header');
		$this->load->view('backend/include/nav');
       	$this->load->view('backend/pages/completed_research',$data);
       	$this->load->view('backend/include/footer');
	}

	public function rejected_research_papers()
	{
		$data['rejected_research'] = $this->Admin_users_model->get_rejected_research();
       	$this->load->view('backend/include/header');
		$this->load->view('backend/include/nav');
       	$this->load->view('backend/pages/rejected_abstract',$data);
       	$this->load->view('backend/include/footer');
	}

	public function Abstract_table()
	{
	// Load the view to display the table with data
       	$data['Abstract_table'] = $this->Admin_users_model->get_Abstract_table();
       	$this->load->view('backend/include/header');
		$this->load->view('backend/include/nav');
       	$this->load->view('backend/pages/Abstract_table',$data);
       	$this->load->view('backend/include/footer');
    }

    public function approved_abstract_table()
    {
    	// Load the view to display the table with data
       	$data['approved_abstract_table'] = $this->Admin_users_model->get_approved_abstract_table();
       	$this->load->view('backend/include/header');
		$this->load->view('backend/include/nav');
       	$this->load->view('backend/pages/approved_abstract_table',$data);
       	$this->load->view('backend/include/footer');
    }

    public function approveAbstract($id)
	{
		$this->Admin_users_model->approvedAbstract($id,'Approved');
		redirect('Abstract_table');

	}
	public function RejectAbstract($id)
	{
		$this->Admin_users_model->rejectAbstract($id,'Rejected');
		redirect('Abstract_table');
	}
	
	public function setting()
	{
		if (!$this->session->has_userdata('user_id')) {
			redirect('admin'); // Redirect to login page if not logged in
		}

		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			// Retrieve the form data
			$postData = array(
				'id' => $this->session->userdata('user_id'),
				'web_name' => $this->input->post('websiteName'),
				'about_us' => $this->input->post('aboutUs'),
				'contact' => $this->input->post('contactNo'),
				'location' => $this->input->post('location'),
				'email' => $this->input->post('email'),
			);

			// Update the data in the database
			$this->Admin_users_model->update_info($postData['id'], $postData);

			// Optionally, you can set flash messages to display success or error messages
			$this->session->set_flashdata('success', 'Data updated successfully');
			// Redirect to the same page to avoid form resubmission
			redirect('setting');
		} else {
			// Fetch the data from the database
			$info = $this->Admin_users_model->fetch_info();

			// Pass the retrieved data to the views
			$data['info'] = $info;
			$this->load->view('backend/include/header', $data);
			$this->load->view('backend/include/nav');
			$this->load->view('backend/pages/setting', $data);
			$this->load->view('backend/include/footer');
		}
	}

	public function register() {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('fullname', 'Full Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');

		if (!$this->session->has_userdata('user_id')) {
            redirect('admin'); // Redirect to login page if not logged in
        }

		if ($this->form_validation->run() === FALSE) {
			// Validation failed, redirect back to the form
			$this->load->view('backend/include/header');
			$this->load->view('backend/include/nav');
			$this->load->view('backend/pages/register');
			$this->load->view('backend/include/footer');
		} else {
			// Validation succeeded, proceed with data insertion
			$data = array(
				'fullname' => $this->input->post('fullname'),
				'email' => $this->input->post('email'),
				'password' => $this->input->post('password'),
				'status' => $this->input->post('status')
			);

			$result = $this->Admin_users_model->insert_users($data);

			if ($result) {
				// Data insertion was successful
				$this->session->set_flashdata('success', 'Data inserted successfully.');
			} else {
				// Data insertion failed
				$this->session->set_flashdata('error', 'Failed to insert data.');
			}

			// Redirect to a suitable page after the form submission
			redirect('register');
		}

	}

    public function view($rpaper_id) {
        if($this->session->has_userdata('user_id') == TRUE) {
        
            $data = array(
                'userResearch' => $this->Admin_users_model->get_research($rpaper_id),
                'rpaper_id' => $this->Admin_users_model->get_research_id($rpaper_id)
            );
            //$data['userResearch'] = $this->Users_model->get_research($rpaper_id);
           	$this->load->view('backend/include/header');
			$this->load->view('backend/include/nav');
            $this->load->view('backend/pages/View', $data);
            $this->load->view('backend/include/footer');
          
        }

        else {
            redirect('admin');
        }
    }

    public function view_2($rpaper_id) {
        if($this->session->has_userdata('user_id') == TRUE) {
        
            $data = array(
                'userResearch' => $this->Admin_users_model->get_research($rpaper_id),
                'rpaper_id' => $this->Admin_users_model->get_research_id($rpaper_id)
            );
            //$data['userResearch'] = $this->Users_model->get_research($rpaper_id);
           	$this->load->view('backend/include/header');
			$this->load->view('backend/include/nav');
            $this->load->view('backend/pages/View_2', $data);
            $this->load->view('backend/include/footer');
          
        }

        else {
            redirect('admin');
        }
    }

    public function view_fulldocu($rpaper_id) {
        if($this->session->has_userdata('user_id') == TRUE) {
        
            $data = array(
                'userResearch' => $this->Admin_users_model->get_research($rpaper_id),
                'rpaper_id' => $this->Admin_users_model->get_research_id($rpaper_id)
            );
            //$data['userResearch'] = $this->Users_model->get_research($rpaper_id);
           	$this->load->view('backend/include/header');
			$this->load->view('backend/include/nav');
            $this->load->view('backend/pages/view_fulldocu', $data);
            $this->load->view('backend/include/footer');
          
        }

        else {
            redirect('admin');
        }
    }
    
	 function logout()
	{

		session_destroy();
		redirect('admin');
	}

}
?>