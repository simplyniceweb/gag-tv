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

	public function video_pagination($start, $max, $hash) {
		$data = NULL;
		if(!is_null($hash)) {
			$this->db->where("hash", $hash);
			$this->db->where("view_status", 5);
			$this->db->limit(1);
			$get = $this->db->get("videos");
			if($get->num_rows() > 0) {
				$data = $get->result();
				$xxx = $get->row()-1;
			}
		}

		if(!is_null($data)) {
			foreach($data as $row) {
				$this->db->where("video_id <= ", $row->video_id);
			}
		}

		$this->db->where("view_status", 5);
		$this->db->order_by("video_id", "DESC");
		if(!is_null($data)) {
			$this->db->limit($max, $xxx);
		} else {
			$this->db->limit($max, $start);
		}
		$videos = $this->db->get("videos");

		return $videos->result();
	}

	public function total_videos() {
		$query = $this->db->where("view_status", 5)->get('videos');
		return $query->num_rows();
	}
}
?>