<?php

class Auth extends Restserver\Libraries\REST_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model("AuthModel");
    }

    function index_post() {
        $username = $this->input->server("PHP_AUTH_USER");
        $password = $this->input->server("PHP_AUTH_PW");
        $user = $this->AuthModel->checkUser($username, $password);
        if ($user != null) {

            $token = md5($user->username_user . date("d M Y H:i:s"));
            $tokenExpiredUser = date('Y-m-d', strtotime(date("Y-m-d") . " + 7 days"));
            $dataToken = array(
                "token_user" => $token,
                "token_expired_user" => $tokenExpiredUser
            );
            $this->AuthModel->updateExpiredAndTokenUser($user->id_user, $dataToken);

            //data yang dikembalikan ke client
            $data = array(
                "username" => $user->username_user,
                "token" => $token,
                "token_expired" => $tokenExpiredUser
            );
            $this->response($data, 200);
        } else {
            $pesan = array(
                "message" => "Login gagal, username dan password tidak ditemukan"
            );
            $this->response($pesan, 401);
        }
    }

}
