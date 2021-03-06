<?php

function get_diff($date1, $date2){
    $dStart = new DateTime($date1);
    $dEnd  = new DateTime($date2);
    $dDiff = $dStart->diff($dEnd);
    return $dDiff->days;
}


/**
 * Format seconds to quantity
 * @param  mixed  $sec      total seconds
 * @return [integer]
 */
function sec2qty ($sec)
{
    $seconds = $sec / 3600;
    return round($seconds,2);
}
/**
 * Format seconds to hours/minutes or seconds
 * @param  mixed $seconds
 * @return mixed
 */
function format_seconds($seconds){
    $minutes = $seconds / 60;
    $hours   = $minutes / 60;
    if ($minutes >= 60) {
        return round($hours, 2) . ' '. _l('hours');
    } elseif ($seconds > 60) {
        return round($minutes, 2) . ' ' . _l('minutes');
    } else {
        return $seconds .' ' ._l('seconds');
    }
}
/**
 * Get system favourite colors
 * @return array
 */
function get_system_favourite_colors()
{
    // dont delete any of these colors are used all over the system
    $colors = array(
        '#28B8DA',
        '#03a9f4',
        '#c53da9',
        '#757575',
        '#8e24aa',
        '#d81b60',
        '#0288d1',
        '#7cb342',
        '#fb8c00'
    );
    $colors = do_action('get_kan_ban_colors', $colors);
    return $colors;
}
function get_goal_types()
{
    $types = array(
        array(
            'key' => 1,
            'lang_key' => 'goal_type_total_income',
            'subtext' => 'goal_type_income_subtext'
        ),
        array(
            'key' => 2,
            'lang_key' => 'goal_type_convert_leads'
        ),
        array(
            'key' => 3,
            'lang_key' => 'goal_type_increase_customers_without_leads_conversions',
            'subtext' => 'goal_type_increase_customers_without_leads_conversions_subtext'
        ),
        array(
            'key' => 4,
            'lang_key' => 'goal_type_increase_customers_with_leads_conversions',
            'subtext' => 'goal_type_increase_customers_with_leads_conversions_subtext'
        ),
        array(
            'key' => 5,
            'lang_key' => 'goal_type_make_contracts_by_type_calc_database',
            'subtext' => 'goal_type_make_contracts_by_type_calc_database_subtext'
        ),
        array(
            'key' => 7,
            'lang_key' => 'goal_type_make_contracts_by_type_calc_date',
            'subtext' => 'goal_type_make_contracts_by_type_calc_date_subtext'
        ),
        array(
            'key' => 6,
            'lang_key' => 'goal_type_total_estimates_converted',
            'subtext' => 'goal_type_total_estimates_converted_subtext'
        )
    );
    return do_action('get_goal_types', $types);
}
function format_goal_type($key)
{
    foreach (get_goal_types() as $type) {
        if ($type['key'] == $key) {
            return _l($type['lang_key']);
        }
    }
    return $type;
}
/**
 * Set session alert / flashdata
 * @param string $type    Alert type
 * @param string $message Alert message
 */
function set_alert($type, $message)
{
    $CI =& get_instance();
    $CI->session->set_flashdata('message-' . $type, $message);
}
/**
 * Redirect to blank page
 * @param  string $message Alert message
 * @param  string $alert   Alert type
 */
function blank_page($message = '', $alert = 'danger')
{
    set_alert($alert, $message);
    redirect(admin_url('not_found'));
}
/**
 * Redirect to access danied page and log activity
 * @param  string $permission If permission based to check where user tried to acces
 */
function access_denied($permission = '', $tipe = '')
{
    $CI =& get_instance();
    set_alert('danger', _l('access_denied'));
    logActivity('Tried to access page where dont have permission [Permission: ' . $permission . ', Tipe: '.$tipe.' , User: '.get_staff_user_id().', IP: '.$CI->input->ip_address().']');
    redirect(admin_url('access_denied'));
}
/**
 * Set debug message - message wont be hidden in X seconds from javascript
 * @since  Version 1.0.1
 * @param string $message debug message
 */
