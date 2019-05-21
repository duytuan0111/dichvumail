<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StripeController extends CI_Controller 
{
    protected $_public_key = 'pk_test_jIBOiVTBKc9ZTZFzWdevrC8300UanZhSeC';
    protected $_secret_key = 'sk_test_ybpZD91FDmixGnOGxv6ERRoq00SO5THM58';

    public function __construct() {
     parent::__construct();
     $this->load->library("session");
     $this->load->helper('url');
 }

    public function index()
    {
        $data['public_key']  = $this->_public_key;
        $this->load->view('my_stripe', $data);
    }

    public function stripePost()
    {
        require_once('application/libraries/stripe-php/init.php');

        \Stripe\Stripe::setApiKey($this->_secret_key);

        \Stripe\Charge::create ([
            "amount" => $this->input->post('amount'),
            "currency" => "usd",
            "source" => $this->input->post('stripeToken'),
            "description" => "Paying fee by free Pveser" 
        ]);

        $this->session->set_flashdata('success', 'Thanh toán thành công!');

        redirect('/my-stripe', 'refresh');
    }
}