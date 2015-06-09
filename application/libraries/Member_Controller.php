<?php

/**
*
*
* @copyright  2014
* @license    None
* @version    1.0
* @link       None
* @since      Class available since Release 1.0
*
**/		
		
/***********************************************************************************/
/*                                                                                 */
/* File Name     : Member_Controller.php                              */
/* Purpose       : 													           */
/*                 												                   */
/*                                                                                 */
/***********************************************************************************/

class Member_Controller extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		
		$this->data['meta_title'] = $this->data['site_name']." - Member";

        $this->load->model('user_model');
        
        // Login check
        $exception_uris = array(
            'member/user/login', 
            'member/user/logout',
            'member/user/forget_password'
        );
        

        if (in_array(uri_string(), $exception_uris) == false) 
        {
            // is logged user
            if (($this->user_model->is_logged() == false))
            {
                // redicret to login page
                redirect('member/user/login');
            }
            else
            {
                // redirect to member
                if (($this->user_model->get_user_type() != '1'))
                {
                    // redirect member dashboard
                    redirect('member/dashboard');
                }

                // set user id
                $this->data['current_user_id'] = $this->user_model->get_current_user_id();
            }
        }  
 
	}

	/**
     * @author                          Madhuranga Senadheera
     * Purpose of the function          Description
     */
    public function index()
    {
        
    }

 
}
/* End of file Admin_Controller.php */
/* Location: ./application/controllers/Developer_Controller.php */