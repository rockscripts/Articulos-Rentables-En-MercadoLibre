<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Importer extends CI_Model
{
   	public function import_profitable_item($item)
        {
          if(!$this->profitable_item_exist($item["itemID"])):
          $this->db->insert('profitable_items', $item); 
          return false;
       else:
	     /* $this->db->where('itemID', $item["itemID"]);
          $this->db->update('profitable_items', $item); */
          return true;
        endif;   
        }
		public function import_profitable_item_transaction($order_transaction)
        {
			
			if(!$this->profitable_item_transaction($order_transaction)):
          $this->db->insert('profitable_items_transactions', $order_transaction);
		   return false;		   
       else:
          return true;
        endif;
        }
		
		public function update_profitable_item($data)
		{
			if(sizeof($data)>0):
			  $this->db->where("itemID",$data["itemID"]);
			  $this->db->update('profitable_items', $data); 
			endif;
		}
		public function update_profitable_item_totalQTYPurchased($itemID)
		{
			$array = $this->sum_quantity_purchased($itemID);
			if(!$array["TotalQuantityPurchased"])
				$array["TotalQuantityPurchased"] = 0;
			$this->update_profitable_item(array("itemID"=>$itemID,"totalQTYPurchased"=>$array["TotalQuantityPurchased"]));
		}
		 public function sum_quantity_purchased($itemID)
        {
         $this->db->select_sum('QuantityPurchased', 'TotalQuantityPurchased');
		 $this->db->where('ItemID', $itemID);
         $query = $this->db->get('profitable_items_transactions');
		 return $query->row_array();
        }
		public function import_profitable_seller($seller)
		{
			 if(!$this->exist_profitable_seller($seller["userID"])):
          $this->db->insert('profitable_sellers', $seller); 
          return false;
       else:
          return true;
        endif; 
		}
		public function update_profitable_seller($data)
		{
			if(sizeof($data)>0):
			  $this->db->where("userID",$data["userID"]);
			  $this->db->update('profitable_sellers', $data); 
			endif;
        }
        public function get_profitable_sellers()
        {
             $query = $this->db->get('profitable_sellers');  
			 if ($query->num_rows() > 0)
             return $query->result();
             else
                 return false;                        
        }
		 public function get_profitable_seller($data)
        {
             $query = $this->db->get_where('profitable_sellers', $data);  
			 if ($query->num_rows() > 0)
             return $query->row();
             else
                 return false;
           
             
        }
		 public function exist_profitable_seller($seller)
    {
        $data = array
                (
                'userID' => $seller["userID"]
                );
               $query = $this->db->get_where('profitable_sellers', $data);  
             if($query->num_rows()>0)
                 return true;
             else
                 return false;
    }
   public function import_order($order)
        {
          if(!$this->order_exist($order["OrderID"])):
          $this->db->insert('orders', $order); 
          return false;
       else:
          return true;
        endif;   
        }  
   public function import_order_transaction($order_transaction)
        {
          $this->db->insert('transactions', $order_transaction);
		  return $this->db->insert_id();
        }
        public function order_exist($order_id)
    {
        $data = array
                (
                'OrderID' => $order_id
                );
               $query = $this->db->get_where('orders', $data);  
             if($query->num_rows()>0)
                 return true;
             else
                 return false;
    }
	    public function profitable_item_exist($itemID)
    {
        $data = array
                (
                'itemID' => $itemID
                );
               $query = $this->db->get_where('profitable_items', $data);  
             if($query->num_rows()>0)
                 return true;
             else
                 return false;
    }
	    public function profitable_item_transaction($transaction)
    {
               $query = $this->db->get_where('profitable_items_transactions', $transaction);  
             if($query->num_rows()>0)
                 return true;
             else
                 return false;
    }
	
	public function update_order_transaction_delivery_id($transactionID, $data)
        {
			if(sizeof($data)>0):
			  $this->db->where("transactionID",$transactionID);
			  $this->db->set("delivery_id",$data["delivery_id"]);
			  $this->db->update('transactions', $data); 
			endif;	      
        }
		
	 public function import_order_payment_info($data)
        {
			 if(!$this->exist_order_payment_info($data["OrderID"])):
          $this->db->insert('payment_info', $data); 
		  return $this->db->insert_id();
		  else:
		  return false;
		  endif;
        }	
		public function exist_order_payment_info($order_id)
    {
        $data = array
                (
                'OrderID' => $order_id
                );
               $query = $this->db->get_where('payment_info', $data);  
             if($query->num_rows()>0)
                 return true;
             else
                 return false;
    }
}
