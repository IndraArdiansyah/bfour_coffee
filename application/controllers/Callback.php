<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Callback extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model(['ModelCallback']);
        $this->load->library('TripayPayment');
    }

    public function tripayCallback()
    {
        $callback = '1';
        $code = 'T33079';
        $api = 'https://tripay.co.id/api-sandbox/';
        $key = 'DEV-cVvZ6C9VhbUzvUrREzXSrokVD2qWkZnP5enPU383';
        $private = 'NhM8Q-NkAVO-QvrRk-hMtkP-PfG06';


        $tripay = new TripayPayment($api, $code, $key, $private, $callback);

        if ($tripay->verifyCallback($callback) !== true) {
            exit("Callback verification failed: " . $tripay->lastError);
        }

        $json = file_get_contents("php://input");
        $data = json_decode($json);
        $event = isset($_SERVER['HTTP_X_CALLBACK_EVENT']) ? $_SERVER['HTTP_X_CALLBACK_EVENT'] : '';

        if ($event == 'payment_status') {
            if ($data->status == 'PAID') {
                $uniqueRef = $data->merchant_ref;

                if ($result = $this->ModelCallback->where('id_booking', $uniqueRef)->where('status', 'unpaid')->first('orders')) {

                    $update = array(
                        'status' => 'paid',
                    );

                    $this->db->where('id_booking', $uniqueRef);
                    $this->db->update('orders', $update);

                    echo json_encode(['success' => true]);
                    exit;
                }
            } else {
                echo json_encode(['error' => 'Unrecognized payment status']);
                exit;
            }
        } else {
            exit('Invalid callback event, no action was taken.');
        }
    }
}
