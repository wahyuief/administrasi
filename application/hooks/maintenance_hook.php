<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Check whether the site is offline or not.
 *
 */
class Maintenance_hook 
{
    var $CI;

    public function __construct(){
        $this->CI = & get_instance();
        log_message('debug','Accessing maintenance hook!');
    }
    
    public function offline_check(){
        if(file_exists(APPPATH.'config/config.php')){
            include(APPPATH.'config/config.php');
            
            if(isset($config['maintenance_mode']) && $config['maintenance_mode'] === TRUE){

                $maintenance_ips = array();
                $maintenance_ips_config = array();
                $maintenance_ips_cc_option = array();

                if(isset($config['maintenance_ips'])){
                    $maintenance_ips_config =  $config['maintenance_ips'];
                } 

                $maintenance_ips_cc_option = explode(',', get_option('maintenance_ips'));

                if($this->CI->aauth->is_admin()){
                    echo "maintenance_mode : admin";
                } else {
                    if(in_array($_SERVER['REMOTE_ADDR'], $maintenance_ips_config)){
                        echo "maintenance_mode : ips config";
                    } elseif (in_array($_SERVER['REMOTE_ADDR'], $maintenance_ips_cc_option)){
                        echo "maintenance_mode : ips cc_option";
                    } else {
                        include(APPPATH.'views/maintenance.php');
                        exit;
                    }
                }
            }
        }
    }
}