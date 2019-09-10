<?php

function checkToken() {
    $ci = &get_instance();

    $token = $ci->input->server("token", true);

    //cekToken
    $query = "select token_user, token_expired_user from user where token_user = $token";
    $user = $ci->db->query($query)->row();
    $hariIni = date("Y-m-d");

    //cek apakah token sudah expired
    if ($user != null) {
        if ($hariIni > $user->token_expired_user) {
            return false;
        }
    } else {
        return false;
    }
    return true;
}
