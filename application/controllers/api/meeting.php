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
class Meeting extends REST_Controller
{
    
    function __construct()
    {
        parent::__construct();
		$this->load->library('form_validation');		
		// $this->load->helper(array('form','url'));
		$this->load->model('meeting_model');
	}	
	
    /*************************Start Function index()***********************************/
    //Owner : Madhuranga Senadheera
    //
    //@ type :
    //#return type :
	function index_get()
	{   
        $this->load->model('meeting_tag_model');
        $this->load->model('tags_model');
        // return araray ini
        $json_return_array = array();

        // If id send send single record
        $id = $this->input->get('id'); 
        if($id!=false)
        {
            $meeting = $this->meeting_model->get_by(array('id'=>$id),'*');
            if (sizeof($meeting)>0)
            {
                $json_return_array['data']      = end($meeting);
                $json_return_array['status']    = 'success';
            }
            else
            {
                 // no data 
                $json_return_array['msg'] = 'No Data';
                $json_return_array['status'] = 'no_data';
            }
        }
        else
        {
            // get all 
            $meeting_list = $this->meeting_model->get_by(array(),'id,note,title,date,end_time,conducted_by,held_status,enable');   
            if (sizeof($meeting_list)>0)
            {
                foreach ($meeting_list as $key1 => $meeting)
                {  
                    // get tag id for meeting
                    $meeting_tag_id_list = $this->meeting_tag_model->get_by(array('meeting_id'=>$meeting['id']));
                    if(sizeof($meeting_tag_id_list)>0)
                    {
                        $meeting_list[$key1]['tags_array'] = array();
                        // get the tag name
                        foreach ($meeting_tag_id_list as $key2 => $meeting_tag_id)
                        { 
                           $meeting_list[$key1]['tags_array'][$meeting_tag_id['tag_id']] =  $this->tags_model->get('tag,id',$meeting_tag_id['tag_id']);

                        }
                    }
                    // no tags
                    else
                    {
                        $meeting_list[$key1]['tags_array'] = array();
                    }
                }

            }
            // no meetings
            else
            {
                $meeting_list = array();
            }
            

            $json_return_array =  $meeting_list;

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
 
        $this->form_validation->set_rules($this->meeting_model->rules);  
        if ($this->form_validation->run()==false)
        {
            // validation error
            $json_return_array['msg']       = 'Operation fail';
            $json_return_array['status']    = 'error';
            $json_return_array['statuss']    = validation_errors(); 
            
        }
        else
        {
            $form_data = $this->post_get_as_array(array('id,title,note,date,end_time,conducted_by,held_status,enable')); 
    
            if ($this->meeting_model->save($form_data,$form_data['id'])) {
    
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
        $this->form_validation->set_rules($this->meeting_model->rules);
        if ($this->form_validation->run()==false)
        {
            // validation error
            $json_return_array['msg']       = 'Operation fail';
            $json_return_array['status']    = 'error';
            $json_return_array['statuss']    = validation_errors(); 
            
        }
        else
        {
            $form_data = $this->post_get_as_array(array('id,title,note,date,end_time,conducted_by,held_status,enable')); 
    
            if ($this->meeting_model->save($form_data)) {
    
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
        $this->form_validation->set_rules($this->meeting_model->rules);
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
            if ($this->meeting_model->delete($form_data['id'])) {
    
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

/* End of file meeting.php */
/* Location: ./system/application/controllers/meeting.php */