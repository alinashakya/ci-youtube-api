<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Youtube extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		//$this->load->library('youtube');
		$name = $this->input->post("searchText");
		$number = $this->input->post("searchNumber");
		if(isset($name)){
      $results = array();
			$DEVELOPER_KEY = 'AIzaSyAjDIBdTArMK_HTKug3Dyv353wMZdM56Ww';
			$client = new Google_Client();
			$client->setDeveloperKey($DEVELOPER_KEY);
			$youtube = new Google_Service_YouTube($client);
			$htmlBody = '';
			try {
        $searchResponse = $youtube->search->listSearch('id,snippet', array(
          'q' => $name,
          'maxResults' => '5',
        ));
        foreach ($searchResponse['items'] as $searchResult) {  
            $results[] = array(
              'videoId' => $searchResult['id']['videoId'],
              'title' => $searchResult['snippet']['title'],
              'description' => $searchResult['snippet']['description'],
              'imageUrl' => $searchResult['snippet']['thumbnails']['default']['url']
              );
        }
      } catch (Google_Service_Exception $e) {
          throw new Exception("Error Processing Request, htmlspecialchars($e->getMessage())", 1);
      } catch (Google_Exception $e) {
        throw new Exception("An client error occurred, htmlspecialchars($e->getMessage())", 1);
      }
		}
		echo json_encode($this->load->view( 'video-list', array('results'=>$results), TRUE ));
	}
}

