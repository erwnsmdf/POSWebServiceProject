<?php

if (!defined('BASEPATH'))
    exit('No direct script acces allowed');

class Produk extends Restserver\Libraries\REST_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model("ProdukModel");
        header('Content-Type: application/json');
        if(checkToken() == false ) {
            $this->response(["pesan"=>"silahkan login"], 401);
        }
    }

    public function index_get() {
        $products = $this->ProdukModel->getAll();
        $data = array(
            "meta" => array(
                "total_data" => sizeof($products)
            ),
            "produk_data" => $products,
        );
        echo json_encode($data);
    }

    public function index_post() {
        $data = array(
            "nama_produk" => $this->input->post("nama_produk", true),
            "harga_produk" => $this->input->post("harga_produk", true),
            "stok_produk" => $this->input->post("stok_produk", true),
            "gambar_produk" => $this->input->post("gambar_produk", true),
        );
        $result = $this->ProdukModel->insert($data);
        $pesan = array();
        if ($result) {
            $pesan = array(
                "message" => "Data produk berhasil disimpan"
            );
            $this->response($pesan, 200);
        } else {
            $pesan = array(
                "message" => "Data produk gagal disimpan"
            );
            $this->response($pesan, 500);
        }
    }

}
