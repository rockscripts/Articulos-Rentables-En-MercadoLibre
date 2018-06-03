<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
Model: All functions for Mercadolibre platform
 *  */
class Profit_model extends CI_Model
{	
    public function get_profitable_seller($data)
       {
        $query = $this->db->get_where('ML_profitable_sellers', $data);  
                    if ($query->num_rows() > 0)
        return $query->row();
        else
            return false;
       }
       public function get_profitable_sellers()
        {
             $query = $this->db->get('ML_profitable_sellers');  
			 if ($query->num_rows() > 0)
             return $query->result();
             else
                 return false;                        
        }
       
    public function exist_profitable_seller($seller)
    {
        $data = array
                (
                'userID' => $seller["userID"]
                );
               $query = $this->db->get_where('ML_profitable_sellers', $data);  
             if($query->num_rows()>0)
                 return true;
             else
                 return false;
    }
    public function import_profitable_seller($seller)
    {
        if(!$this->exist_profitable_seller($seller["userID"])):
           $this->db->insert('ML_profitable_sellers', $seller); 
           return false;
           else:
           return true;
           endif; 
    }
    public function import_profitable_item($item)
        {
          if(!$this->profitable_item_exist($item["itemID"])):
          $this->db->insert('ML_profitable_items', $item); 
          return false;
       else:
	  $this->db->where('itemID', $item["itemID"]);
          $this->db->update('ML_profitable_items', $item);
          return true;
        endif;   
        }
     public function profitable_item_exist($itemID)
    {
        $data = array
                (
                'itemID' => $itemID
                );
        $query = $this->db->get_where('ML_profitable_items', $data);  
        if($query->num_rows()>0)
            return true;
        else
            return false;
    }
    public function update_profitable_seller($data)
    {
        if(sizeof($data)>0):
          $this->db->where("userID",$data["userID"]);
          $this->db->update('ML_profitable_sellers', $data); 
        endif;
    }
 public function get_profitable_items($userID)
    {
        $data = array ('userID' => $userID);
	    $query = $this->db->get_where('ML_profitable_items', $data);  
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
