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
        $this->load->model('meeting_model');
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
        $form_data['conducted_by'] = $this->data['current_user_id'];
        $form_data['date'] = $this->data['today'];
        $id = $this->meeting_model->save($form_data);  
        redirect('member/meeting/edit/'.$id);
    }
    /*---------------End of index()---------------*/


    /**
     * @author                          Madhuranga Senadheera
     * Purpose of the function          Description
     * @variable                         : type
     * @return                             return_type 
     */
    public function edit($id=NULL)
    {

        
        if ($id==NULL) {
            redirect('member/meeting/add/');
        } 

        $this->data['subview'] = 'member/meeting_add';
        $this->data['id'] = $id;
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