function set_debug_alert($message)
{
    $CI =& get_instance();
    $CI->session->set_flashdata('debug', $message);
}
/**
 * Available date formats
 * @return array
 */
function get_available_date_formats()
{
    $date_formats = array(
        'Y-m-d|yyyy-mm-dd' => 'yyyy-mm-dd',
        'm/d/Y|mm/dd/yyyy' => 'mm/dd/yyyy',
        'Y/m/d|yyyy/mm/dd' => 'yyyy/mm/dd',
        'd.m.Y|dd.mm.yyyy' => 'dd.mm.yyyy'
    );
    return do_action('get_available_date_formats', $date_formats);
}
/**
 * Get weekdays as array
 * @return array
 */
function get_weekdays()
{
    return array(
        _l('wd_monday'),
        _l('wd_tuesday'),
        _l('wd_wednesday'),
        _l('wd_thursday'),
        _l('wd_friday'),
        _l('wd_saturday'),
        _l('wd_sunday')
    );
}
/**
 * Get non translated week days for query help
 * @return array
 */
function get_weekdays_original()
{
    return array(
        'Monday',
        'Tuesday',
        'Wednesday',
        'Thursday',
        'Friday',
        'Saturday',
        'Sunday'
    );
}
/**
 * Format datetime to time ago with specific hours mins and seconds
 * @param  datetime $lastreply
 * @param  string $from      Optional
 * @return mixed
 */
function time_ago_specific($date, $from = "now")
{
    $datetime   = strtotime("now");
    $date2      = strtotime("" . $date);
    $holdtotsec = $datetime - $date2;
    $holdtotmin = ($datetime - $date2) / 60;
    $holdtothr  = ($datetime - $date2) / 3600;
    $holdtotday = intval(($datetime - $date2) / 86400);
    $str        = '';
    if (0 < $holdtotday) {
        $str .= $holdtotday . "d ";
    }
    $holdhr = intval($holdtothr - $holdtotday * 24);
    $str .= $holdhr . "h ";
    $holdmr = intval($holdtotmin - ($holdhr * 60 + $holdtotday * 1440));
    $str .= $holdmr . "m";
    return $str;
}
/**
 * Short Time ago function
 * @param  datetime $time_ago
 * @return mixed
 */
function time_ago($time_ago)
{
    $time_ago     = strtotime($time_ago);
    $cur_time     = time();
    $time_elapsed = $cur_time - $time_ago;
    $seconds      = $time_elapsed;
    $minutes      = round($time_elapsed / 60);
    $hours        = round($time_elapsed / 3600);
    $days         = round($time_elapsed / 86400);
    $weeks        = round($time_elapsed / 604800);
    $months       = round($time_elapsed / 2600640);
    $years        = round($time_elapsed / 31207680);
    // Seconds
    if ($seconds <= 60) {
        return "Just Now";
    }
    //Minutes
    else if ($minutes <= 60) {
        if ($minutes == 1) {
            return '1 menit yang lalu';
        } else {
            return $minutes.' menit yang lalu';
        }
    }
    //Hours
    else if ($hours <= 24) {
        if ($hours == 1) {
            return "1 jam yang lalu";
        } else {
            return $hours. ' jam yang lalu';
        }
    }
    //Days
    else if ($days <= 7) {
        if ($days == 1) {
            return "kemarin";
        } else {
            return $days.' hari yang lalu';
        }
    }
    //Weeks
    else if ($weeks <= 4.3) {
        if ($weeks == 1) {
            return 'minggu kemarin';
        } else {
            return $weeks.' minggu yang lalu';
        }
    }
    //Months
    else if ($months <= 12) {
        if ($months == 1) {
            return "bulan kemarin";
        } else {
            return $months.' bulan yang lalu';
        }
    }
    //Years
    else {
        if ($years == 1) {
            return "1 tahun yang lalu";
        } elseif ($years > 1 && $years <= 5) {
            return $years. ' tahun yang lalu';
        }else{
            return "Tidak pernah";
        }
    }
}
/**
 * Helper function to get text question answers
 * @param  integer $questionid
 * @param  itneger $surveyid
 * @return array
 */
