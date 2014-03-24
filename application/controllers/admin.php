<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct() {
		parent::__construct();
    }

	public function index() {
		$access = $this->session->userdata('access');
		if(!$access) {
			redirect();
		}

		$data = array(
			'title' => 'Gagllery::Admin'
		);

		$this->load->view('admin/index', $data);
	}

	public function process() {
		$access = $this->session->userdata('access');
		if(!$access) {
			redirect();
		}

		$url              = $this->input->post("hash");
		$sub_title        = ucwords($this->input->post("sub_title"));
		$sub_descriptions = $this->input->post("sub_descriptions");
		$nsfw             = $this->input->post("nsfw");

		$yt_hash          = explode("?v=", $url);
		$hash             = $yt_hash[1];
		if(empty($hash)) {
			$yt_hash      = explode("&v=", $url);
			$hash         = $yt_hash[1];
			if(empty($hash)) {
				$hash         = $url;
			}
		}

		if(empty($hash) || empty($sub_title) || empty($sub_descriptions)) {
			redirect("admin?msg=null");
		}

		// hash check
		$this->db->where("hash", $hash);
		$check_hash = $this->db->get("videos");
		if($check_hash->num_rows() > 0) {
			redirect("admin?msg=exist");
		}

		$this->load->library(array('image_moo', 'general'));

		$validation = $this->general->youtube_validate($hash);
		if(isset($validation) && !empty($validation)) {

			$yt = $this->general->youtube_details($hash);

			$img_url      = $yt['entry']['media$group']['media$thumbnail'][2]['url'];
			$title        = $yt['entry']['title']['$t'];
			$seconds      = $yt['entry']['media$group']['yt$duration']['seconds'];
			$descriptions = $yt['entry']['media$group']['media$description']['$t'];

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

			// Insert to database
			$save = array(
				'hash'             => $hash,
				// 'title'            => $title,
				'sub_title'        => $sub_title,
				'duration'         => $duration,
				'image'            => $img_name,
				// 'descriptions'     => $descriptions,
				'sub_descriptions' => $sub_descriptions,
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

		redirect();
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */