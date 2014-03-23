<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Video_model extends CI_Model {

	public function __Construct(){
		parent:: __construct();
	}

	public function manipulate_img($img, $via) {

		$this->image_moo->load($img)
			->crop(0, 40, 480, 320)
			->load_watermark($via)
			->watermark(3)
			->save($img, $overwrite = TRUE);

		return "go";
	}

	public function video_pagination($start, $max) {
		$this->db->where("view_status", 5);
		$this->db->order_by("video_id", "DESC");
		$this->db->limit($max, $start);
		$videos = $this->db->get("videos");

		return $videos->result();
	}

	public function total_videos() {
		$this->db->where("view_status", 5);
		return $this->db->count_all('videos');
	}
}
?>