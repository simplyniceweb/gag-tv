<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller {

	public function __construct() {
		parent::__construct();
    }

	public function index() {

		$this->db->where("view_status", 5);
		$this->db->order_by("video_id", "DESC");
		$this->db->limit(1);
		$featured = $this->db->get("videos");

		$this->db->where("view_status", 5);
		$this->db->order_by("video_id", "DESC");
		$videos = $this->db->get("videos");

		$data = array(
			'title'    => 'Gagllery',
			'featured' => $featured->result(),
			'videos'   => $videos->result(),
		);

		$this->load->view('index', $data);
	}

	public function views() {
		$hash = $this->input->post("youtube_id");
		$yt   = self::youtube_details($hash);
		$data = array(
			'count' => number_format($yt['entry']['yt$statistics']['viewCount']),
			'like'  => number_format($yt['entry']['yt$rating']['numLikes']),
			'dislike'  => number_format($yt['entry']['yt$rating']['numDislikes'])
		);
		echo json_encode($data);
	}

	public function youtube_details($youtube_hash = NULL) {
		$youtube_json_output = file_get_contents("http://gdata.youtube.com/feeds/api/videos/" . $youtube_hash . "?v=2&alt=json");
		$youtube_decoded = json_decode($youtube_json_output, true);
		return $youtube_decoded;
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */