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
/* File Name     : group_model.php                                               */
/* Purpose       :                                                                 */
/*                                                                                 */
/*                                                                                 */
/***********************************************************************************/
class  group_model extends MY_Model
{
    protected $_table_name      ='tbl_group';
    protected $_primary_key     ='id';
    protected $_order_by        ='ASC';
    // protected $_primary_filter  ='';
    protected $_timestamps      =TRUE;    
    // rules
    public $rules = array(
                    array(
                                	'field'=>'group_name',
                                	'label'=>'Group Name',
                                	'rules'=>'required|trim|xss_clean|max_length[45]'
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
        $group = new stdClass();
        $group->group_name="";
								$group->enable="";
        return $group;
    }

    
}// ------------------End group_model --------------Class{}
//Owner : Madhuranga Senadheera



