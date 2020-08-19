<?php

if (!defined('BASEPATH'))  
    exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->model('opinion_poll_model');

    }

    public function index() {
       
        if ($this->input->post('submitbutton') && !$this->input->post('vote')) {

            echo "<script>alert('You did not vote!');</script>";

        }

        if ($this->input->post('vote')) {

            $this->opinion_poll_model->add_vote($this->input->post('vote'));
            
            $data['total_votes'] = $this->opinion_poll_model->total_votes();

            $data['rows'] = $this->opinion_poll_model->get_results();

            $this->load->view('results', $data);

        } else {

            $this->load->view('opinion_poll_form');

        }

    }
    public function custRegistration(){
        $this->load->view('customer_registration');
        if ($this->input->post('submitbutton')) {

//            $this->load->view('customer_registration');
            echo "<script>alert('You did not vote!');</script>";

        }
      
    }
       public function testing(){
        $this->load->view('testing');
        
      
            
         
    }

}

/* End of file welcome.php */

/* Location: ./application/controllers/welcome.php */
?>