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
/* File Name     : meeting_tag_model.php                                               */
/* Purpose       :                                                                 */
/*                                                                                 */
/*                                                                                 */
/***********************************************************************************/
class  meeting_tag_model extends MY_Model
{
    protected $_table_name      ='tbl_meeting_tag';
    protected $_primary_key     ='id';
    protected $_order_by        ='id';
    // protected $_primary_filter  ='';
    protected $_timestamps      =TRUE;    
    // rules
    public $rules = array(
                            array(
                            	'field'=>'meeting_id',
                            	'label'=>'Meeting',
                            	'rules'=>'required|trim|integer|xss_clean|max_length[11]'
                            ),
							array(
                            	'field'=>'tag_id',
                            	'label'=>'Tag',
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
        $meeting_tag = new stdClass();
        $meeting_tag->meeting_id="";
								$meeting_tag->tag_id="";
								$meeting_tag->enable="";
        return $meeting_tag;
    }

    
}// ------------------End meeting_tag_model --------------Class{}
//Owner : Madhuranga Senadheera



