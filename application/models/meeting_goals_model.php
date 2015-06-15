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
/* File Name     : meeting_goals_model.php                                               */
/* Purpose       :                                                                 */
/*                                                                                 */
/*                                                                                 */
/***********************************************************************************/
class  meeting_goals_model extends MY_Model
{
    protected $_table_name      ='tbl_meeting_goals';
    protected $_primary_key     ='id';
    protected $_order_by        ='id';
    // protected $_primary_filter  ='';
    protected $_timestamps      =TRUE;    
    // rules
    public $rules = array(
                    array(
                                	'field'=>'goal',
                                	'label'=>'Goal',
                                	'rules'=>'required|trim|xss_clean|max_length[45]'
                                ),
								array(
                                	'field'=>'by',
                                	'label'=>'Creator',
                                	'rules'=>'required|trim|integer|xss_clean|max_length[11]'
                                ),
								array(
                                	'field'=>'meeting_id',
                                	'label'=>'Meeting',
                                	'rules'=>'required|trim|integer|xss_clean|max_length[11]'
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
        $meeting_goals = new stdClass();
        $meeting_goals->goal="";
								$meeting_goals->by="";
								$meeting_goals->meeting_id="";
								$meeting_goals->enable="";
        return $meeting_goals;
    }

    
}// ------------------End meeting_goals_model --------------Class{}
//Owner : Madhuranga Senadheera



