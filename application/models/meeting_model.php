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
/* File Name     : meeting_model.php                                               */
/* Purpose       :                                                                 */
/*                                                                                 */
/*                                                                                 */
/***********************************************************************************/
class  meeting_model extends MY_Model
{
    protected $_table_name      ='tbl_meeting';
    protected $_primary_key     ='id';
    protected $_order_by        ='ASC';
    // protected $_primary_filter  ='';
    protected $_timestamps      =TRUE;    
    // rules
    public $rules = array(
                    array(
                                	'field'=>'note',
                                	'label'=>'Note',
                                	'rules'=>'required|trim|xss_clean|max_length[255]'
                                ),
                                array(
                                    'field'=>'title',
                                    'label'=>'Title',
                                    'rules'=>'trim|xss_clean|max_length[100]'
                                ),
                                 array(
                                    'field'=>'sub_title',
                                    'label'=>'Subtitle',
                                    'rules'=>'trim|xss_clean|max_length[100]'
                                ),
								array(
                                	'field'=>'date',
                                	'label'=>'Date',
                                	'rules'=>'trim|xss_clean'
                                ),
								array(
                                	'field'=>'end_time',
                                	'label'=>'End Time',
                                	'rules'=>'trim|xss_clean'
                                ),
								array(
                                	'field'=>'conducted_by',
                                	'label'=>'Conducted by',
                                	'rules'=>'required|trim|integer|xss_clean|max_length[11]'
                                ),
								array(
                                	'field'=>'held_status',
                                	'label'=>'Held Status',
                                	'rules'=>'trim|integer|xss_clean|max_length[11]'
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
        $meeting = new stdClass();
        $meeting->note="";
								$meeting->date="";
								$meeting->end_time="";
								$meeting->conducted_by="";
								$meeting->held_status="";
								$meeting->enable="";
        return $meeting;
    }

    
}// ------------------End meeting_model --------------Class{}
//Owner : Madhuranga Senadheera



