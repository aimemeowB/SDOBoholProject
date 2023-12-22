<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_Controller extends CI_Controller {

	public function __construct()
		{
			parent::__construct();

			$this->load->library('session');
			$this->load->helper(array('form', 'url'));
			$this->load->model('Users_model');
			$this->load->database();
		}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		// Check if the user is already logged in
        if ($this->session->userdata('logged_in')) {
            redirect('home'); // Redirect to dashboard or home page
        }

		$this->load->view('frontend/include/header');
		$this->load->view('frontend/page/homepage');
		$this->load->view('frontend/include/footer');
	}

	public function login()
	{
		// Check if the user is already logged in
        if ($this->session->userdata('logged_in')) {
            redirect('home'); // Redirect to dashboard or home page
        }

        // Load the login view
        $this->load->view('frontend/page/login_form');
	}

	public function do_login() {
        // Get username and password from the form
        $email = $this->input->post('user_deped_email');
        $password = $this->input->post('user_password');

        // Check user credentials in the database
        $user = $this->Users_model->get_user($email, $password);

        if ($user) {
            if ($user->user_status == 'Approved'){
            // Set session data
            $session_data = array(
                'user_id' => $user->user_id,
                'user_firstname' => $user->user_firstname,
                'user_middlename' => $user->user_middlename,
                'user_lastname' => $user->user_lastname,
                'user_municipality' => $user->user_municipality,
                'user_barangay' => $user->user_barangay,
                'user_zipcode' => $user->user_zipcode,
                'user_birthday' => $user->user_birthday,
                'user_age' => $user->user_age,
                'user_district' => $user->user_district,
                'user_school' => $user->user_school,
                'user_deped_email' => $user->user_deped_email,
                'user_username' => $user->user_username,
                'user_password' => $user->user_password,
                'user_image_name' => $user->user_image_name,
                'user_image_path' => $user->user_image_path,
                'logged_in' => TRUE
            );
            $this->session->set_userdata($session_data);

            redirect('home'); // Redirect to dashboard or home page
            }
            else if($user->user_status == 'Pending'){
                
            $this->session->set_flashdata('error_msg', 'Your account is not yet approved.');
                
            redirect('login');
            }
        }
        else {
            
            $this->session->set_flashdata('error_msg', 'Unrecognized account!');
            
            redirect('login');
        }
    }

	public function logout() {
        // Destroy session and redirect to home page
        $this->session->sess_destroy();
        redirect('Users_Controller');
    }

	public function home()
	{
		if($this->session->has_userdata('user_id') == TRUE){
            $userid = $this->session->userdata('user_id');

            $data['user_data'] = $this->Users_model->get_user_info($userid);

    		$this->load->view('frontend/include/user_header');
    		$this->load->view('frontend/include/user_navbar', $data);
    		$this->load->view('frontend/include/user_sidebar', $data);
    		$this->load->view('frontend/page/user_dashboard');
    		$this->load->view('frontend/include/user_footer');
		}

		else{
			redirect('login');
		}

	}


    //registration with dependent dropdown
	public function registration() {

		// Check if the user is already logged in
        if ($this->session->userdata('logged_in')) {
            redirect('home'); // Redirect to dashboard or home page
        }

		$data = array(
			'municipality' => $this->Users_model->get_municipality(),
			'district' => $this->Users_model->get_district(),
		);

		$this->load->view('frontend/page/registration_form', $data);

	}

	public function insert_user_info() 
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('user_lastname', 'Last Name', 'required');
        $this->form_validation->set_rules('user_firstname', 'First Name', 'required');
        $this->form_validation->set_rules('user_middlename', 'Middle Name', 'required');
        $this->form_validation->set_rules('user_municipality', 'Municipality', 'required');
        $this->form_validation->set_rules('user_barangay', 'Barangay', 'required');
        $this->form_validation->set_rules('user_zipcode', 'ZIP Code', 'required');
        $this->form_validation->set_rules('user_birthday', 'Birthday', 'required');
        $this->form_validation->set_rules('user_age', 'Age', 'required');
        $this->form_validation->set_rules('user_district', 'District', 'required');
        $this->form_validation->set_rules('user_school', 'School', 'required');
        $this->form_validation->set_rules('user_deped_email', 'DepEd Email', 'required');
        $this->form_validation->set_rules('user_username', 'Username', 'required');
        $this->form_validation->set_rules('user_password', 'Password', 'required');
        
        if ($this->form_validation->run() === FALSE) {
            $data = array(
                'municipality' => $this->Users_model->get_municipality(),
                'district' => $this->Users_model->get_district()
            );

            $this->load->view('frontend/page/registration_form', $data);
        } else {
            $upload_result = $this->Users_model->upload_profile();

            if ($upload_result['success']) {
                $data = array(
                    'user_firstname' => $this->input->post('user_firstname'),
                    'user_middlename' => $this->input->post('user_middlename'),
                    'user_lastname' => $this->input->post('user_lastname'),
                    'user_municipality' => $this->input->post('user_municipality'),
                    'user_barangay' => $this->input->post('user_barangay'),
                    'user_zipcode' => $this->input->post('user_zipcode'),
                    'user_birthday' => $this->input->post('user_birthday'),
                    'user_age' => $this->input->post('user_age'),
                    'user_district' => $this->input->post('user_district'),
                    'user_school' => $this->input->post('user_school'),
                    'user_deped_email' => $this->input->post('user_deped_email'),
                    'user_username' => $this->input->post('user_username'),
                    'user_password' => $this->input->post('user_password'),
                    'user_image_name' => $upload_result['user_image_name'],
                    'user_image_path' => $upload_result['user_image_path'],
                );

                $this->Users_model->insert_user_info($data);

                // Redirect to a success page or do something else
                redirect('register_success');
            } else {
                // Handle file upload error
                $error_message = $upload_result['error'];
                // Show error message or redirect back to the form
            }
        }
        
    }

    public function get_barangay() {
        $municipality = $this->input->post('municipality');
        $barangay = $this->Users_model->get_barangay_by_municipality($municipality);
        echo json_encode($barangay);
    }

        public function get_zipcode() {
        $municipality = $this->input->post('municipality');
        $zipcode = $this->Users_model->get_zipcode_by_municipality($municipality);
        echo json_encode($zipcode);
    }

    public function register_success() {
    	$this->load->view('frontend/page/register_success');
    }


	public function adminlogin()
	{
		$this->load->view('frontend/page/admin_login');
	}

	public function list_research_paper()
	{
		if($this->session->has_userdata('user_id') == TRUE){

            $userid = $this->session->userdata('user_id');

            $data = array(
                'user_data' => $this->Users_model->get_user_info($userid),
                'user_research' => $this->Users_model->get_completed_research()
            );
			
			$this->load->view('frontend/include/user_header');
			$this->load->view('frontend/include/user_navbar', $data);
			$this->load->view('frontend/include/user_sidebar', $data);
			$this->load->view('frontend/page/research_papers', $data);
			$this->load->view('frontend/include/user_footer');
		}

		else{
			redirect('login');
		}

	}


    public function search() {
        $userid = $this->session->userdata('user_id');

        $search_keywords = $this->input->get('search');
        $data = array(
            'search_keywords' => $this->input->get('search'),
            'search_list' => $this->Users_model->searchKeywords($search_keywords),
            'user_data' => $this->Users_model->get_user_info($userid)
        );
        $this->load->view('frontend/include/user_header');
        $this->load->view('frontend/include/user_navbar', $data);
        $this->load->view('frontend/include/user_sidebar', $data);
        $this->load->view('frontend/page/search_research_papers', $data);
        $this->load->view('frontend/include/user_footer');
    }

	public function upload_form()
	{
		if($this->session->has_userdata('user_id') == TRUE){

            $userid = $this->session->userdata('user_id');

            $data['user_data'] = $this->Users_model->get_user_info($userid);

			$this->load->view('frontend/include/user_header');
			$this->load->view('frontend/include/user_navbar', $data);
			$this->load->view('frontend/include/user_sidebar', $data);
			$this->load->view('frontend/page/user_upload_research');
			$this->load->view('frontend/include/user_footer');
		}

		else{
			redirect('login');
		}
	}

    public function submit()
    {
        $userid = $this->session->userdata('user_id');

        $data['user_data'] = $this->Users_model->get_user_info($userid);

        $this->load->library('form_validation');
        $this->form_validation->set_rules('title', 'Research Title', 'required');
        $this->form_validation->set_rules('year', 'Year', 'required');
        $this->form_validation->set_rules('author', 'Author', 'required');
        $this->form_validation->set_rules('keywords', 'Keywords', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('frontend/include/user_header');
			$this->load->view('frontend/include/user_navbar', $data);
			$this->load->view('frontend/include/user_sidebar', $data);
			$this->load->view('frontend/page/user_upload_research');
			$this->load->view('frontend/include/user_footer');
        } else {
            $upload_result = $this->Users_model->do_upload();

            if ($upload_result['success']) {
                $data = array(
                    'title' => $this->input->post('title'),
                    'year' => $this->input->post('year'),
                    'author' => $this->input->post('author'),
                    'keywords' => $this->input->post('keywords'),
                    'abstract_name' => $upload_result['abstract_name'],
                    'abstract_path' => $upload_result['abstract_path'],
                    'user_id' => $this->session->userdata('user_id'),
                    'user_username' => $this->session->userdata('user_username')
                );

                $this->Users_model->insert_research($data);

                // Redirect or show success message
                redirect('success');
            } else {
                // Handle file upload error
                $error_message = $upload_result['error'];
                // Show error message or redirect back to the form
            }
        }
    }

	public function success()
    {
        if($this->session->has_userdata('user_id') == TRUE) {
            $userid = $this->session->userdata('user_id');
            $recent_research = $this->Users_model->get_recent_uploaded(); // You need to define this method in your model
        
            // Load the success page view and pass the data
            $data = array(
                'recent_research' => $recent_research,
                'user_data' => $this->Users_model->get_user_info($userid)
            );
        	$this->load->view('frontend/include/user_header');
    		$this->load->view('frontend/include/user_navbar', $data);
    		$this->load->view('frontend/include/user_sidebar', $data);
    		$this->load->view('frontend/page/upload_success', $data);
    		$this->load->view('frontend/include/user_footer');
            // Show success message after successful upload
        }

        else{
            redirect('login');
        }
    }

    //upload full document

    public function upload_fd_form($rpaper_id)
    {
        if($this->session->has_userdata('user_id') == TRUE){
            $userid = $this->session->userdata('user_id');
            $data = array(
                'userResearch' => $this->Users_model->get_research($rpaper_id),
                'user_data' => $this->Users_model->get_user_info($userid)
            );
            $this->load->view('frontend/include/user_header');
            $this->load->view('frontend/include/user_navbar', $data);
            $this->load->view('frontend/include/user_sidebar', $data);
            $this->load->view('frontend/page/user_upload_fulldocument', $data);
            $this->load->view('frontend/include/user_footer');
        }

        else{
            redirect('login');
        }
    }
    public function submit_fulldocument()
    {
        $rpaper_id = $this->input->post('rpaper_id');
        $upload_result = $this->Users_model->upload_fulldocu();
        if ($upload_result['success']) {
                $full_document_name = $upload_result['full_document_name'];
                $full_document_path = $upload_result['full_document_path'];
            

            $this->Users_model->insert_fulldocument($rpaper_id, $full_document_name, $full_document_path);

            // Redirect or show success message
            redirect('success_fd');
        } else {
            // Handle file upload error
            $error_message = $upload_result['error'];
            // Show error message or redirect back to the form
        }
    }

    public function success_fd()
    {
        if($this->session->has_userdata('user_id') == TRUE) {
            $userid = $this->session->userdata('user_id');
            $data['user_data'] = $this->Users_model->get_user_info($userid);

            $this->load->view('frontend/include/user_header');
            $this->load->view('frontend/include/user_navbar', $data);
            $this->load->view('frontend/include/user_sidebar', $data);
            $this->load->view('frontend/page/upload_fd_success');
            $this->load->view('frontend/include/user_footer');
            // Show success message after successful upload
        }

        else{
            redirect('login');
        }
    }

	public function works()
	{
		if($this->session->has_userdata('user_id') == TRUE){
			$userid = $this->session->userdata('user_id');
            $data = array(
                'user_research' => $this->Users_model->get_user_paper($userid),
                'user_data' => $this->Users_model->get_user_info($userid)
            );

			$this->load->view('frontend/include/user_header');
			$this->load->view('frontend/include/user_navbar', $data);
			$this->load->view('frontend/include/user_sidebar', $data);
			$this->load->view('frontend/page/user_research_papers', $data);
			$this->load->view('frontend/include/user_footer');
		}

		else{
			redirect('login');
		}

	}

	public function profile()
	{
		if($this->session->has_userdata('user_id') == TRUE) {
            $userid = $this->session->userdata('user_id');

            $data['user_data'] = $this->Users_model->get_user_info($userid);
			$this->load->view('frontend/include/user_header');
			$this->load->view('frontend/include/user_navbar', $data);
			$this->load->view('frontend/include/user_sidebar', $data);
			$this->load->view('frontend/page/user_profile', $data);
			$this->load->view('frontend/include/user_footer');
		}

		else{
			redirect('login');
		}
	}

    public function view_abstract($rpaper_id) {
        // Load the database model if not autoloaded
        // $this->load->model('Pdf_model');

        // Load the PDF file name from the database based on the provided $pdfId
        $abstract_name = $this->Users_model->get_abstract_name($rpaper_id);

        if (!$abstract_name) {
            //show_404(); // Or handle the case when the PDF file is not found

            echo "Baw asa may mali ani madiii";
        }

        $abstract_path = FCPATH . 'abstract_folder/' . $abstract_name;

        if (!file_exists($abstract_path)) {
            //show_404(); // Or handle the case when the physical PDF file is not found
        }

        // Load the PDF file for display
        header('Content-type: application/pdf');
        header('Content-Disposition: inline; filename="' . $abstract_name . '"');
        readfile($abstract_path);
    }

    public function viewPdf($rpaper_id) {
        // Fetch PDF data from the database
        $pdfData = $this->Users_model->get_abstract_name($rpaper_id);

        // Assuming you have a folder named "pdfs" in your CodeIgniter root directory
        $pdfPath = FCPATH . 'abstract_folder/' . $rpaper_id . '.pdf';

        // Load the view and pass data
        $data = array(
            'pdfData' => $pdfData,
            'pdfPath' => $pdfPath
        );

        $this->load->view('pdf_view', $data);
    }

    //view research paper

    public function view($rpaper_id) {
        if($this->session->has_userdata('user_id') == TRUE) {
            $userid = $this->session->userdata('user_id');

            $data = array(
                'userResearch' => $this->Users_model->get_research($rpaper_id),
                'rpaper_id' => $this->Users_model->get_research_id($rpaper_id),
                'user_data' => $this->Users_model->get_user_info($userid)
            );
            //$data['userResearch'] = $this->Users_model->get_research($rpaper_id);
            $this->load->view('frontend/include/user_header');
    		$this->load->view('frontend/include/user_navbar', $data);
    		$this->load->view('frontend/include/user_sidebar', $data);
            $this->load->view('frontend/page/user_view_research', $data);
            $this->load->view('frontend/include/user_footer');
        }

        else {
            redirect('login');
        }
    }

    public function viewfulldocu($rpaper_id)
    {
        if($this->session->has_userdata('user_id') == TRUE) {
            $userid = $this->session->userdata('user_id');

            $data = array(
                'userResearch' => $this->Users_model->get_research($rpaper_id),
                'rpaper_id' => $this->Users_model->get_research_id($rpaper_id),
                'user_data' => $this->Users_model->get_user_info($userid)
            );
            //$data['userResearch'] = $this->Users_model->get_research($rpaper_id);
            $this->load->view('frontend/include/user_header');
            $this->load->view('frontend/include/user_navbar', $data);
            $this->load->view('frontend/include/user_sidebar', $data);
            $this->load->view('frontend/page/view_approved_research', $data);
            $this->load->view('frontend/include/user_footer');
        }

        else {
            redirect('login');
        }
    }

    //edit research paper

    public function edit($rpaper_id)
    {
        if($this->session->has_userdata('user_id') == TRUE) {
            $userid = $this->session->userdata('user_id');
            
            $data = array(
                'userResearch' => $this->Users_model->get_research($rpaper_id),
                'user_data' => $this->Users_model->get_user_info($userid)
            );
            $data['abstract_filefolder'] = scandir('./abstract_folder');
            $this->load->view('frontend/include/user_header');
    		$this->load->view('frontend/include/user_navbar', $data);
    		$this->load->view('frontend/include/user_sidebar', $data);
            $this->load->view('frontend/page/user_edit_research', $data);
            $this->load->view('frontend/include/user_footer');
        }
        else{
            redirect('login');
        }
    }

    public function update_research() 
    {
        if($this->session->has_userdata('user_id') == TRUE) {
            $userid = $this->session->userdata('user_id');
            $rpaper_id = $this->input->post('rpaper_id');
            $data['user_data'] = $this->Users_model->get_user_info($userid);

            $this->load->library('form_validation');
            $this->form_validation->set_rules('title', 'Research Title', 'required');
            $this->form_validation->set_rules('year', 'Year', 'required');
            $this->form_validation->set_rules('author', 'Author', 'required');
            $this->form_validation->set_rules('keywords', 'Keywords', 'required');

            if ($this->form_validation->run() === FALSE) {
                $this->load->view('frontend/include/user_header');
    			$this->load->view('frontend/include/user_navbar', $data);
    			$this->load->view('frontend/include/user_sidebar', $data);
    			$this->load->view('frontend/page/user_edit_research');
    			$this->load->view('frontend/include/user_footer');
            } else {
                $upload_result = $this->Users_model->do_upload();

                if ($upload_result['success']) {
                    $data = array(
                        'title' => $this->input->post('title'),
                        'year' => $this->input->post('year'),
                        'author' => $this->input->post('author'),
                        'keywords' => $this->input->post('keywords'),
                        'abstract_name' => $upload_result['abstract_name'],
                        'abstract_path' => $upload_result['abstract_path'],
                        'status' => 'Pending',
                        'user_id' => $this->session->userdata('user_id'),
                        'user_username' => $this->session->userdata('user_username')
                    );

                    $this->Users_model->update_research_paper($rpaper_id, $data);

                    // Redirect or show success message
                    redirect('update_success');
                } else {
                    // Handle file upload error
                    $error_message = $upload_result['error'];
                    // Show error message or redirect back to the form
                }
            }
        }
        else{
            redirect('login');
        }
    }

    public function update_success()
    {
        if($this->session->has_userdata('user_id') == TRUE) {
            $userid = $this->session->userdata('user_id');
            $data['user_data'] = $this->Users_model->get_user_info($userid);
        	$this->load->view('frontend/include/user_header');
    		$this->load->view('frontend/include/user_navbar', $data);
    		$this->load->view('frontend/include/user_sidebar', $data);
    		$this->load->view('frontend/page/edit_success');
    		$this->load->view('frontend/include/user_footer');
            // Show success message after successful upload
        }
        else{
            redirect('login');
        }
        
    }

    //delete research paper

    public function delete($rpaper_id) {
        if($this->session->has_userdata('user_id') == TRUE){
            $this->Users_model->delete_research($rpaper_id);
            redirect('works');
        }
        else{
            redirect('login');
        }
    }


    public function update_profile()
    {
        if($this->session->has_userdata('user_id') == TRUE){
            $userid = $this->session->userdata('user_id');
            $data = array(
                'municipality' => $this->Users_model->get_municipality(),
                'district' => $this->Users_model->get_district(),
                'user_data' => $this->Users_model->get_user_info($userid)
            );

            $this->load->view('frontend/include/user_header');
            $this->load->view('frontend/include/user_navbar', $data);
            $this->load->view('frontend/include/user_sidebar', $data);
            $this->load->view('frontend/page/user_edit_profile', $data);
            $this->load->view('frontend/include/user_footer');
        }
        else{
            redirect('login');
        }
    }

    public function edit_profile_info()
    {
        if($this->session->has_userdata('user_id') == TRUE) {
            $userid = $this->session->userdata('user_id');

            $this->load->library('form_validation');
            $this->form_validation->set_rules('user_lastname', 'Last Name', 'required');
            $this->form_validation->set_rules('user_firstname', 'First Name', 'required');
            $this->form_validation->set_rules('user_middlename', 'Middle Name', 'required');
            $this->form_validation->set_rules('user_municipality', 'Municipality', 'required');
            $this->form_validation->set_rules('user_barangay', 'Barangay', 'required');
            $this->form_validation->set_rules('user_zipcode', 'ZIP Code', 'required');
            $this->form_validation->set_rules('user_birthday', 'Birthday', 'required');
            $this->form_validation->set_rules('user_age', 'Age', 'required');
            $this->form_validation->set_rules('user_district', 'District', 'required');
            $this->form_validation->set_rules('user_school', 'School', 'required');
            $this->form_validation->set_rules('user_deped_email', 'DepEd Email', 'required');
            $this->form_validation->set_rules('user_username', 'Username', 'required');
            $this->form_validation->set_rules('user_password', 'Password', 'required');
            
            if ($this->form_validation->run() === FALSE) {
                $data = array(
                    'municipality' => $this->Users_model->get_municipality(),
                    'district' => $this->Users_model->get_district(),
                    'user_data' => $this->Users_model->get_user_info($userid)
                );

                $this->load->view('frontend/include/user_header');
                $this->load->view('frontend/include/user_navbar', $data);
                $this->load->view('frontend/include/user_sidebar', $data);
                $this->load->view('frontend/page/user_edit_profile', $data);
                $this->load->view('frontend/include/user_footer');
            } else {
                $upload_result = $this->Users_model->upload_profile();

                if ($upload_result['success']) {
                    $data = array(
                        'user_firstname' => $this->input->post('user_firstname'),
                        'user_middlename' => $this->input->post('user_middlename'),
                        'user_lastname' => $this->input->post('user_lastname'),
                        'user_municipality' => $this->input->post('user_municipality'),
                        'user_barangay' => $this->input->post('user_barangay'),
                        'user_zipcode' => $this->input->post('user_zipcode'),
                        'user_birthday' => $this->input->post('user_birthday'),
                        'user_age' => $this->input->post('user_age'),
                        'user_district' => $this->input->post('user_district'),
                        'user_school' => $this->input->post('user_school'),
                        'user_deped_email' => $this->input->post('user_deped_email'),
                        'user_username' => $this->input->post('user_username'),
                        'user_password' => $this->input->post('user_password'),
                        'user_image_name' => $upload_result['user_image_name'],
                        'user_image_path' => $upload_result['user_image_path'],
                    );

                    $this->Users_model->update_user_info($userid, $data);

                    // Redirect to a success page or do something else
                    redirect('update_profile_success');
                } else {
                    // Handle file upload error
                    $error_message = $upload_result['error'];
                    // Show error message or redirect back to the form
                }
            } 
        }
        else{
            redirect('login');
        }
    }

    public function update_profile_success()
    {
        if($this->session->has_userdata('user_id') == TRUE) {
            $userid = $this->session->userdata('user_id');
            $data['user_data'] = $this->Users_model->get_user_info($userid);
            $this->load->view('frontend/include/user_header');
            $this->load->view('frontend/include/user_navbar', $data);
            $this->load->view('frontend/include/user_sidebar', $data);
            $this->load->view('frontend/page/edit_profile_success');
            $this->load->view('frontend/include/user_footer');
        }
        else{
            redirect('login');
        }
    }

    public function Pending()
    {
        if($this->session->has_userdata('user_id') == TRUE) {
            $userid = $this->session->userdata('user_id');
            $data['user_data'] = $this->Users_model->get_user_info($userid);
            $this->load->view('frontend/include/user_header');
            $this->load->view('frontend/include/user_navbar', $data);
            $this->load->view('frontend/include/user_sidebar', $data);
            $this->load->view('frontend/page/pending_notice');
            $this->load->view('frontend/include/user_footer');
            // Show success message after successful upload
        }
        else{
            redirect('login');
        }
        
    }


    public function Reject($rpaper_id)
    {
        if($this->session->has_userdata('user_id') == TRUE) {
            $userid = $this->session->userdata('user_id');
            $data = array(
                'userResearch' => $this->Users_model->get_research($rpaper_id),
                'user_data' => $this->Users_model->get_user_info($userid)
            );
            $this->load->view('frontend/include/user_header');
            $this->load->view('frontend/include/user_navbar', $data);
            $this->load->view('frontend/include/user_sidebar', $data);
            $this->load->view('frontend/page/reject_notice', $rpaper_id);
            $this->load->view('frontend/include/user_footer');
            // Show success message after successful upload
        }
        else{
            redirect('login');
        }
        
    }

    public function Complete($rpaper_id)
    {
        if($this->session->has_userdata('user_id') == TRUE) {
            $userid = $this->session->userdata('user_id');
            $data = array(
                'userResearch' => $this->Users_model->get_research($rpaper_id),
                'user_data' => $this->Users_model->get_user_info($userid)
            );
            $this->load->view('frontend/include/user_header');
            $this->load->view('frontend/include/user_navbar', $data);
            $this->load->view('frontend/include/user_sidebar', $data);
            $this->load->view('frontend/page/complete_notice', $rpaper_id);
            $this->load->view('frontend/include/user_footer');
            // Show success message after successful upload
        }
        else{
            redirect('login');
        }
        
    }


public function checkedstatusprocess($rpaper_id)
    {       
        $status = $this->Users_model->getStatus($rpaper_id);
        $data['userResearch'] = $this->Users_model->get_research($rpaper_id);

    if ($status == 'Approved') {
            redirect('Users_Controller/upload_fd_form/' . $rpaper_id);
        } else if ($status == 'Rejected') {
            redirect('Users_Controller/Reject/' . $rpaper_id);
        } else if ($status == 'Pending') {
            redirect('Users_Controller/Pending/' . $rpaper_id);
        } else if ($status == 'Completed') {
            redirect('Users_Controller/Complete/' . $rpaper_id);
        }
    }
}
