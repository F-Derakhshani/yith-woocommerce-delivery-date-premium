<?php
if( !defined('ABSPATH')){
    exit;
}

if( !class_exists( 'YITH_Delivery_Date_Integrations' ) ){
    
    class YITH_Delivery_Date_Integrations{
        
        protected static  $instance;
        
        public function __construct()
        {
            if( $this->is_multivendor_active() ){
                
                require_once( 'integrations/class.yith-multivendor-integration.php' );
            }
        }

        /**
         * @return YITH_Delivery_Date_Integrations
         */
        public static function get_instance()
        {
            if( is_null( self::$instance )){
                self::$instance = new self();
            }
            return self::$instance;
        }
        
        
        public function is_multivendor_active(){
            
            return defined( 'YITH_WPV_PREMIUM' ) && YITH_WPV_PREMIUM;
        }
    }
}


function YITH_Delivery_Date_Integrations(){
    
    return YITH_Delivery_Date_Integrations::get_instance();
}

YITH_Delivery_Date_Integrations();