function get_text_question_answers($questionid, $surveyid)
{
    $CI =& get_instance();
    $CI->db->select('answer,resultid');
    $CI->db->from('tblsurveyresults');
    $CI->db->where('questionid', $questionid);
    $CI->db->where('surveyid', $surveyid);
    return $CI->db->get()->result_array();
}
/**
 * Get department email address
 * @param  mixed $id department id
 * @return mixed
 */
function get_department_email($id)
{
    $CI =& get_instance();
    $CI->db->where('departmentid', $id);
    return $CI->db->get('tbldepartments')->row()->email;
}
/**
 * Helper function to get all knowledbase groups
 * @return array
 */
function get_kb_groups()
{
    $CI =& get_instance();
    return $CI->db->get('tblknowledgebasegroups')->result_array();
}
/**
 * Get all countries stored in database
 * @return array
 */
function get_all_countries()
{
    $CI =& get_instance();
    return $CI->db->get('tblcountries')->result_array();
}
/**
 * Get country short name by passed id
 * @param  mixed $id county id
 * @return mixed
 */
function get_country_short_name($id)
{
    $CI =& get_instance();
    $CI->db->where('country_id', $id);
    $country = $CI->db->get('tblcountries')->row();
    if ($country) {
        return $country->iso2;
    }
    return '';
}
/**
 * Helper function to get all knowledge base groups in the parents groups
 * @param  boolean $include_inactive inactive groups all articles if passed true
 * @return array
 */
function get_all_knowledge_base_articles_grouped()
{
    $CI =& get_instance();
    $CI->load->model('knowledge_base_model');
    $groups = $CI->knowledge_base_model->get_kbg('', 1);
    $i      = 0;
    foreach ($groups as $group) {
        $CI->db->select('slug,subject,description,tblknowledgebase.active as active_article,articlegroup,articleid');
        $CI->db->from('tblknowledgebase');
        $CI->db->where('articlegroup', $group['groupid']);
        $CI->db->order_by('article_order', 'asc');
        $articles = $CI->db->get()->result_array();
        if (count($articles) == 0) {
            unset($groups[$i]);
            $i++;
            continue;
        }
        $groups[$i]['articles'] = $articles;
        $i++;
    }
    return $groups;
}

/**
 * Helper function to get all announcements for user
 * @param  boolean $staff Is this client or staff
 * @return array
 */
function get_announcements_for_user($staff = true)
{
    if (!is_logged_in()) {
        return array();
    }
    $CI =& get_instance();
    $CI->db->select('firstname,lastname,announcementid,name,message,showtousers,showtostaff,showname,tblannouncements.dateadded,tblannouncements.userid')->join('tblstaff', 'tblstaff.staffid = tblannouncements.userid', 'left')->from('tblannouncements');
    $announcements = $CI->db->get()->result_array();
    $i             = 0;
    foreach ($announcements as $annoucement) {
        if ($staff == true) {
            if ($annoucement['showtostaff'] != 1) {
                unset($announcements[$i]);
            }
        } else {
            if ($annoucement['showtousers'] != 1) {
                unset($announcements[$i]);
            }
        }
        $i++;
    }
    // Refresh array keys
    $announcements = array_values($announcements);
    if ($staff == true) {
        $userid = get_staff_user_id();
    } else {
        $userid = get_client_user_id();
    }
    $i = 0;
    foreach ($announcements as $announcement) {
        $CI->db->where('announcementid', $announcement['announcementid']);
        $CI->db->where('staff', $staff);
        $CI->db->where('userid', $userid);
        $dismissed = $CI->db->get('tbldismissedannouncements')->row();
        if ($dismissed) {
            unset($announcements[$i]);
        }
        $i++;
    }
    return $announcements;
}
/**
 * Slug function
 * @param  string $str
 * @param  array  $options Additional Options
 * @return mixed
 */
