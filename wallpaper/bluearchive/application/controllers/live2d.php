<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class live2d extends CI_Controller {

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
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function view($page)
    {
        if (!file_exists(APPPATH . 'views/live2d/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }

		//$data['strchar'] = $page;
        //$data['title'] = ucfirst($page); // Capitalize the first letter

		$this->load->view('live2d/' . $page);
        // $this->load->view('templates/header', $data);
        // $this->load->view('pages/' . $page, $data);
        // $this->load->view('templates/footer', $data);
    }
}
