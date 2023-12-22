<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model {

	public function __construct(){
		parent::__construct();

	}

	/*function insert_research_paper($title, $year, $author, $keywords, $abstract_name, $abstract_path)
		{
			$data = array(
	            'title' => $title,
	            'year' => $year,
	            'author' => $author,
	            'keywords' => $keywords,
	            'abstract_name' => $abstract_name,
	            'abstract_path' => $abstract_path

	        );
	        $this->db->insert('tblresearchpapers', $data);
		}*/

	function fetch_all_papers()
	{
		$this->db->order_by('title', 'ASC');
		$query = $this->db->get('tblresearchpapers');
		return $query->result();

	}

    public function get_approved_research() {
        $this->db->where('status', 'Approved');
        $query = $this->db->get('tblresearchpapers'); // Replace with your actual table name
        return $query->result();
    }

    public function get_completed_research() {
        $this->db->where('status', 'Completed');
        $query = $this->db->get('tblresearchpapers'); // Replace with your actual table name
        return $query->result();
    }

    public function searchKeywords($search_keywords) {
        $this->db->like('keywords', $search_keywords);
        $this->db->where('status', 'Completed');
        return $this->db->get('tblresearchpapers')->result();
    }

// upload abstract of research
	public function do_upload()
    {
        $config['upload_path'] = './abstract_folder/'; // Path to the upload directory
        $config['allowed_types'] = 'pdf'; // Allowed file types
        $config['max_size'] = 10240; // Maximum file size in KB
 
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('abstract_file')) {
            $error = array('error' => $this->upload->display_errors());
            return $error;
        } else {
            $data = array('upload_data' => $this->upload->data());
            return array(
                'success' => true,
                'abstract_name' => $data['upload_data']['file_name'],
                'abstract_path' => $config['upload_path'] . $data['upload_data']['file_name']
            );
        }
    }

    public function insert_research($data)
    {
        $this->db->insert('tblresearchpapers', $data); // Replace 'your_table_name' with your actual table name
    }

    public function get_recent_uploaded() {
        $this->db->order_by('rpaper_id', 'desc'); // Assuming you have an 'id' field for ordering
        
        $query = $this->db->get('tblresearchpapers', 1); // Get the latest inserted record
        
        return $query->row_array(); // Return the result as an associative array
    }

    //upload full document of research

    public function upload_fulldocu(){
        $config['upload_path'] = './fulldocument_folder/'; // Path to the upload directory
        $config['allowed_types'] = 'pdf'; // Allowed file types
        $config['max_size'] = 10240; // Maximum file size in KB
 
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('fulldocument_file')) {
            $error = array('error' => $this->upload->display_errors());
            return $error;
        } else {
            $data = array('upload_data' => $this->upload->data());
            return array(
                'success' => true,
                'full_document_name' => $data['upload_data']['file_name'],
                'full_document_path' => $config['upload_path'] . $data['upload_data']['file_name']
            );
        }
    }

    public function insert_fulldocument($rpaper_id, $full_document_name, $full_document_path)
    {
        $data = array(
            'status' => 'Completed',
            'full_document_name' => $full_document_name,
            'full_document_path' => $full_document_path
        );
        $this->db->where('rpaper_id', $rpaper_id);
        $this->db->update('tblresearchpapers', $data);
    }

    // edit or update research paper
