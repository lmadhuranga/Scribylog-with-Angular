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
/* File Name     : tags_model.php                                               */
/* Purpose       :                                                                 */
/*                                                                                 */
/*                                                                                 */
/***********************************************************************************/
class  tags_model extends MY_Model
{
    protected $_table_name      ='tbl_tags';
    protected $_primary_key     ='id';
    protected $_order_by        ='id';
    // protected $_primary_filter  ='';
    protected $_timestamps      =TRUE;    
    // rules
    public $rules = array(
                    array(
                                	'field'=>'tag',
                                	'label'=>'Tag',
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
        $tags = new stdClass();
        $tags->tag="";
								$tags->enable="";
        return $tags;
    }

    
}// ------------------End tags_model --------------Class{}
//Owner : Madhuranga Senadheera



