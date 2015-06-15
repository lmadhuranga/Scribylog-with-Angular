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
/* File Name     : user_group_model.php                                               */
/* Purpose       :                                                                 */
/*                                                                                 */
/*                                                                                 */
/***********************************************************************************/
class  user_group_model extends MY_Model
{
    protected $_table_name      ='tbl_user_group';
    protected $_primary_key     ='id';
    protected $_order_by        ='id';
    // protected $_primary_filter  ='';
    protected $_timestamps      =TRUE;    
    // rules
    public $rules = array(
                    array(
                                	'field'=>'created_by',
                                	'label'=>'Created by',
                                	'rules'=>'required|trim|integer|xss_clean|max_length[11]'
                                ),
								array(
                                	'field'=>'group_id',
                                	'label'=>'Group',
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
        $user_group = new stdClass();
        $user_group->created_by="";
								$user_group->group_id="";
								$user_group->enable="";
        return $user_group;
    }

    
}// ------------------End user_group_model --------------Class{}
//Owner : Madhuranga Senadheera



