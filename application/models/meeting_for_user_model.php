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
/* File Name     : meeting_for_user_model.php                                               */
/* Purpose       :                                                                 */
/*                                                                                 */
/*                                                                                 */
/***********************************************************************************/
class  meeting_for_user_model extends MY_Model
{
    protected $_table_name      ='tbl_meeting_for_user';
    protected $_primary_key     ='id';
    protected $_order_by        ='ASC';
    // protected $_primary_filter  ='';
    protected $_timestamps      =TRUE;    
    // rules
    public $rules = array(
                    array(
                                	'field'=>'user_id',
                                	'label'=>'Add by',
                                	'rules'=>'required|trim|integer|xss_clean|max_length[11]'
                                ),
								array(
                                	'field'=>'meeting_id',
                                	'label'=>'Meeting',
                                	'rules'=>'required|trim|integer|xss_clean|max_length[11]'
                                ),
								array(
                                	'field'=>'invited_guest',
                                	'label'=>'Invited guest',
                                	'rules'=>'trim|xss_clean|max_length[1]'
                                ),
								array(
                                	'field'=>'participatation',
                                	'label'=>'Participatation',
                                	'rules'=>'trim|xss_clean|max_length[1]'
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
        $meeting_for_user = new stdClass();
        $meeting_for_user->user_id="";
								$meeting_for_user->meeting_id="";
								$meeting_for_user->invited_guest="";
								$meeting_for_user->participatation="";
								$meeting_for_user->enable="";
        return $meeting_for_user;
    }

    
}// ------------------End meeting_for_user_model --------------Class{}
//Owner : Madhuranga Senadheera



