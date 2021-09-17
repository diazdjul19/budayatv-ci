<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');

        $this->load->model('auth_model');
        $this->load->model('user_model');
        $this->load->model('notifikasi_model');

        $this->auth_model->autologin();

        if (!is_staff_logged_in()) {
            if (strpos($this->uri->uri_string(), 'admin') === TRUE) {
                $this->session->set_userdata(array(
                    'red_url' => $this->uri->uri_string()
                ));
            }

            redirect('/');
        }

        $c_user = $this->user_model->get(get_staff_user_id());
        $this->db->where('id_user', get_staff_user_id());
        $this->db->update('user', ['last_activity' => date('Y-m-d H:i:s')]);

        $this->load->vars(array(
            '_user'             => $c_user,
            '_notifi_user'      => $c_user->notifikasi_user,
            '_notifi_sum'       => count($this->notifikasi_model->unread()),
            '_notifi_list'      => $this->notifikasi_model->get_list(8)
        ));

        $this->auth_model->update_info();

        $this->load->library('user_agent');
        if ($this->agent->is_mobile()) {
            $this->session->set_userdata(array(
                'is_mobile' => true
            ));
        } else {
            $this->session->unset_userdata('is_mobile');
        }
    }


//    private function set_nofications()
//    {
//        $userid = get_staff_user_id();
//        $today = date('Y-m-d');
//
//        $all_notified_events = array();
//
//        // User events
//        $this->db->where('start', $today);
//        $this->db->where('userid', $userid);
//        $this->db->where('isstartnotified', 0);
//
//        $events = $this->db->get('tblevents')->result_array();
//
//        foreach ($events as $event) {
//            add_notification(array(
//                'description' => _l('not_event', substr($event['title'], 0, 50)),
//                'touserid' => $userid,
//                'fromcompany' => true
//            ));
//
//            array_push($all_notified_events, $event['eventid']);
//        }
//
//        // Show public events
//        $this->load->model('staff_model');
//        $this->db->where('start', $today);
//        $this->db->where('public', 1);
//        $this->db->where('userid !=', $userid);
//        $this->db->where('isstartnotified', 0);
//        $events = $this->db->get('tblevents')->result_array();
//        $staff = $this->staff_model->get('', 1);
//
//        foreach ($staff as $member) {
//            foreach ($events as $event) {
//                add_notification(array(
//                    'description' => _l('not_event_public', substr($event['title'], 0, 50)),
//                    'touserid' => $userid,
//                    'fromcompany' => true
//                ));
//                array_push($all_notified_events, $event['eventid']);
//            }
//        }
//
//        foreach ($all_notified_events as $id) {
//            $this->db->where('eventid', $id);
//            $this->db->update('tblevents', array(
//                'isstartnotified' => 1
//            ));
//        }
//    }
}
