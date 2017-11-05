<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Youtube extends CI_Controller
{
    
    function __construct()
    {
        parent::__construct();
        $this->load->library('youtube');
        $this->config->set_item('apiKey', 'AIzaSyAjDIBdTArMK_HTKug3Dyv353wMZdM56Ww');
    }
    
    /**
     * Index Page for this controller.
     * Uses Youtube API to search and displays search lists
     * 
     */
    public function index()
    {
        $name = $this->input->post("searchText");
        if (isset($name) && !empty($name)) {
            $results = array();
            $client  = new Google_Client();
            $client->setDeveloperKey($this->config->item('apiKey'));
            $youtube = new Google_Service_YouTube($client);
            try {
                $searchResponse = $youtube->search->listSearch('id,snippet', array(
                    'q' => $name,
                    'maxResults' => '5'
                ));
                foreach ($searchResponse['items'] as $searchResult) {
                    $results[] = array(
                        'videoId' => $searchResult['id']['videoId'],
                        'title' => $searchResult['snippet']['title'],
                        'description' => $searchResult['snippet']['description'],
                        'imageUrl' => $searchResult['snippet']['thumbnails']['default']['url']
                    );
                }
                echo json_encode($this->load->view('video-list', array(
                    'results' => $results
                ), TRUE));
            }
            catch (Google_Service_Exception $e) {
                throw new Exception("Error Processing Request, htmlspecialchars($e->getMessage())", 1);
            }
            catch (Google_Exception $e) {
                throw new Exception("An client error occurred, htmlspecialchars($e->getMessage())", 1);
            }
        }
    }
}