<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class User_model extends CI_Model{
        public function __construct()
        {
            parent::__construct();
        }

        public function get_user_by_login($email, $password = "") {
            $query = $this->db->query("SELECT
                * FROM users

                WHERE email LIKE ? AND status = 1
            ", array($email/* , $pass */));

            if($query->num_rows()){
                return $query->result();
                exit;
            } else {
                return '404';
            }
        }

        public function logout() {
            $dtz = new DateTimeZone("America/Argentina/Buenos_Aires");
            $dt = new DateTime("now", $dtz);
            $currentTime = $dt->format("Y-m-d") . " " . $dt->format("H:i:s");

            $user_id = $this->session->userdata('user_id');
            $this->db->set('updated_at', $currentTime);
            $this->db->where('id', $user_id);
            $this->db->update('users');
            if($this->db->affected_rows() > 0){
                return "200";

            } else {
                return "500";
            }
        }
    }
?>