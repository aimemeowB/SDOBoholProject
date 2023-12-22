 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_users_model extends CI_Model {

	public function __construct(){
		parent::__construct();

	}
	 public function get_research($rpaper_id) {
        return $this->db->get_where('tblresearchpapers', array('rpaper_id' => $rpaper_id))->row();
    }
     public function get_research_id($rpaper_id) {
        $this->db->select('rpaper_id');
        $this->db->where('rpaper_id', $rpaper_id);
        $query = $this->db->get('tblresearchpapers');
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

	public function getAdmin(){

		$query = $this->db->get('system_info');
		return $query->result();
	}

		function authenticate($email){
			$query = $this->db->query("SELECT * FROM `tbladmin` where admin_email='$email' " );
			if ($query->num_rows() > 0) {
				return $query->result();
			}
				return 0;

		}
		function get_admin_logged_info($id){
			$query = $this->db->query("SELECT *, resident_info.firstname,resident_info.lastname,resident_info.contact_no  FROM `admin_users`  inner join `resident_info` on admin_users.res_id=resident_info.id where admin_users.admin_id='$id' " );

			if ($query->num_rows() > 0) {
				return $query->result();
			}
				return 0;

		}
		function fetch_all($id){

			$query = $this->db->query("SELECT * FROM `admin_users`" );
			return $query->result();
		}

	public function approved($id,$newStatus)
	{
		$data = array('user_status' =>$newStatus); 
        $this->db->where('user_id',$id);
        $this->db->update('tblusers', $data);
			
	}

	public function denied($id,$newStatus)
	{
		$data = array('user_status' =>$newStatus); 
        $this->db->where('user_id',$id);
        $this->db->update('tblusers', $data);
			
	}

		public function get_verifieduser(){

			$this->db->where('user_status','Approved');
        $query = $this->db->get('tblusers');
        return $query->result();
        //$query = $this->db->get('admin_users');
			//return $query->result();
}
	
		public function get_notverifieduser(){

			$this->db->where('user_status','Pending');
        $query = $this->db->get('tblusers');
        return $query->result();
}

		public function get_denieduser(){

			$this->db->where('user_status','Denied');
        $query = $this->db->get('tblusers');
        return $query->result();
}

		public function get_allusers(){

        $query = $this->db->get('tblusers');
        return $query->result();
}

public function approvedAbstract($id,$newStatus){
		 $data = array('status' =>$newStatus); 
        $this->db->where('rpaper_id',$id);
        $this->db->update('tblresearchpapers', $data);
			
		}
		public function rejectAbstract($id,$newStatus){
		 $data = array('status' =>$newStatus); 
        $this->db->where('rpaper_id',$id);
        $this->db->update('tblresearchpapers', $data);
			
		}
	public function get_Abstract_table()
	{
				$this->db->where('status','Pending');
	        $query = $this->db->get('tblresearchpapers');
	        return $query->result();
	        //$query = $this->db->get('admin_users');
				//return $query->result();
	}

	public function get_approved_abstract_table()
	{
		$this->db->where('status','Approved');
	    $query = $this->db->get('tblresearchpapers');
	    return $query->result();
	        //$query = $this->db->get('admin_users');
				//return $query->result();
	}

	public function get_all_research_papers ()
	{
		$query = $this->db->get('tblresearchpapers');
        return $query->result();
	}

	public function get_completed_research() {
        $this->db->where('status', 'Completed');
        $query = $this->db->get('tblresearchpapers'); // Replace with your actual table name
        return $query->result();
    }

    public function get_rejected_research() {
        $this->db->where('status', 'Rejected');
        $query = $this->db->get('tblresearchpapers'); // Replace with your actual table name
        return $query->result();
    }

    public function get_all_abstract()
	{
		$this->db->where('abstract_name IS NOT NULL');
		$query = $this->db->get('tblresearchpapers');
        return $query->result();
	}

	public function get_all_fulldocuments()
	{
		$this->db->where('full_document_name IS NOT NULL');
		$query = $this->db->get('tblresearchpapers');
        return $query->result();
	}

	public function user_with_most_uploads()
	{
		$this->db->select('user_id, COUNT(user_id) as upload_count');
		$this->db->from('tblresearchpapers');
		$this->db->group_by('user_id');
		$this->db->order_by('upload_count', 'desc');
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			$row = $query->row();
			return $row->user_id;
		}
		else {
			return null;
		}
	}

	public function user_with_least_uploads()
	{
		$this->db->select('user_id, COUNT(user_id) as upload_count');
		$this->db->from('tblresearchpapers');
		$this->db->group_by('user_id');
		$this->db->order_by('upload_count', 'asc');
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			$row = $query->row();
			return $row->user_id;
		}
		else {
			return null;
		}
	}

	public function get_user_username($user_id)
    {
    	$this->db->select('user_username');
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('tblusers');
        $row = $query->row();
        return $row->user_username;
    }

	public function delete($user_id) {
        // Delete the user with the specified ID from the 'users' table
        $this->db->where('user_id', $user_id);
        $this->db->delete('tblusers');
    }


	public function get_all_rows() {
        $query = $this->db->get('tblresearchpapers');
        return $query->result();
    }

    public function get_pdf_by_id($id) {
        $query = $this->db->select('abstract_path')->get_where('tblresearchpapers', array('rpaper_id' => $id));
        $row = $query->row();
        return $row->abstract_path;
    }
}

?>
