<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('general');
    }

	public function index() {

		$hash = $this->uri->segment(2);
		$validation = $this->general->youtube_validate($hash);
		if(!empty($hash) && !is_null($validation) && !empty($validation)) {
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

		$videos = self::videos(1);
		$data['videos']     = $videos['videos'];
		$data['pagination'] = $videos['pagination'];

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

			return $this->output->set_output(json_encode($data));
		}
	}

	public function videos($val = NULL) {
		$this->load->library('pagination');
		$this->load->model('video_model');

		$start = $this->uri->segment(3);
		if(!$start) $start = 0;

		$pagination_config = array(
			'uri_segment'    => 3,
			'per_page'       => 16,
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

		if(!is_null($val) && $val == 1) {
			return $data;
		} else { 
			$this->load->view('includes/videos', $data);
		}
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

	public function privacy() {
		$data = array("title" => "Privacy Policy - Gagllery");
		$this->load->view('pages/privacy', $data);
	}

	public function suggestion() {

		$this->load->library('form_validation');

		$config = array(
					array(
						'field'   => 'name', 
						'label'   => 'Name', 
						'rules'   => 'trim|required|encode_php_tags'
					),
					array(
						'field'   => 'email', 
						'label'   => 'Email', 
						'rules'   => 'trim|required|valid_email'
					),
					array(
						'field'   => 'link', 
						'label'   => 'Link', 
						'rules'   => 'trim|required|encode_php_tags'
					),
					array(
						'field'   => 'title', 
						'label'   => 'Title', 
						'rules'   => 'trim|encode_php_tags'
					),
					array(
						'field'   => 'desc', 
						'label'   => 'Description', 
						'rules'   => 'trim|encode_php_tags'
					),
					array(
						'field'   => 'nsfw', 
						'label'   => 'NSFW', 
						'rules'   => 'trim|required|encode_php_tags|is_natural'
					)
				);

		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == FALSE) {
			$errors = validation_errors('<p class="text-danger">', '</p>');
			return $this->output->set_output($errors);
		} else {
			$link  = $this->input->post("link");
			$name  = $this->input->post("name");
			$email = $this->input->post("email");
			$title = $this->input->post("title");
			$desc  = $this->input->post("desc");
			$nsfw  = $this->input->post("nsfw");

			// Explode youtube url
			$hash = $this->general->explode_url($link);
			if(empty($hash)) {
				$invalid_hash = '<p class="text-danger">Please provide a valid Youtube URL.</p>';
				return $this->output->set_output($invalid_hash);
			}

			// Check if the video is already in the database
			$this->db->where("hash", $hash);
			$check_hash = $this->db->get("videos");

			$this->db->where("link", $hash);
			$check_sugg = $this->db->get("suggestions");

			if($check_hash->num_rows() > 0 || $check_sugg->num_rows() > 0) {
				$hash_exist = '<p class="text-danger">Youtube URL already exist.</p>';
				return $this->output->set_output($hash_exist);
			}

			// Validate youtube url
			$validation = $this->general->youtube_validate($hash);

			if(isset($validation) && !empty($validation)) {
				$yt = $this->general->youtube_details($hash);
	
				$img_url      = $yt['entry']['media$group']['media$thumbnail'][2]['url'];
				// $title        = $yt['entry']['title']['$t'];
				$seconds      = $yt['entry']['media$group']['yt$duration']['seconds'];
				// $descriptions = $yt['entry']['media$group']['media$description']['$t'];

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
				$this->load->library('image_moo');
				$this->load->model('video_model');
				$this->video_model->manipulate_img( $local_path . "images/".$img_name, $local_path . "icons/via.png" );

				// Insert to database
				$save = array(
					'full_name'        => $name,
					'email'            => $email,
					'link'             => $hash,
					'duration'         => $duration,
					'title'            => $title,
					'description'      => $desc,
					'nsfw'             => $nsfw,
					'video_type'       => 1, // 1 youtube
					'view_status'      => 2, // 5 accepted, 2 = pending, 1 = deleted
					'created_at'       => date('Y-m-d h:i:s'),
					'modified_at'      => date('Y-m-d h:i:s'),
				);
	
				$this->db->insert("suggestions", $save);
				return $this->output->set_output("success");
			}
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */