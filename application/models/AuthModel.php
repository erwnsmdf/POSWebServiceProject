<?php

class AuthModel extends CI_Model {

    function checkUser($username, $password) {
        $this->db->select("id_user,username_user, password_user, token_user, token_expired_user");
        $this->db->from("user");
        $this->db->where("username_user",$username);
        $user = $this->db->get()->row();
        if($user != null) {
            if(password_verify($password, $user->password_user)) {
                return $user;
            }
        }
        return null;
    }

    function updateExpiredAndTokenUser($id,$data) {
        $this->db->where("id_user",$id);
        return $this->db->update("user",$data);
    }
}
