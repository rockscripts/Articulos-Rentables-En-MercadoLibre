<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Profit_model extends CI_Model
{	
   public function sum_quantity_purchased($itemID)
        {
         $this->db->select_sum('QuantityPurchased', 'TotalQuantityPurchased');
		 $this->db->where('ItemID', $itemID);
         $query = $this->db->get('profitable_items_transactions');
		 return $query->row_array();
        }
 public function get_profitable_items($userID)
    {
        $data = array ('userID' => $userID);
        $query = $this->db->get_where('profitable_items', $data);  
        if($query->num_rows()>0):
             return $query->result();
        else:
             return false;
        endif;
    }	
	 public function remove_by_qty($qty)
    {
		
		$this->db->where('totalQTYPurchased <=', $qty);
		$query = $this->db->get('profitable_items');
		if($query->num_rows()>0):
		 foreach($query->result() as $item)
		 {			
			 $this -> db -> where('ItemID',  $item->itemID);
	        $this -> db -> delete('profitable_items_transactions');
		 }
		 endif;
	    $query = $this->db->query('delete from profitable_items where totalQTYPurchased <= '.$qty);
        		
    }
	public function remove_profitable_item($itemID)
	{
      
	  $this -> db -> where('itemID', $itemID);
	  $this -> db -> delete('profitable_items');
	  
	  $this -> db -> where('ItemID', $itemID);
	  $this -> db -> delete('profitable_items_transactions');
	  
    }
     public function sum_quantity_purchased_by_date($itemID,$startDate,$endDate)
        {
			
		 $this->db->select_sum('QuantityPurchased', 'TotalQuantityPurchased');
		 $this->db->where('ItemID', $itemID);
		 if($startDate!=null):
		  $this->db->where('ItemID', $itemID);
		  $this->db->where('CreatedDate >=', $startDate);
		  $this->db->where('CreatedDate <=', $endDate);
		 endif;
         $query = $this->db->get('profitable_items_transactions');
		 echo "<pre>";
		print_r( $query->row_array());;;
        }
		

}