function slug_it($str, $options = array())
{
    // Make sure string is in UTF-8 and strip invalid UTF-8 characters
    $str      = mb_convert_encoding((string) $str, 'UTF-8', mb_list_encodings());
    $defaults = array(
        'delimiter' => '-',
        'limit' => null,
        'lowercase' => true,
        'replacements' => array(
            '
            /\b(??)\b/i' => 'gj',
            '/\b(??)\b/i' => 'ch',
            '/\b(??)\b/i' => 'sh',
            '/\b(??)\b/i' => 'lj'
        ),
        'transliterate' => true
    );
    // Merge options
    $options  = array_merge($defaults, $options);
    $char_map = array(
        // Latin
        '??' => 'A',
        '??' => 'A',
        '??' => 'A',
        '??' => 'A',
        '??' => 'A',
        '??' => 'A',
        '??' => 'AE',
        '??' => 'C',
        '??' => 'E',
        '??' => 'E',
        '??' => 'E',
        '??' => 'E',
        '??' => 'I',
        '??' => 'I',
        '??' => 'I',
        '??' => 'I',
        '??' => 'D',
        '??' => 'N',
        '??' => 'O',
        '??' => 'O',
        '??' => 'O',
        '??' => 'O',
        '??' => 'O',
        '??' => 'O',
        '??' => 'O',
        '??' => 'U',
        '??' => 'U',
        '??' => 'U',
        '??' => 'U',
        '??' => 'U',
        '??' => 'Y',
        '??' => 'TH',
        '??' => 'ss',
        '??' => 'a',
        '??' => 'a',
        '??' => 'a',
        '??' => 'a',
        '??' => 'a',
        '??' => 'a',
        '??' => 'ae',
        '??' => 'c',
        '??' => 'e',
        '??' => 'e',
        '??' => 'e',
        '??' => 'e',
        '??' => 'i',
        '??' => 'i',
        '??' => 'i',
        '??' => 'i',
        '??' => 'd',
        '??' => 'n',
        '??' => 'o',
        '??' => 'o',
        '??' => 'o',
        '??' => 'o',
        '??' => 'o',
        '??' => 'o',
        '??' => 'o',
        '??' => 'u',
        '??' => 'u',
        '??' => 'u',
        '??' => 'u',
        '??' => 'u',
        '??' => 'y',
        '??' => 'th',
        '??' => 'y',
        // Latin symbols
        '??' => '(c)',
        // Greek
        '??' => 'A',
        '??' => 'B',
        '??' => 'G',
        '??' => 'D',
        '??' => 'E',
        '??' => 'Z',
        '??' => 'H',
        '??' => '8',
        '??' => 'I',
        '??' => 'K',
        '??' => 'L',
        '??' => 'M',
        '??' => 'N',
        '??' => '3',
        '??' => 'O',
        '??' => 'P',
        '??' => 'R',
        '??' => 'S',
        '??' => 'T',
        '??' => 'Y',
        '??' => 'F',
        '??' => 'X',
        '??' => 'PS',
        '??' => 'W',
        '??' => 'A',
        '??' => 'E',
        '??' => 'I',
        '??' => 'O',
        '??' => 'Y',
        '??' => 'H',
        '??' => 'W',
        '??' => 'I',
        '??' => 'Y',
        '??' => 'a',
        '??' => 'b',
        '??' => 'g',
        '??' => 'd',
        '??' => 'e',
        '??' => 'z',
        '??' => 'h',
        '??' => '8',
        '??' => 'i',
        '??' => 'k',
        '??' => 'l',
        '??' => 'm',
        '??' => 'n',
        '??' => '3',
        '??' => 'o',
        '??' => 'p',
        '??' => 'r',
        '??' => 's',
        '??' => 't',
        '??' => 'y',
        '??' => 'f',
        '??' => 'x',
        '??' => 'ps',
        '??' => 'w',
        '??' => 'a',
        '??' => 'e',
        '??' => 'i',
        '??' => 'o',
        '??' => 'y',
        '??' => 'h',
        '??' => 'w',
        '??' => 's',
        '??' => 'i',
        '??' => 'y',
        '??' => 'y',
        '??' => 'i',
        // Turkish
        '??' => 'S',
        '??' => 'I',
        '??' => 'C',
        '??' => 'U',
        '??' => 'O',
        '??' => 'G',
        '??' => 's',
        '??' => 'i',
        '??' => 'c',
        '??' => 'u',
        '??' => 'o',
        '??' => 'g',
        // Russian
        '??' => 'A',
        '??' => 'B',
        '??' => 'V',
        '??' => 'G',
        '??' => 'D',
        '??' => 'E',
        '??' => 'Yo',
        '??' => 'Zh',
        '??' => 'Z',
        '??' => 'I',
        '??' => 'J',
        '??' => 'K',
        '??' => 'L',
        '??' => 'M',
        '??' => 'N',
        '??' => 'O',
        '??' => 'P',
        '??' => 'R',
        '??' => 'S',
        '??' => 'T',
        '??' => 'U',
        '??' => 'F',
        '??' => 'H',
        '??' => 'C',
        '??' => 'Ch',
        '??' => 'Sh',
        '??' => 'Sh',
        '??' => '',
        '??' => 'Y',
        '??' => '',
        '??' => 'E',
        '??' => 'Yu',
        '??' => 'Ya',
        '??' => 'a',
        '??' => 'b',
        '??' => 'v',
        '??' => 'g',
        '??' => 'd',
        '??' => 'e',
        '??' => 'yo',
        '??' => 'zh',
        '??' => 'z',
        '??' => 'i',
        '??' => 'j',
        '??' => 'k',
        '??' => 'l',
        '??' => 'm',
        '??' => 'n',
        '??' => 'o',
        '??' => 'p',
        '??' => 'r',
        '??' => 's',
        '??' => 't',
        '??' => 'u',
        '??' => 'f',
        '??' => 'h',
        '??' => 'c',
        '??' => 'ch',
        '??' => 'sh',
        '??' => 'sh',
        '??' => '',
        '??' => 'y',
        '??' => '',
        '??' => 'e',
        '??' => 'yu',
        '??' => 'ya',
        // Ukrainian
        '??' => 'Ye',
        '??' => 'I',
        '??' => 'Yi',
        '??' => 'G',
        '??' => 'ye',
        '??' => 'i',
        '??' => 'yi',
        '??' => 'g',
        // Czech
        '??' => 'C',
        '??' => 'D',
        '??' => 'E',
        '??' => 'N',
        '??' => 'R',
        '??' => 'S',
        '??' => 'T',
        '??' => 'U',
        '??' => 'Z',
        '??' => 'c',
        '??' => 'd',
        '??' => 'e',
        '??' => 'n',
        '??' => 'r',
        '??' => 's',
        '??' => 't',
        '??' => 'u',
        '??' => 'z',
        // Polish
        '??' => 'A',
        '??' => 'C',
        '??' => 'e',
        '??' => 'L',
        '??' => 'N',
        '??' => 'o',
        '??' => 'S',
        '??' => 'Z',
        '??' => 'Z',
        '??' => 'a',
        '??' => 'c',
        '??' => 'e',
        '??' => 'l',
        '??' => 'n',
        '??' => 'o',
        '??' => 's',
        '??' => 'z',
        '??' => 'z',
        // Latvian
        '??' => 'A',
        '??' => 'C',
        '??' => 'E',
        '??' => 'G',
        '??' => 'i',
        '??' => 'k',
        '??' => 'L',
        '??' => 'N',
        '??' => 'S',
        '??' => 'u',
        '??' => 'Z',
        '??' => 'a',
        '??' => 'c',
        '??' => 'e',
        '??' => 'g',
        '??' => 'i',
        '??' => 'k',
        '??' => 'l',
        '??' => 'n',
        '??' => 's',
        '??' => 'u',
        '??' => 'z'
    );
    // Make custom replacements
    $str      = preg_replace(array_keys($options['replacements']), $options['replacements'], $str);
    // Transliterate characters to ASCII
    if ($options['transliterate']) {
        $str = str_replace(array_keys($char_map), $char_map, $str);
    }
    // Replace non-alphanumeric characters with our delimiter
    $str = preg_replace('/[^\p{L}\p{Nd}]+/u', $options['delimiter'], $str);
    // Remove duplicate delimiters
    $str = preg_replace('/(' . preg_quote($options['delimiter'], '/') . '){2,}/', '$1', $str);
    // Truncate slug to max. characters
    $str = mb_substr($str, 0, ($options['limit'] ? $options['limit'] : mb_strlen($str, 'UTF-8')), 'UTF-8');
    // Remove delimiter from ends
    $str = trim($str, $options['delimiter']);
    return $options['lowercase'] ? mb_strtolower($str, 'UTF-8') : $str;
}

