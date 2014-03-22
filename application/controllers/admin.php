<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('video_model');
		$this->load->library('image_moo');
    }

	public function index() {
		$data = array(
			'title' => 'Gagllery::Admin'
		);
/*
		$hash = "aE2GCa-_nyU";

		// hash check
		$this->db->where("hash", $hash);
		$check_hash = $this->db->get("videos");
		if($check_hash->num_rows() > 0) {
			echo "exist";
		}

		$validation = self::youtube_validate($hash);
		if(isset($validation) && !empty($validation)) {
			$yt = self::youtube_details($hash);

			$this->load->helper('file');
			$img_url      = $yt['entry']['media$group']['media$thumbnail'][2]['url'];
			$title        = $yt['entry']['title']['$t'];
			$seconds      = $yt['entry']['media$group']['yt$duration']['seconds'];
			$descriptions = $yt['entry']['media$group']['media$description']['$t'];

			// Upload image
			$img_name = $hash . ".jpg";
			$local_path = dirname(__FILE__) . "/../../tools/";
			$copy_img = copy($img_url, $local_path . "images/".$img_name);

			// Customize Image
			$this->video_model->manipulate_img( $local_path . "images/".$img_name, $local_path . "icons/via.png" );

			// Insert to database
			$save = array(
				'hash'             => $hash,
				'title'            => $title,
				'sub_title'        => 'sub_title',
				'duration'         => $seconds,
				'image'            => $img_name,
				'descriptions'     => $descriptions,
				'sub_descriptions' => 'sub_descriptions',
				'video_type'       => 1, // 1 youtube
				'view_status'      => 5, // 5 accepted, 2 = pending, 1 = deleted
				'created_at'       => date('Y-m-d h:i:s'),
				'modified_at'      => date('Y-m-d h:i:s'),
			);

			$this->db->insert("videos", $save);
		}
*/
		$this->load->view('admin/index', $data);
	}

	public function youtube_validate($youtube_hash = NULL) {
		$params['apikey'] = 'AI39si70XRv7aReKupQOlDgnFtHAEY6PR559ysCDOjqpOU-gT_fWLRb7I7TBHEK6SwqUs3DZ1z0UzC7nIc7GpzBX9fWtCNQl1Q';
		$this->load->library('youtube', $params);

		$information = $this->youtube->getVideoEntry($youtube_hash);
		return $information;
	}

	public function youtube_details($youtube_hash = NULL) {
		$youtube_json_output = file_get_contents("http://gdata.youtube.com/feeds/api/videos/" . $youtube_hash . "?v=2&alt=json");
		$youtube_decoded = json_decode($youtube_json_output, true);
		return $youtube_decoded;
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */