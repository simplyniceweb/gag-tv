<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct() {
		parent::__construct();
    }

	public function index() {
		$access = $this->session->userdata('access');
		if(!$access) {
			show_404();
		}

		$data = array(
			'title' => 'Gagllery - Admin'
		);

		$this->load->view('admin/index', $data);
	}

	public function process() {
		$this->load->library(array('image_moo', 'general'));
		$access = $this->session->userdata('access');
		if(!$access) {
			show_404();
		}

		$url              = $this->input->post("hash");
		$sub_title        = ucwords($this->input->post("sub_title"));
		$sub_descriptions = $this->input->post("sub_descriptions");
		$nsfw             = $this->input->post("nsfw");

		$hash = $this->general->explode_url($url);

		if(empty($hash) || empty($sub_title) || empty($sub_descriptions)) {
			redirect("admin?msg=null");
		}

		// hash check
		$this->db->where("hash", $hash);
		$check_hash = $this->db->get("videos");
		if($check_hash->num_rows() > 0) {
			redirect("admin?msg=exist");
		}

		$validation = $this->general->youtube_validate($hash);
		if(isset($validation) && !empty($validation)) {

			$yt = $this->general->youtube_details($hash);

			$img_url      = $yt['entry']['media$group']['media$thumbnail'][2]['url'];
			//$title        = $yt['entry']['title']['$t'];
			$seconds      = $yt['entry']['media$group']['yt$duration']['seconds'];
			//$descriptions = $yt['entry']['media$group']['media$description']['$t'];

			// Time calculation
			if($seconds >= 3600) {
				$duration = gmdate("h:i:s", $seconds);
			} else if($seconds < 3600){
				$duration = gmdate("i:s", $seconds);
			}

			// Upload image
			$img_name = $hash . ".jpg";
			$local_path = dirname(__FILE__) . "/../../tools/";
			$copy_img = copy($img_url, $local_path . "images/".$img_name);

			// Customize Image
			$this->load->model('video_model');
			$this->video_model->manipulate_img( $local_path . "images/".$img_name, $local_path . "icons/via.png" );

			$title        = $this->general->remove_accent($sub_title);
			$descriptions = $this->general->remove_accent($sub_descriptions);
			$slug         = $hash."/".$this->general->slug_url($sub_title);

			// Insert to database
			$save = array(
				'hash'             => $hash,
				'slug'             => $slug,
				'sub_title'        => $title,
				'duration'         => $duration,
				'image'            => $img_name,
				'sub_descriptions' => $descriptions,
				'nsfw'             => $nsfw,
				'video_type'       => 1, // 1 youtube
				'view_status'      => 5, // 5 accepted, 2 = pending, 1 = deleted
				'created_at'       => date('Y-m-d h:i:s'),
				'modified_at'      => date('Y-m-d h:i:s'),
			);

			$this->db->insert("videos", $save);

			redirect("admin?msg=added");
		}

		redirect("admin?msg=null");
	}

	public function access_session() {
		$value = $this->input->get_post("hash");
		if($value == "E9o74KfN") {
			$access = array(
				'access' => true,
			);
	
			$this->session->set_userdata('access', $access);
			redirect("admin");
		}

		show_404();
	}

	public function suggestions() {
		$access = $this->session->userdata('access');
		if(!$access) {
			show_404();
		}

		$this->db->where("view_status", 2);
		$suggestions = $this->db->get("suggestions");

		$data = array(
			'title'       => 'Gagllery - Suggestions',
			'suggestions' => $suggestions->result()
		);

		$this->load->view('admin/suggestions', $data);
	}

	public function suggestion() {
		$access = $this->session->userdata('access');
		if(!$access) {
			show_404();
		}
		
		$id = $this->input->post("suggest_id");

		$data = array(
			'full_name'   => $this->input->post("name"),
			'email'       => $this->input->post("email"),
			'link'        => $this->input->post("link"),
			'title'       => $this->input->post("title"),
			'description' => $this->input->post("desc"),
			'nsfw'        => $this->input->post("nsfw"),
			'modified_at' => date('Y-m-d h:i:s')
		);
		
		$this->db->where("suggestion_id", $id);
		$this->db->update("suggestions", $data);

		redirect("admin/suggestions?updated=true");
	}

	public function accept() {
		$id = $this->uri->segment(3);
		$this->db->where("suggestion_id", $id);
		$get = $this->db->get("suggestions");

		foreach($get->result() as $g) {
			$name  = $g->full_name;
			$email = $g->email;
			$title = $this->general->remove_accent($g->sub_title);
			$slug  = $g->link."/".$this->general->slug_url($g->sub_title);
			$transfer = array(
				'image'            => $g->link.".jpg",
				'hash'             => $g->link,
				'slug'             => $slug,
				'sub_title'        => $title,
				'duration'         => $g->duration,
				'sub_descriptions' => $g->description,
				'nsfw'             => $g->nsfw,
				'video_type'       => 1,
				'view_status'      => 5,
				'created_at'       => $g->created_at,
				'modified_at'      => $g->modified_at
			);

			$this->db->insert("videos", $transfer);
		}

		$data = array("view_status" => 5, "modified_at" => date('Y-m-d h:i:s') );
		$this->db->where("suggestion_id", $id);
		$this->db->update("suggestions", $data);

		$this->load->library('email');
		$this->email->set_newline("\r\n");
		
		$this->email->from('gagllery@gmail.com', '[Gagllery]');
		$this->email->to($email);
		$this->email->subject('[Gagllery] Notification');
		$this->email->message('Hello '.ucwords($name).', <br />Thank you for suggesting a video! Please do suggest more coold videos. <br /> Below is the link of the video you submitted.<br /> '. base_url()."v/".$transfer['hash']);

		$sent = $this->email->send();
		if($sent) {
			redirect("admin/suggestions?accepted=true&mail=true");
		} else {
			redirect("admin/suggestions?accepted=true&mail=false");
		}
	}

	public function disapprove() {
		$id = $this->uri->segment(3);

		$data = array("view_status" => 1, "modified_at" => date('Y-m-d h:i:s') );
		$this->db->where("suggestion_id", $id);
		$this->db->update("suggestions", $data);
	}

	public function slug_converter() {
		$access = $this->session->userdata('access');
		if(!$access) {
			show_404();
		}

		$this->load->library('general');

		$this->db->where("view_status", 5);
		$slug = $this->db->get("videos");

		foreach($slug->result() as $sl) {
			$this->db->where("video_id", $sl->video_id);
			$this->db->update("videos", array("slug" => $sl->hash."/".$this->general->slug_url($sl->sub_title)));
			echo $this->general->slug_url($sl->sub_title) . "<br/>";
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */