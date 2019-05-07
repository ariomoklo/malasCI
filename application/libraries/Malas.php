<?php
require_once __DIR__ . '/../third_party/RedBean/rb.php';
defined('BASEPATH') OR exit('No direct script access allowed');

/** Simple Library to parse .env 
 *  @link https://github.com/vlucas/phpdotenv
 */
use Dotenv\Dotenv;

/**
 * @package Malas Libraries
 * @author  Ario Widiatmoko
 *          ariowidiatmoko@gmail.com
 *          @ariomoklo
 * 
 * @link    https://github.com/ariomoklo/malasCI
 * @created 24 April 2019
 */

class Malas {
    
    /**
	 * Enables the use of CI super-global without having to define an extra variable.
	 * Found this useful snippet from Ion_Auth 2 Code Igniter Libraries:
     * https://github.com/benedmunds/CodeIgniter-Ion-Auth/blob/3/libraries/Ion_auth.php
	 *
	 * @param   string $var
	 * @return  mixed
	 */
	public function __get($var){
		return get_instance()->$var;
    }

    /**
     * Start RedBean Database connection in Constructor
     */
    public function __construct(){
        // Load .env data using vlucas/phpdotenv
        $dotenv = Dotenv::create(FCPATH);
        $dotenv->load();

        // load Database by RedBean
        $this->connectDB();
    }

    public function validator(){
        $validator = new Validator();
        return $validator;
    }
    
    /**
     * Connect to Database using Redbean with configuration
     * from .env but if not available use regular CI Config
     */
    private function connectDB(){
        if(isset($_ENV['DB_HOST'])){
            // Database Configuration by .env
            $host = $_ENV['DB_HOST'];
            $user = $_ENV['DB_USER'];
            $pass = $_ENV['DB_PASS'];
            $db   = $_ENV['DB_NAME'];
        }else{
            // if not found used regular CI Config
            // Include database configuration
            include(APPPATH.'/config/database.php');
            $host = $db[$active_group]['hostname'];
            $user = $db[$active_group]['username'];
            $pass = $db[$active_group]['password'];
            $db   = $db[$active_group]['database'];
        }

        // Setup Database Connection
        R::setup("mysql:host=$host;dbname=$db", $user, $pass);
        
        // Freeze Schema when project in production
        R::freeze((ENVIRONMENT === 'production'));
    }
}
