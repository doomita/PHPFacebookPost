<?php

class PHPFacebookPost {

	private $ok = 1;
	private $appId = "";
	private $secret = "";
	private $facebook_API_path = "";
	private $facebook_API = "";
	public $page_id = "";

	public function __construct($arguments) {

		if (isset($arguments["facebook_API"]))
			$this -> facebook_API = $arguments["facebook_API"];

		if (isset($arguments["appId"]))
			$this -> appId = $arguments["appId"];

		if (isset($arguments["secret"]))
			$this -> secret = $arguments["secret"];

		if (isset($arguments["facebook_API_path"]))
			$this -> facebook_API_path = $arguments["facebook_API_path"];

		if (isset($arguments["page_id"]))
			$this -> page_id = $arguments["page_id"];

		if (!isset($facebook_API)) {
			try {
				if (trim($this -> appId) != "" && trim($this -> secret) != "") {
					require_once $this -> facebook_API_path;
					$this -> facebook_API = new Facebook( array('appId' => $this -> appId, 'secret' => $this -> secret));
				} else {
					$this -> ok = 0;
					echo "<span style='color:red;'>Error: specific the <strong>facebook_API</strong> parameter or <strong>appId</strong> , <strong>secret</strong> , <strong>facebook_API_path</strong> parameters.</span>";
				}
			} catch (FacebookApiException $e) {
				$this -> ok = 0;
				echo "<span style='color:red;'>Error from api facebook, Code: " . $e["error"]["code"] . "</span>";
			} catch(Exception $e) {
				$this -> ok = 0;
				echo "<span style='color:red;'>Unknown error</span>";
			}

		}
	}

	public function load_post() {
		if ($this -> ok) {
			if (trim($this -> page_id) != "") {
				try {
					$facebook_data = $this -> facebook_API -> api("$this->page_id/feed", "GET", array('redirect' => false, 'type' => 'large'));
					foreach ($facebook_data['data'] as $post) {
						if (isset($post['object_id'])) {
							$this -> build_img($post);
						}
					}
				} catch (FacebookApiException $e) {
					$this -> ok = 0;
					echo "<span style='color:red;'>Error from api facebook, Code: " . $e["error"]["code"] . "</span>";
				}
			} else {
				$this -> ok = 0;
				echo "<span style='color:red;'>Error: specific the <strong>page_id</strong> parameter </span>";
			}
		}
	}

	private function build_img($post) {
		$id = $post['object_id'];
		$messaggio = "";
		$link = "#";

		if (isset($post['message']))
			$messaggio = $post['message'];

		if (isset($post['link']))
			$link = $post['link'];

		echo "<div style='posizion:absolute;
	float:left;
	width:300px;
	height:250px;
	overflow:hidden;
	margin:20px;
	padding:10px'>";

		echo "
	<a href='$link' target='_blank' border='0'>
	<img src='http://graph.facebook.com/$id/picture?type=normal' style='
	max-width:100%;
	max-height:100%;
	box-shadow: 0px 0px 10px;
	' />
	</a>";

		echo "<div style='color:white;position:relative;bottom:30px;left:10px;text-shadow: 0px 0px 6px black;'><strong>$messaggio</strong></div>";
		echo "</div>";
	}

}

?>