/*    public function re_upload()
    {
        $config['upload_path'] = './abstract_folder/'; // Path to the upload directory
        $config['allowed_types'] = 'pdf'; // Allowed file types
        $config['max_size'] = 10240; // Maximum file size in KB
 
        $this->load->library('upload', $config);

        if (!$this->upload->re_upload('abstract_file')) {
            $error = array('error' => $this->upload->display_errors());
            return $error;
        } else {
            $data = array('upload_data' => $this->upload->data());
            return array(
                'success' => true,
                'abstract_name' => $data['upload_data']['file_name'],
                'abstract_path' => $config['upload_path'] . $data['upload_data']['file_name']
            );
        }
    }    */

    public function update_research_paper($rpaper_id, $data)
    {
        $this->db->where('rpaper_id', $rpaper_id);
        $this->db->update('tblresearchpapers', $data); // Replace 'your_table_name' with your actual table name
    }
    
    //for dropdown
    public function get_municipality() {
        return $this->db->get('tblmunicipality')->result_array();
    }

    public function get_district() {
        return $this->db->get('tbldistrict')->result_array();
    }

    public function get_barangay_by_municipality($municipality) {
        return $this->db->where('municipality', $municipality)->get('tblbarangay')->result_array();
    }

    public function get_zipcode_by_municipality($municipality) {
    	return $this->db->where('municipality', $municipality)->get('tblmunicipality')->result_array();
    }

    public function upload_profile()
    {
        $config['upload_path'] = './userprofile_folder/'; // Path to the upload directory
        $config['allowed_types'] = 'jpg|jpeg|gif|png|'; // Allowed file types
        $config['max_size'] = 10240; // Maximum file size in KB
 
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('user_profile')) {
            $error = array('error' => $this->upload->display_errors());
            return $error;
        } else {
            $data = array('upload_data' => $this->upload->data());
            return array(
                'success' => true,
                'user_image_name' => $data['upload_data']['file_name'],
                'user_image_path' => $config['upload_path'] . $data['upload_data']['file_name']
            );
        }
    }
    
    public function insert_user_info($data) {
        $this->db->insert('tblusers', $data);
    }

    public function get_user($email, $password) {
        // Query the database to fetch user data
        $this->db->where('user_deped_email', $email);
        $this->db->where('user_password', $password); // Assuming password is hashed with SHA-1
        $query = $this->db->get('tblusers');

        if ($query->num_rows() === 1) {
            return $query->row();
        } else {
            return FALSE;
        }
    }

    public function get_user_info($userid)
    {
        $this->db->where('user_id', $userid);
        $query = $this->db->get('tblusers');
        return $query->result();
    }

    public function get_user_paper($userid) {
    	$this->db->where('user_id', $userid);
    	$this->db->order_by('title', 'ASC');
		$query = $this->db->get('tblresearchpapers');
		return $query->result();
    }

    //get research paper for view and edit

    public function get_research($rpaper_id) {
        return $this->db->get_where('tblresearchpapers', array('rpaper_id' => $rpaper_id))->row();
    }

    public function get_research_id($rpaper_id) {
        $this->db->select('rpaper_id');
        $this->db->where('rpaper_id', $rpaper_id);
        $query = $this->db->get('tblresearchpapers');

        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->rpaper_id;
        }

        return "No matching record found.";
    }

    //delete research paper

    public function delete_research($rpaper_id) {
        $this->db->where('rpaper_id', $rpaper_id);
        $this->db->delete('tblresearchpapers');
    }

    public function get_abstract_name($rpaper_id)
    {
        $this->db->select('abstract_name');
        $this->db->where('rpaper_id', $rpaper_id);
        $query = $this->db->get('tblresearchpapers');

        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->abstract_name;
        }

        return "No matching record found.";
    }

    public function get_fulldocument_name($rpaper_id)
    {
        $this->db->select('full_document_name');
        $this->db->where('rpaper_id', $rpaper_id);
        $query = $this->db->get('tblresearchpapers');

        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->full_document_name;
        }

        return "No matching record found.";
    }


    public function update_user_info($userid, $data)
    {
        $this->db->where('user_id', $userid);
        $this->db->update('tblusers', $data); // Replace 'your_table_name' with your actual table name
    }

    public function getStatus($rpaper_id)
    {
        // Assuming you have a database table named 'users' with a 'status' column.
        $query = $this->db->select('status')
                          ->from('tblresearchpapers')
                          ->where('rpaper_id', $rpaper_id)
                          ->get();

        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->status;
        } else {
            return 'unknown';
        }
    }
}

?>