/**
 * Get string bettween words
 * @param  string $string the string to get from
 * @param  string $start  where to start
 * @param  string $end    where to end
 * @return string formated string
 */
function get_string_between($string, $start, $end){
    $string = ' ' . $string;
    $ini = strpos($string, $start);
    if ($ini == 0) return '';
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;
    return substr($string, $ini, $len);
}
/**
 * Get projcet billing type
 * @param  mixed $project_id
 * @return mixed
 */
function get_project_billing_type($project_id)
{
    $CI =& get_instance();
    $CI->db->where('id', $project_id);
    $project = $CI->db->get('tblprojects')->row();
    if ($project) {
        return $project->billing_type;
    }
    return false;
}
/**
 * Get client id by lead id
 * @since  Version 1.0.1
 * @param  mixed $id lead id
 * @return mixed     client id
 */
function get_client_id_by_lead_id($id)
{
    $CI =& get_instance();
    $CI->db->select('userid')->from('tblclients')->where('leadid', $id);
    return $CI->db->get()->row()->userid;
}
/**
 * Check if the user is lead creator
 * @since  Version 1.0.4
 * @param  mixed  $leadid leadid
 * @param  mixed  $id staff id (Optional)
 * @return boolean
 */
function is_lead_creator($leadid, $id = '')
{
    if (!is_numeric($id)) {
        $id = get_staff_user_id();
    }
    $is = total_rows('tblleads', array(
        'addedfrom' => $id,
        'id' => $leadid
    ));
    if ($is > 0) {
        return true;
    }
    return false;
}

