<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: Shapon
 * Date: 28-03-17
 * Time: AM 01.53
 */
class Pay_model extends CI_Model
{
    public $paypal;
    private $checkOut;

    function __construct()
    {
        $this->load->database();
        $this->table = "paypal_transaction";

        $this->load->library('PayPalExpressCheckOut');
        $this->paypal = new PayPalExpressCheckOut();
    }

    public function checkOut($price, $description)
    {
        $paypal = array(
            'currency' => 'USD',
            'shipping' => '0.00',
            'tax' => '0.00',
            'price' => $price,
            'description' => $description,
            'returnUrl' => base_url('index.php/pay/success'),
            'cancelUrl' => base_url('index.php/pay/cancel')
        );
        $this->checkOut = $this->paypal->checkOut($paypal);

        if ($this->checkOut == false) {
            die('Oop!! Something was Wrong!!');
        } else {
            //print_r($this->checkOut);
            return $this->checkOut;
        }
    }

    public function insert()
    {
        if ($this->checkOut != false) {
            $userId=$this->session->userdata('userId');
            $payment_id = $this->checkOut->getId();
            $hash = md5($payment_id);
            $this->session->set_userdata('payment_hash', $hash);
            // Insert user Record before checkout success or cancel. You will get record who try to pay or complete pay.
            $data = array(
                'user_id' => $userId,
                'payment_id' => $payment_id,
                'hash' => $hash,
                'complete' => 0,
                'amount' => $this->checkOut->getTransactions()[0]->getAmount()->getTotal(),
                'description' => $this->checkOut->getTransactions()[0]->getDescription()
            );
            $this->db->insert($this->table, $data);
            // Unit Check
//            echo '<pre>';
//            print_r($paypal).'<pre>';

            // Redirect User to success page
            foreach ($this->checkOut->getLinks() as $link) {
                if ($link->getRel() == 'approval_url') {
                   header('Location: ' . $link->getHref());
                }
            }
        }
    }

    public function paymentConfirm()
    {
        // Confirm order by security check
        $hash = $this->session->userdata('payment_hash');
        $query = $this->db->get_where($this->table, array('hash' => $hash));
        $payment_id=$query->row()->payment_id;

        $confirmOrder = $this->paypal->chargePayer($payment_id);
        if ($confirmOrder) {
            // get some data
            $payerInfo = $confirmOrder->getPayer()->getPayerInfo();
            $shipping_address = $payerInfo->getShippingAddress();
            $full_address = $shipping_address->line1.' '.$shipping_address->city.' 
             '.$shipping_address->state.' '.$shipping_address->postal_code.' '.$shipping_address->country_code;

            $transactions = $confirmOrder->getTransactions();
            $resources = $transactions[0]->getRelatedResources();
            //var_dump($resources);

            $sale = $resources[0]->getSale();
            $saleID = $sale->getId();
           // echo '$saleID: '.$saleID;

            $data = array(
                'complete' => '1',
                'payer_email' => $payerInfo->email,
                'payer_name' => $shipping_address->recipient_name, //$payerInfo->first_name.' '.$payerInfo->last_name,
                'shipping_address' => $full_address,
                'phone' =>  isset($payerInfo->phone) ? $payerInfo->phone : 0,
                'payee_email' => $confirmOrder->getTransactions()[0]->getPayee()->email,
                'sale_id' => $confirmOrder->getTransactions()[0]->getRelatedResources()[0]->getSale()->id,
                'create_time' => $confirmOrder->update_time


            );
            $where = array(
                'payment_id'=>$confirmOrder->getId()
            );
            $this->db->update($this->table, $data, $where);
            $this->session->unset_userdata('payment_hash');
            return $this->db->affected_rows();

        }
    }
}