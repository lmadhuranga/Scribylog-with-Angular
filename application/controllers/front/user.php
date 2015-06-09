<?php
/**
*
*
* @copyright  2015
* @license    None
* @version    1.0
* @link       None
* @since      Class available since Release 1.0
*
**/     
        
/***********************************************************************************/
/*                                                                                 */
/* File Name     : User.php                                           */
/* Purpose       :                                                                 */
/*                                                                                 */
/*                                                                                 */
/***********************************************************************************/
class User extends Frontend_Controller
{
    
    function __construct()
    {
        parent::__construct(); 
	}	
 

    /**
     * @author                          Madhuranga Senadheera
     * Purpose of the function          Description
     * @variable                         : type
     * @return                             return_type 
     */
    public function index()
    {
        $this->load->view('front/user_login');
    }
    /*---------------End of index()---------------*/
}

/* End of file User.php */
/* Location: ./system/application/controllers/User.php */