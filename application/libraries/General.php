<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class General {

	private $CI;

	public function __construct() {
		$this->CI = get_instance();
	}

	public function youtube_validate($youtube_hash = NULL) {
		$params['apikey'] = 'AI39si70XRv7aReKupQOlDgnFtHAEY6PR559ysCDOjqpOU-gT_fWLRb7I7TBHEK6SwqUs3DZ1z0UzC7nIc7GpzBX9fWtCNQl1Q';
		$this->CI->load->library('youtube', $params);

		$information = $this->CI->youtube->getVideoEntry($youtube_hash);
		return $information;
	}

	public function youtube_details($youtube_hash = NULL) {
		$youtube_json_output = file_get_contents("http://gdata.youtube.com/feeds/api/videos/" . $youtube_hash . "?v=2&alt=json");
		$youtube_decoded = json_decode($youtube_json_output, true);
		return $youtube_decoded;
	}

}
/* End of file general.php */
/* Location: /application/libraries/general.php */