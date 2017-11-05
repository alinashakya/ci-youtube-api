<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
	}

	/**
	 * Index Page for this controller.
	 * Loads the default youtube search page
	 *
	 */
	public function index()
	{
		$this->load->view('welcome');
	}
}