/**
 * When ticket will be opened automatically set to open
 * @param integer  $current Current status
 * @param integer  $id      ticketid
 * @param boolean $admin   Admin opened or client opened
 */
function set_ticket_open($current, $id, $admin = true)
{
    if ($current == 1) {
        return;
    }
    $CI =& get_instance();
    $CI->db->where('ticketid', $id);
    $field = 'adminread';
    if ($admin == false) {
        $field = 'clientread';
    }
    $CI->db->update('tbltickets', array(
        $field => 1
    ));
}
/**
 * Get timezones list
 * @return array timezones
 */
function get_timezones_list()
{
    return $timezones = array(
        'Pacific/Midway' => "(GMT-11:00) Midway Island",
        'US/Samoa' => "(GMT-11:00) Samoa",
        'US/Hawaii' => "(GMT-10:00) Hawaii",
        'US/Alaska' => "(GMT-09:00) Alaska",
        'US/Pacific' => "(GMT-08:00) Pacific Time (US &amp; Canada)",
        'America/Tijuana' => "(GMT-08:00) Tijuana",
        'US/Arizona' => "(GMT-07:00) Arizona",
        'US/Mountain' => "(GMT-07:00) Mountain Time (US &amp; Canada)",
        'America/Chihuahua' => "(GMT-07:00) Chihuahua",
        'America/Mazatlan' => "(GMT-07:00) Mazatlan",
        'America/Mexico_City' => "(GMT-06:00) Mexico City",
        'America/Monterrey' => "(GMT-06:00) Monterrey",
        'Canada/Saskatchewan' => "(GMT-06:00) Saskatchewan",
        'US/Central' => "(GMT-06:00) Central Time (US &amp; Canada)",
        'US/Eastern' => "(GMT-05:00) Eastern Time (US &amp; Canada)",
        'US/East-Indiana' => "(GMT-05:00) Indiana (East)",
        'America/Bogota' => "(GMT-05:00) Bogota",
        'America/Lima' => "(GMT-05:00) Lima",
        'America/Caracas' => "(GMT-04:30) Caracas",
        'Canada/Atlantic' => "(GMT-04:00) Atlantic Time (Canada)",
        'America/La_Paz' => "(GMT-04:00) La Paz",
        'America/Santiago' => "(GMT-04:00) Santiago",
        'Canada/Newfoundland' => "(GMT-03:30) Newfoundland",
        'America/Buenos_Aires' => "(GMT-03:00) Buenos Aires",
        'Greenland' => "(GMT-03:00) Greenland",
        'Atlantic/Stanley' => "(GMT-02:00) Stanley",
        'Atlantic/Azores' => "(GMT-01:00) Azores",
        'Atlantic/Cape_Verde' => "(GMT-01:00) Cape Verde Is.",
        'Africa/Casablanca' => "(GMT) Casablanca",
        'Europe/Dublin' => "(GMT) Dublin",
        'Europe/Lisbon' => "(GMT) Lisbon",
        'Europe/London' => "(GMT) London",
        'Africa/Monrovia' => "(GMT) Monrovia",
        'Europe/Amsterdam' => "(GMT+01:00) Amsterdam",
        'Europe/Belgrade' => "(GMT+01:00) Belgrade",
        'Europe/Berlin' => "(GMT+01:00) Berlin",
        'Europe/Bratislava' => "(GMT+01:00) Bratislava",
        'Europe/Brussels' => "(GMT+01:00) Brussels",
        'Europe/Budapest' => "(GMT+01:00) Budapest",
        'Europe/Copenhagen' => "(GMT+01:00) Copenhagen",
        'Europe/Ljubljana' => "(GMT+01:00) Ljubljana",
        'Europe/Madrid' => "(GMT+01:00) Madrid",
        'Europe/Paris' => "(GMT+01:00) Paris",
        'Europe/Prague' => "(GMT+01:00) Prague",
        'Europe/Rome' => "(GMT+01:00) Rome",
        'Europe/Sarajevo' => "(GMT+01:00) Sarajevo",
        'Europe/Skopje' => "(GMT+01:00) Skopje",
        'Europe/Stockholm' => "(GMT+01:00) Stockholm",
        'Europe/Vienna' => "(GMT+01:00) Vienna",
        'Europe/Warsaw' => "(GMT+01:00) Warsaw",
        'Europe/Zagreb' => "(GMT+01:00) Zagreb",
        'Europe/Athens' => "(GMT+02:00) Athens",
        'Europe/Bucharest' => "(GMT+02:00) Bucharest",
        'Africa/Cairo' => "(GMT+02:00) Cairo",
        'Africa/Harare' => "(GMT+02:00) Harare",
        'Europe/Helsinki' => "(GMT+02:00) Helsinki",
        'Europe/Istanbul' => "(GMT+02:00) Istanbul",
        'Asia/Jerusalem' => "(GMT+02:00) Jerusalem",
        'Europe/Kiev' => "(GMT+02:00) Kyiv",
        'Europe/Minsk' => "(GMT+02:00) Minsk",
        'Europe/Riga' => "(GMT+02:00) Riga",
        'Europe/Sofia' => "(GMT+02:00) Sofia",
        'Europe/Tallinn' => "(GMT+02:00) Tallinn",
        'Europe/Vilnius' => "(GMT+02:00) Vilnius",
        'Asia/Baghdad' => "(GMT+03:00) Baghdad",
        'Asia/Kuwait' => "(GMT+03:00) Kuwait",
        'Africa/Nairobi' => "(GMT+03:00) Nairobi",
        'Asia/Riyadh' => "(GMT+03:00) Riyadh",
        'Europe/Moscow' => "(GMT+03:00) Moscow",
        'Asia/Tehran' => "(GMT+03:30) Tehran",
        'Asia/Baku' => "(GMT+04:00) Baku",
        'Europe/Volgograd' => "(GMT+04:00) Volgograd",
        'Asia/Muscat' => "(GMT+04:00) Muscat",
        'Asia/Tbilisi' => "(GMT+04:00) Tbilisi",
        'Asia/Yerevan' => "(GMT+04:00) Yerevan",
        'Asia/Kabul' => "(GMT+04:30) Kabul",
        'Asia/Karachi' => "(GMT+05:00) Karachi",
        'Asia/Tashkent' => "(GMT+05:00) Tashkent",
        'Asia/Kolkata' => "(GMT+05:30) Kolkata",
        'Asia/Kathmandu' => "(GMT+05:45) Kathmandu",
        'Asia/Yekaterinburg' => "(GMT+06:00) Ekaterinburg",
        'Asia/Almaty' => "(GMT+06:00) Almaty",
        'Asia/Dhaka' => "(GMT+06:00) Dhaka",
        'Asia/Novosibirsk' => "(GMT+07:00) Novosibirsk",
        'Asia/Bangkok' => "(GMT+07:00) Bangkok",
        'Asia/Jakarta' => "(GMT+07:00) Jakarta",
        'Asia/Krasnoyarsk' => "(GMT+08:00) Krasnoyarsk",
        'Asia/Chongqing' => "(GMT+08:00) Chongqing",
        'Asia/Hong_Kong' => "(GMT+08:00) Hong Kong",
        'Asia/Kuala_Lumpur' => "(GMT+08:00) Kuala Lumpur",
        'Australia/Perth' => "(GMT+08:00) Perth",
        'Asia/Singapore' => "(GMT+08:00) Singapore",
        'Asia/Taipei' => "(GMT+08:00) Taipei",
        'Asia/Ulaanbaatar' => "(GMT+08:00) Ulaan Bataar",
        'Asia/Urumqi' => "(GMT+08:00) Urumqi",
        'Asia/Irkutsk' => "(GMT+09:00) Irkutsk",
        'Asia/Seoul' => "(GMT+09:00) Seoul",
        'Asia/Tokyo' => "(GMT+09:00) Tokyo",
        'Australia/Adelaide' => "(GMT+09:30) Adelaide",
        'Australia/Darwin' => "(GMT+09:30) Darwin",
        'Asia/Yakutsk' => "(GMT+10:00) Yakutsk",
        'Australia/Brisbane' => "(GMT+10:00) Brisbane",
        'Australia/Canberra' => "(GMT+10:00) Canberra",
        'Pacific/Guam' => "(GMT+10:00) Guam",
        'Australia/Hobart' => "(GMT+10:00) Hobart",
        'Australia/Melbourne' => "(GMT+10:00) Melbourne",
        'Pacific/Port_Moresby' => "(GMT+10:00) Port Moresby",
        'Australia/Sydney' => "(GMT+10:00) Sydney",
        'Asia/Vladivostok' => "(GMT+11:00) Vladivostok",
        'Asia/Magadan' => "(GMT+12:00) Magadan",
        'Pacific/Auckland' => "(GMT+12:00) Auckland",
        'Pacific/Fiji' => "(GMT+12:00) Fiji"
    );
}
function get_locales(){
    $locales = array(
        "Arabic"=>'ar',
        "Bulgarian"=>'bg',
        "Catalan"=>'ca',
        "Czech"=>'cs',
        "Danish"=>'da',
        "German"=>'de',
        "Greek"=>'el',
        "English"=>'en',
        "Spanish"=>'es',
        "Persian"=>'fa',
        "Finnish"=>'fi',
        "French"=>'fr',
        "Hebrew"=>'he',
        "Hindi"=>'hi',
        "Croatian"=> 'hr',
        "Hungarian"=> 'hu',
        "Indonesian"=> 'id',
        "Icelandic"=>'is',
        "Italian"=> 'it',
        "Japanese"=>'ja',
        "Korean"=>'ko',
        "Lithuanian"=>'lt',
        "Latvian"=> 'lv',
        "Norwegian"=>'nb',
        "Dutch"=>'nl',
        "Polish"=>'pl',
        "Portuguese"=> 'pt',
        "Romanian"=>'ro',
        "Russian"=> 'ru',
        "Slovak"=> 'sk',
        "Slovenian"=>'sl',
        "Serbian"=> 'sr',
        "Swedish"=>'sv',
        "Thai"=>'th',
        "Turkish"=> 'tr',
        "Ukrainian"=>'uk',
        "Vietnamese"=>'vi' ,
    );
    $locales = do_action('before_get_locales',$locales);
    return $locales;
}
