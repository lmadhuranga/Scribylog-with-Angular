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
/* File Name     : Meeting.php                                           */
/* Purpose       :                                                                 */
/*                                                                                 */
/*                                                                                 */
/***********************************************************************************/
class Meeting extends Member_Controller
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
        $this->data['subview'] = 'member/meeting_list';
        $this->load->view('member/_layout_main',$this->data);
    }
    /*---------------End of index()---------------*/


    /**
     * @author                          Madhuranga Senadheera
     * Purpose of the function          Description
     * @variable                         : type
     * @return                             return_type 
     */
    public function add()
    {
        $this->data['subview'] = 'member/meeting_add';
        $this->load->view('member/_layout_main',$this->data);
    }
    /*---------------End of index()---------------*/

    /**
     * @author                          Madhuranga Senadheera
     * Purpose of the function          Description
     * @variable                         : type
     * @return                             return_type 
     */
    public function view()
    {
        $this->data['subview'] = 'member/meeting_view';
        $this->load->view('member/_layout_main',$this->data);
    }
    /*---------------End of index()---------------*/


}

/* End of file User.php */
/* Location: ./system/application/controllers/User.php */