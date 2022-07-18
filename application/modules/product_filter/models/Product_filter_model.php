<?php
/**
 * Created by IntelliJ IDEA.
 * User: Rana
 */
class Product_filter_model extends MY_Model{
	function __construct()
	{
		parent::__construct();
		 $this->table = 'products';
	}
	function getHeaderLogo(){
            $total = 0;
            $fields = "a.header_logo as headerLogo";
			
            $this->db->select($fields);
            $this->db->from(TBL_LOGO.' a');
            $query = $this->db->get();
            if($query->num_rows() > 0){
                $row = $query->row_array();
                $total = $row['headerLogo'];
            }
            return $total;
     }
	 
	  function getFooterLogo(){
            $total = 0;
            $fields = "a.footer_logo as footerLogo";
            $this->db->select($fields);
            $this->db->from(TBL_LOGO.' a');
            $query = $this->db->get();
            if($query->num_rows() > 0){
                $row = $query->row_array();
                $total = $row['footerLogo'];
            }
            return $total;
     }
	 function getFavicon(){
            $total = 0;
            $fields = "a.favicon as fav_Icon";
            $this->db->select($fields);
            $this->db->from(TBL_LOGO.' a');
            $query = $this->db->get();
            if($query->num_rows() > 0){
                $row = $query->row_array();
                $total = $row['fav_Icon'];
            }
            return $total;
     }
	 function getCompanyAddressDetails($postVal=array())
	{
		$result = array();
		$this->db->select("a.*");
		$this->db->from(TBL_ADDRESS.' a');
		$this->db->order_by('id_address','DESC');
		$query = $this->db->get();
			if($query->num_rows() > 0) {
				$result = $query->result_array();
			}
		return $result;
	}
	/* 
     * Fetch records from the database 
     * @param array filter data based on the passed parameters 
     */ 
    function getRows($params = array()){ 
        $this->db->select('*'); 
        $this->db->from($this->table); 
         
        if(array_key_exists("where", $params)){ 
            foreach($params['where'] as $key => $val){ 
                $this->db->where($key, $val); 
            } 
        } 
         
        if(array_key_exists("search", $params)){ 
            // Filter data by searched keywords 
            if(!empty($params['search']['keywords'])){ 
                $this->db->like('name', $params['search']['keywords']); 
            } 
        } 
         
        // Sort data by ascending or desceding order 
        if(!empty($params['search']['sortBy'])){ 
            $this->db->order_by('name', $params['search']['sortBy']); 
        }else{ 
            $this->db->order_by('id', 'desc'); 
        } 
		
		// Sort data by ascending or desceding order 
        if(!empty($params['search']['category'])){ 
            $this->db->where('category_id', $params['search']['category']); 
        }else{ 
            $this->db->order_by('id', 'desc'); 
        } 
		
		if(array_key_exists("returnType",$params) && $params['returnType'] == 'count'){ 
            $result = $this->db->count_all_results(); 
        }else{ 
            if(array_key_exists("id", $params) || (array_key_exists("returnType", $params) && $params['returnType'] == 'single')){ 
                if(!empty($params['id'])){ 
                    $this->db->where('id', $params['id']); 
                } 
                $query = $this->db->get(); 
                $result = $query->row_array(); 
            }else{ 
                $this->db->order_by('id', 'desc'); 
                if(array_key_exists("start",$params) && array_key_exists("limit",$params)){ 
                    $this->db->limit($params['limit'],$params['start']); 
                }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){ 
                    $this->db->limit($params['limit']); 
                } 
                 
                $query = $this->db->get(); 
                $result = ($query->num_rows() > 0)?$query->result_array():FALSE; 
            } 
        } 
         
        // Return fetched data 
        return $result; 
    } 
	
	
//End
}
?>
