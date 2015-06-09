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
/* File Name     : Home.php                                           */
/* Purpose       :                                                                 */
/*                                                                                 */
/*                                                                                 */
/***********************************************************************************/
class Home extends MY_Controller
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
        $this->load->view('front/home_page');
    }
    /*---------------End of index()---------------*/
}

/* End of file Home.php */
/* Location: ./system/application/controllers/Home.php */