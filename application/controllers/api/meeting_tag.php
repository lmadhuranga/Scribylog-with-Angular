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
/* File Name     : Meeting_tag.php                                           */
/* Purpose       :                                                                 */
/*                                                                                 */
/*                                                                                 */
/***********************************************************************************/
class Meeting_tag extends REST_Controller
{
    
    function __construct()
    {
        parent::__construct();
		$this->load->library('form_validation');		
		// $this->load->helper(array('form','url'));
		$this->load->model('meeting_tag_model');
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
            $meeting_tag = $this->meeting_tag_model->get_by(array('id'=>$id),'*');
            if (sizeof($meeting_tag)>0)
            {
                $json_return_array['data']      = end($meeting_tag);
                $json_return_array['status']    = 'success';
            }
            else
            {
                // get all record
                $meeting_tags_list = $this->meeting_tag_model->get_by(array('enable'=>'1'),'id,meeting_id,tag_id,enable');   
                if (sizeof($meeting_tags_list)>0)
                {
                    $json_return_array = $meeting_tags_list; 
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
            $json_return_array = $this->meeting_tag_model->get_by(array(),'id,meeting_id,tag_id,enable');   
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
 
        $this->form_validation->set_rules($this->meeting_tag_model->rules);  
        if ($this->form_validation->run()==false)
        {
            // validation error
            $json_return_array['msg']       = 'Operation fail';
            $json_return_array['status']    = 'error';
            $json_return_array['statuss']    = validation_errors(); 
            
        }
        else
        {
            $form_data = $this->post_get_as_array(array('id,meeting_id,tag_id,enable')); 
    
            if ($this->meeting_tag_model->save($form_data,$form_data['id'])) {
    
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
        
        $this->load->model('tags_model');
        // return araray ini
        $json_return_array = array();
        // load helpers 
        $this->load->library('form_validation'); 
        // set validation
        $this->form_validation->set_rules( array(
                                                'field'=>'meeting_id',
                                                'label'=>'Meeting',
                                                'rules'=>'required|trim|integer|xss_clean|max_length[11]'
                                            ),
                                            array(
                                                'field'=>'tag',
                                                'label'=>'New Tag',
                                                'rules'=>'trim|xss_clean|max_length[1]'
                                            )
                                        );

        if ($this->form_validation->run()==false)
        {
            // validation error
            $json_return_array['msg']       = 'Operation fail';
            $json_return_array['status']    = 'error';
            $json_return_array['statuss']    = validation_errors(); 
            
        }
        else
        {
            $form_data = $this->post_get_as_array(array('id','meeting_id','tag')); 
            if($form_data['tag']!=false)
            {
                // save new tag nage
                if ($id = $this->tags_model->save(array('tag'=>$form_data['tag'])))
                {
                    // remove tag name
                    unset($form_data['tag']);
                    $form_data['tag_id'] = $id;
                    if ($this->meeting_tag_model->save($form_data))
                    {
    
                        $json_return_array['msg']       = 'System update success';
                        $json_return_array['status']    = 'success'; 
            
                    }
                    else {
                        $json_return_array['msg']       = 'System update failier';
                        $json_return_array['status']    = 'error'; 
                    }
                }
                else
                {
                    $json_return_array['msg']       = 'System update failier';
                    $json_return_array['status']    = 'error'; 
                }
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
        $this->form_validation->set_rules($this->meeting_tag_model->rules);
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
            if ($this->meeting_tag_model->delete($form_data['id'])) {
    
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

/* End of file meeting_tag.php */
/* Location: ./system/application/controllers/meeting_tag.php */