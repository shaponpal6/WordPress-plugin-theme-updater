<?php

/**
 * Created by PhpStorm.
 * User: Shapon
 * Date: 28-03-17
 * Time: AM 01.52
 */

class Pay extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pay_model','paypal');
        $this->load->model('Products_model','products');
    }

    public function index()
    {
        $data['products']=$this->products->get_all();
        $this->load->view('home/pricing', $data);

    }
    public function getLicence($id){
        if (!$this->session->userdata('isUserLoggedIn')) {
            $this->session->set_flashdata('user', 'Please be a member and login here to buy package. ');
            $this->session->set_flashdata('class', 'danger');
            redirect('users/signin');
        }else{
            if (isset($_POST['buy_now'])){
                $products = $this->products->get_by_id($id);
                $price = $products->price;
                $description = $products->name;
                //echo $description.'-----'.$price;
                   if ($this->paypal->checkOut($price, $description)){
                       $this->paypal->insert();
                   }
            }else{
                echo 'Something Was Wrong';
            }
        }
    }

    function success(){
        if($this->paypal->paymentConfirm()){
            header('Location: '.base_url('Admin/dashboard'));
        }else{
            header('Location: '.base_url('pay/pricing'));
        }
    }
    function cancel(){
        echo $this->timeSince('2017-3-03 14:04:41', '2017-12-06 4:09:1');
        $datetime1 = date_create('2017-3-27');
        $datetime2 = date_create('2017-8-13');
        $interval = date_diff($datetime1, $datetime2);
        echo $interval->format('%R%d days');
    }
    function timeSince($dateFrom, $dateTo) {
        // array of time period chunks
        $chunks = array(
            array(60 * 60 * 24 * 365 , 'year'),
            array(60 * 60 * 24 * 30 , 'month'),
            array(60 * 60 * 24 * 7, 'week'),
            array(60 * 60 * 24 , 'day'),
            array(60 * 60 , 'hour'),
            array(60 , 'minute'),
        );

        $original = strtotime($dateFrom);
        $now      = strtotime($dateTo);
        $since    = $now - $original;
        $message  = ($now < $original) ? '-' : null;

        // If the difference is less than 60, we will show the seconds difference as well
        if ($since < 60) {
            $chunks[] = array(1 , 'second');
        }

        // $j saves performing the count function each time around the loop
        for ($i = 0, $j = count($chunks); $i < $j; $i++) {

            $seconds = $chunks[$i][0];
            $name = $chunks[$i][1];

            // finding the biggest chunk (if the chunk fits, break)
            if (($count = floor($since / $seconds)) != 0) {
                break;
            }
        }

        $print = ($count == 1) ? '1 ' . $name : $count . ' ' . $name . 's';

        if ($i + 1 < $j) {
            // now getting the second item
            $seconds2 = $chunks[$i + 1][0];
            $name2 = $chunks[$i + 1][1];

            // add second item if it's greater than 0
            if (($count2 = floor(($since - ($seconds * $count)) / $seconds2)) != 0) {
                $print .= ($count2 == 1) ? ', 1 ' . $name2 : ', ' . $count2 . ' ' . $name2 . 's';
            }
        }
        return $message . $print;
    }
}