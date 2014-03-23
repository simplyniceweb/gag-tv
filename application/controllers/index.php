<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('general');
    }

	public function index() {

		$hash = $this->uri->segment(2);
		$validation = $this->general->youtube_validate($hash);
		if(isset($validation) && !empty($validation)) {
			$this->db->where("hash", $hash);
		}

		$this->db->where("view_status", 5);
		$this->db->order_by("video_id", "DESC");
		$this->db->limit(1);
		$featured = $this->db->get("videos");

		foreach($featured->result() as $ft) {
			$next = self::next_video($ft->video_id);
			$prev = self::prev_video($ft->video_id);
		}

		$data = array(
			'title'    => 'Gagllery',
			'featured' => $featured->result(),
			'next'     => $next,
			'prev'     => $prev
		);

		$this->load->view('index', $data);
	}

	public function views() {
		$hash = $this->input->post("youtube_id");

		$validation = $this->general->youtube_validate($hash);
		if(isset($validation) && !empty($validation)) {

			$yt = $this->general->youtube_details($hash);

			$data = array(
				'count' => number_format($yt['entry']['yt$statistics']['viewCount']),
				'like'  => number_format($yt['entry']['yt$rating']['numLikes']),
				'dislike'  => number_format($yt['entry']['yt$rating']['numDislikes'])
			);
	
			echo json_encode($data);

		}
	}
	
	public function videos() {
		$this->load->library('pagination');
		$this->load->model('video_model');

		$start = $this->uri->segment(3);
		if(!$start) $start = 0;

		$pagination_config = array(
			'uri_segment'    => 3,
			'per_page'       => 12,
			'display_pages'  => FALSE,
			'full_tag_open'  => '<ul class="pager">',
			'full_tag_close' => '</ul>',
			'prev_tag_open'  => '<li class="previous">',
			'prev_tag_close' => '</li>',
			'next_tag_open'  => '<li class="next">',
			'next_tag_close' => '</li>',
			'base_url'       => base_url() . 'index/videos',
			'total_rows'     => $this->video_model->total_videos(),
		);

		$getter = $this->video_model->video_pagination($start, $pagination_config['per_page']);
		$this->pagination->initialize($pagination_config);

		$data = array(
			'videos'   => $getter,
			'pagination' => $this->pagination->create_links()
		);

		$this->load->view('includes/videos', $data);
	}

	public function prev_video($video_id) {
		$this->db->where("video_id > ", $video_id);
		$this->db->order_by("video_id");
		$this->db->limit(1);
		$query = $this->db->get("videos");

		$video_id = NULL;
		foreach($query->result() as $qry) {
			$video_id = $qry->hash;
		}
		
		return $video_id;
	}

	public function next_video($video_id) {
		$this->db->where("video_id < ", $video_id);
		$this->db->order_by("video_id", "DESC");
		$this->db->limit(1);
		$query = $this->db->get("videos");

		$video_id = NULL;
		foreach($query->result() as $qry) {
			$video_id = $qry->hash;
		}
		
		return $video_id;
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */