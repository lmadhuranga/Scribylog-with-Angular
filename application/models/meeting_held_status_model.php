<?php
/**
*
*
* @copyright  2015
* @license    None
* @version    1.0
* @link       None 
*
**/     
        
/***********************************************************************************/
/*                                                                                 */
/* File Name     : meeting_held_status_model.php                                               */
/* Purpose       :                                                                 */
/*                                                                                 */
/*                                                                                 */
/***********************************************************************************/
class  meeting_held_status_model extends MY_Model
{
    protected $_table_name      ='tbl_meeting_held_status';
    protected $_primary_key     ='id';
    protected $_order_by        ='ASC';
    // protected $_primary_filter  ='';
    protected $_timestamps      =TRUE;    
    // rules
    public $rules = array(
                    array(
                                	'field'=>'name',
                                	'label'=>'Name',
                                	'rules'=>'required|trim|xss_clean|max_length[10]'
                                ),
								array(
                                	'field'=>'enable',
                                	'label'=>'Enable',
                                	'rules'=>'trim|xss_clean|max_length[1]'
                                )
        );

    /*********************Construct()****************************/
    function __construct()
    {
        parent::__construct();
    }

    function count(){
        return $this->db->count_all($this->_table_name);
    }

    public function get_new(){
        $meeting_held_status = new stdClass();
        $meeting_held_status->name="";
								$meeting_held_status->enable="";
        return $meeting_held_status;
    }

    
}// ------------------End meeting_held_status_model --------------Class{}
//Owner : Madhuranga Senadheera



