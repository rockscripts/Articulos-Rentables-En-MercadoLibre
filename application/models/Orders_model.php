<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Orders_model extends CI_Model
{	
   public function get_orders($filter=null)
        {
			$data = array();
			if($filter!=null):
			 if($filter=="verified-pending"):
			$data = array
                (
                'app_verified' => "true",
				'shipped' => "false"
                );
				elseif($filter=="verified-shipped"):
				 $data = array
                (
                'app_verified' => "true",
				'shipped' => "true"
                );
				elseif($filter=="refunded"):
				 $data = array
                (
                'refunded' => "true"
                );
				else:
				 $data["orders"] = $this->Orders_model->get_orders();
				endif;
		
			endif;
			
             $query = $this->db->get_where('orders',$data);  
			// echo $this->db->last_query();
             return $query->result();
             
        } 
   public function get_orders_unshipped()
        {
             $data = array
                (
                'delivery_message_sent' => "false"
                );
             $query = $this->db->get_where('orders', $data);  
             return $query->result();
             
        }
public function get_orders_without_delivery_message_sent()
        {
             $data = array
                (
                'delivery_message_sent' => "false"
                );
             $query = $this->db->get_where('orders', $data);  
             return $query->result();
             
        } 	
public function update_delivery_message_sent($id_order, $status)
{
	 $this->db->where('OrderID', $id_order);
           $this->db->set('delivery_message_sent', $status);
           $this->db->update('orders');
}
    public function get_order($id)
        {
             $data = array
                (
                'OrderID' => $id
                );
             $query = $this->db->get_where('orders', $data);  
            if ($query->num_rows() > 0)
             return $query->row();
             else
                 return false;
             
        } 
		public function  update_is_refunded($id_order, $refunded)
        {
           $this->db->where('OrderID', $id_order);
           $this->db->set('refunded', $refunded);
		   $this->db->set('refunded_date', 'NOW()', FALSE);
           $this->db->update('orders');
        }
    public function get_orders_transactions($orderID)
        {
             $data = array
                (
                'OrderID' => "$orderID"
                );
             $query = $this->db->get_where('transactions', $data);  
             return $query->result();
               
        } 
		
    public function update_digital_item_cd_keys_status($id_digital_item, $id_transaction, $was_sold, $qty)
	{
		$count = $this->db->where('sold', "false")->where('id_digital_item', $id_digital_item)->count_all_results("cd_keys");
		if($count>=$qty): //stock?
			$this->db->limit($qty);
			$this->db->where('id_digital_item', $id_digital_item);
			$this->db->where('sold', "false");
			$this->db->set('transaction_id', $id_transaction);
			$this->db->set('sold', $was_sold);		
			$this->db->update('cd_keys');
			/*update transaction shipping status*/
			$this->update_order_transaction_shipping_status($id_transaction, "true");
			return true;
		else:	
		    return false;		
		endif;
	}
	public function update_order_transaction_shipping_status($id_transaction, $status)
	{
		$this->db->where('transactionID', $id_transaction);
		$this->db->set('shipped', $status);		
	    $this->db->update('transactions');
	}
	public function get_orders_transaction_keys($id_transaction, $id_digital_item)
	{
		$data = array
                (
                'id_digital_item' => $id_digital_item,
				'transaction_id' => $id_transaction
                );
             $query = $this->db->get_where('cd_keys', $data);  
             return $query->result();
	}
        public function check_phone_typed($id_order, $phone_typed, $country_code_removed=null,$country_code)
        {
          $data = array
                (
                'OrderID' => $id_order
                );
             $query = $this->db->get_where('orders', $data);  
            if ($query->num_rows() > 0):
             $order = $query->row();
             if($country_code_removed=="true"):
                 if("+".$country_code.$phone_typed==$order->ShippingAddressPhone):
                     return true;
                 endif;
                 else:
                   if($phone_typed==$order->ShippingAddressPhone):
                     return true;
                 endif;  
             endif;
             else:
                 return false;   
             endif;
        }
        public function check_code_typed($id_order, $code)
        {
            $data = array
                (
                'OrderID' => $id_order
                );
             $query = $this->db->get_where('verification', $data); 
             if ($query->num_rows() > 0):
             $verification = $query->row();
             if($verification->code==$code):
                     return true;                 
             else:
                 return false;   
             endif;
             endif;
        }
      public function  increase_times_allowed($id_order)
        {
           $this->db->where('OrderID', $id_order);
           $this->db->set('times_tried_code', 'times_tried_code+1', FALSE);
           $this->db->update('orders');
        }
        public function update_shipped_status($id_order)
        {
          $this->db->where('OrderID', $id_order);
           $this->db->set('shipped', "true");
           $this->db->update('orders');  
        }
		public function update_app_verified_status($id_order)
        {
          $this->db->where('OrderID', $id_order);
           $this->db->set('app_verified', "true");
           $this->db->update('orders');  
        }
        public function get_country_by_code($code)
        {
           $data = array
                (
                'iso' => $code
                );
             $query = $this->db->get_where('country', $data);  
            if ($query->num_rows() > 0)
             return $query->row();
             else
                 return false;  
        }
        public function add_verification($verification)
        {
           if(!$this->verification_exist($verification["OrderID"])):
            $this->db->insert('verification', $verification); 
            return true;
           else:
               $this->db->update('verification', array("code"=>$verification["code"]));
            return false;
           endif;   
        }
        public function verification_exist($order_id)
    {
        $data = array
                (
                'OrderID' => $order_id
                );
               $query = $this->db->get_where('verification', $data);  
             if($query->num_rows()>0)
                 return true;
             else
                 return false;
    }
    public function get_app_config($key)
	 {
           $data = array
                (
                'key' => $key
                );
             $query = $this->db->get_where('configurations', $data);  
            if ($query->num_rows() > 0)
             return $query->row();
             else
                 return false;  
        }
         
		 public function get_payment_info($order_id)
        {
             $data = array
                (
                'OrderID' => $order_id
                );
             $query = $this->db->get_where('payment_info', $data);  
            if ($query->num_rows() > 0)
             return $query->row();
             else
                 return false;
             
        }
}
