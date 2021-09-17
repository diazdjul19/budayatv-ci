<?php
header('Content-Type: text/html; charset=utf-8');

function update_config_installed()
{
    $CI =& get_instance();
    $config_path = APPPATH . 'config/config.php';
    $CI->load->helper('file');
    @chmod($config_path, FILE_WRITE_MODE);
    $config_file = fread($config_path);
    $config_file = trim($config_file);
    $prefix = "http://";
    if (isset($_SERVER['HTTPS']) && !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') {
        $prefix = 'https://';
    }
    $base_url = $prefix . $_SERVER['HTTP_HOST'];
    $base_url .= preg_replace('@/+$@', '', dirname($_SERVER['SCRIPT_NAME'])) . '/';
    $config_file = str_replace("\$config['installed'] = false;", "\$config['installed'] = true;", $config_file);
    $config_file = str_replace("\$config['base_url'] = '';", "\$config['base_url'] = '" . $base_url . "';", $config_file);
    if (!$fp = fopen($config_path, FOPEN_WRITE_CREATE_DESTRUCTIVE)) {
        return FALSE;
    }
    flock($fp, LOCK_EX);
    fwrite($fp, $config_file, strlen($config_file));
    flock($fp, LOCK_UN);
    fclose($fp);
    @chmod($config_path, FILE_READ_MODE);
    return TRUE;
}

function get_strftime_format()
{
    $format = get_current_date_format();
    if (strpos($format, '/') !== false) {
        $sep = '/';
    } else if (strpos($format, '-') !== false) {
        $sep = '-';
    } else if (strpos($format, '.') !== false) {
        $sep = '.';
    } else {
        return $format;
    }

    return '%' . str_replace($sep, $sep . '%', $format);
}

function get_current_date_format()
{
    $format = get_option('dateformat');
    $format = explode('|', $format);
    return $format[0];
}

function is_admin($staffid = '')
{
    $_staffid = get_staff_user_id();
    if ($staffid) {
        $_staffid = $staffid;
    }
    $CI =& get_instance();
    $CI->db->where('admin_user', 1);
    $CI->db->where('id_user', $_staffid);
    $admin = $CI->db->get('user')->row();
    if ($admin) {
        return true;
    }

    return false;

}

function is_logged_in()
{
    $CI =& get_instance();
    if (!$CI->session->has_userdata('client_logged_in') && !$CI->session->has_userdata('staff_logged_in')) {
        return false;
    }
    return true;
}

function is_staff_logged_in()
{
    $CI =& get_instance();
    if ($CI->session->has_userdata('staff_logged_in')) {
        return true;
    }
    return false;
}

function get_staff_user_id()
{
    $CI =& get_instance();
    if (!$CI->session->has_userdata('staff_logged_in')) {
        return false;
    }
    return $CI->session->userdata('staff_user_id');
}

function get_client_user_id()
{
    $CI =& get_instance();
    if (!$CI->session->has_userdata('client_logged_in')) {
        return false;
    }
    return $CI->session->userdata('client_user_id');
}

function admin_url($url = '')
{
    if ($url == '') {
        return site_url(ADMIN_URL) . '/';
    } else {
        return site_url(ADMIN_URL . '/' . $url);
    }
}

function _l($line, $label = '')
{
    $CI =& get_instance();
    if (is_array($label)) {
        $_line = vsprintf($CI->lang->line($line), $label);
    } else {
        $_line = sprintf($CI->lang->line($line), $label);
    }
    if ($_line !== '') {
        return $_line;
    }
    // dont change this line
    return 'translate_not_found_' . $line;
}

function _d($date)
{
    if (!is_date($date)) {
        return $date;
    }
    $format = get_current_date_format();
    if (strpos($date, ' ') === true) {
        $_date = new DateTime($date);
        $_date = $_date->format($format . ' H:i:s');
        if (is_date($_date)) {
            return $_date;
        }
        return $date;
    }
    $_date = new DateTime($date);
    $_date = $_date->format($format);
    if (is_date($_date)) {
        return $_date;
    }
    return $date;
}

function _dt($date)
{
    if (!is_date($date)) {
        return $date;
    }
    $_date = new DateTime($date);
    $_date = $_date->format(get_current_date_format() . ' H:i:s');
    if (is_date($_date)) {
        return $_date;
    }
    return $date;
}

function to_sql_date($date)
{
    if ($date == '') {
        return;
    }
    return DateTime::createFromFormat(get_current_date_format(), $date)->format('Y-m-d');
}

function is_date($date)
{
    return (bool)strtotime($date);
}

function get_locale_key($language = 'english')
{
    if ($language == '') {
        return 'en';
    }
    $locales = get_locales();

    if (isset($locales[$language])) {
        return $locales[$language];
    } else if (isset($locales[ucfirst($language)])) {
        return $locales[ucfirst($language)];
    } else {
        foreach ($locales as $key => $val) {
            $val = strtolower($val);
            $language = strtolower($language);
            if (strpos($val, $language) !== false) {
                return $key;
            }
        }
    }

    return 'en';
}

function has_permission($permission, $tipe = '')
{
    $akses = false;
    $CI =& get_instance();

    $_userid = get_staff_user_id();
    $us = $CI->db->where('id_user', $_userid)->get('user')->row();


    if (is_admin($_userid)) {
        $akses = true;
    } else {
        $role = $CI->db->from('role_permission')
            ->where('menu_rolep', $permission)
            ->where('role_id', $us->role_user)
            ->where($tipe . '_rolep', 1)
            ->get()
            ->row();

        if ($role) {
            $akses = true;
        }
    }


    return $akses;
}

