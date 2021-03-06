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
/* File Name     : User_group.php                                           */
/* Purpose       :                                                                 */
/*                                                                                 */
/*                                                                                 */
/***********************************************************************************/
class User_group extends REST_Controller
{
    
    function __construct()
    {
        parent::__construct();
		$this->load->library('form_validation');		
		// $this->load->helper(array('form','url'));
		$this->load->model('user_group_model');
	}	
	
    /*************************Start Function index()***********************************/
    //Owner : Madhuranga Senadheera
    //
    //@ type :
    //#return type :
	function index_get()
	{   
        // return araray ini
        $json_return_array = array();

        // If id send send single record
        $id = $this->input->get('id'); 
        if($id!=false)
        {
            $user_group = $this->user_group_model->get_by(array('id'=>$id),'*');
            if (sizeof($user_group)>0)
            {
                $json_return_array['data']      = end($user_group);
                $json_return_array['status']    = 'success';
            }
            else
            {
                // get all record
                $user_groups_list = $this->user_group_model->get_by(array('enable'=>'1'),'id,created_by,group_id,enable');   
                if (sizeof($user_groups_list)>0)
                {
                    $json_return_array['data'] = $user_groups_list;
                    $json_return_array['status'] = 'success';
                }
                else
                {
                    // no data 
                    $json_return_array['msg'] = 'No Data';
                    $json_return_array['status'] = 'no_data';
                }
            }
        }
        else
        {
            // send all record
            $json_return_array = $this->user_group_model->get_by(array(),'id,created_by,group_id,enable');   
        } 

        // response
        $this->response($json_return_array, 200); 
        
	}//Function End data_get()---------------------------------------------------FUNEND()

	
    
    /*************************Start Function edit()***********************************/
    //Owner : Madhuranga Senadheera
    //
    //@ type :
    //#return type :
    function index_put($id=NULL)
    {
        // return araray ini
        $json_return_array = array();  
        // load helpers 
        $this->load->library('form_validation');   
        // set validation
 
        $this->form_validation->set_rules($this->user_group_model->rules);  
        if ($this->form_validation->run()==false)
        {
            // validation error
            $json_return_array['msg']       = 'Operation fail';
            $json_return_array['status']    = 'error';
            $json_return_array['statuss']    = validation_errors(); 
            
        }
        else
        {
            $form_data = $this->post_get_as_array(array('id,created_by,group_id,enable')); 
    
            if ($this->user_group_model->save($form_data,$form_data['id'])) {
    
                $json_return_array['msg']       = 'System update success';
                $json_return_array['status']    = 'success'; 
    
            }
            else {
                $json_return_array['msg']       = 'System update failier';
                $json_return_array['status']    = 'error'; 
            }
        }
        $this->response($json_return_array, 200);
    
    }//Function End data_put()---------------------------------------------------FUNEND()
    


    /*************************Start Function input_post()********************************/
    //  Owner: Madhuranga Senadheera
    //  Description
    //  @ type :
    //  #return type :
    public function index_post()
    { 
        // return araray ini
        $json_return_array = array();
        // load helpers 
        $this->load->library('form_validation'); 
        // set validation
        $this->form_validation->set_rules($this->user_group_model->rules);
        if ($this->form_validation->run()==false)
        {
            // validation error
            $json_return_array['msg']       = 'Operation fail';
            $json_return_array['status']    = 'error';
            $json_return_array['statuss']    = validation_errors(); 
            
        }
        else
        {
            $form_data = $this->post_get_as_array(array('id,created_by,group_id,enable')); 
    
            if ($this->user_group_model->save($form_data)) {
    
                $json_return_array['msg']       = 'System update success';
                $json_return_array['status']    = 'success'; 
    
            }
            else {
                $json_return_array['msg']       = 'System update failier';
                $json_return_array['status']    = 'error'; 
            }
        }
    
        $this->response($json_return_array, 200); 
    
    }//Function End data_post()---------------------------------------------------FUNEND()




    /*************************Start Function index_delete()*******************************/
    //  Owner                                       : Madhuranga Senadheera
    //  Description
    //  @ type :
    //  #return type :
    public function index_delete()
    {   
        // return araray ini
        $json_return_array = array();  
        // load helpers 
        $this->load->library('form_validation');   
        // set validation
        $_POST['id']  = $_GET['id'];
        $this->form_validation->set_rules($this->user_group_model->rules);
        if ($this->form_validation->run()==false)
        {
            // validation error
            $json_return_array['msg']       = 'Operation fail';
            $json_return_array['status']    = 'error';
            $json_return_array['statuss']    = validation_errors(); 
            
        }
        else
        {
            
            $form_data = $this->post_get_as_array(array('id')); 
            if ($this->user_group_model->delete($form_data['id'])) {
    
                $json_return_array['msg']       = 'Deleted';
                $json_return_array['status']    = 'success'; 
    
            }
            else {
                $json_return_array['msg']       = 'System update failier';
                $json_return_array['status']    = 'error'; 
            }
        }
        $this->response($json_return_array, 200); 

    }//Function End data_delete()---------------------------------------------------FUNEND()


}

/* End of file user_group.php */
/* Location: ./system/application/controllers/user_group.php */