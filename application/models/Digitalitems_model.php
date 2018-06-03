<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Digitalitems_model extends CI_Model
{	
public function add($data)
        {
          return $this->db->insert('digital_items', $data);   
        }

public function remove($data)
        {
	      $this->db->where($data);
          return $this->db->delete('digital_items');   
        }

public function get_item_title($id)
        {
             $data = array
                (
                'id_digital_item' => $id
                );
             $query = $this->db->get_where('digital_items', $data);  
            if ($query->num_rows() > 0)
              return $query->row()->title;
             else
              return false;             
        } 
public function get_cd_keys($id_digital_item)
        {
             $query = $this->db->get_where('cd_keys',array('id_digital_item' => $id_digital_item));  
             return $query->result();
             
        } 

public function remove_cd_key_single($data)
        {
	      $this->db->where($data);
          return $this->db->delete('cd_keys');   
        }
		
public function add_cd_key($data)
        {
          return $this->db->insert('cd_keys', $data);   
        }





 public function get_items()
        {
             $query = $this->db->get_where('digital_items');  
             return $query->result();
             
        } 
   public function get_orders_unshipped()
        {
             $data = array
                (
                'shipped' => "false"
                );
             $query = $this->db->get_where('orders', $data);  
             return $query->result();
             
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
    public function get_orders_transactions($orderID)
        {
             $data = array
                (
                'OrderID' => "$orderID"
                );
             $query = $this->db->get_where('transactions', $data);  
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
    
}
