<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Item_model extends CI_Model
{	
    public function get_item ($itemID)
	{
		 $data = array
                (
                'ItemID' => $itemID
                );
               $query = $this->db->get_where('item', $data);  
			   $this->db->select('*');
               $this->db->from('item');
			   $this->db->join('item_pictures', 'item_pictures.ItemID = item.ItemID');

             if($query->num_rows()>0)
                 return $query->row();
             else
                 return false;
	}
   
		 public function import_item($data)
   {
       if(!$this->item_exist($data["ItemID"])):
          $this->db->insert('item', $data); 
       return true;
       else:
           return false; 
        endif;       
   }
   public function item_exist($item_id)
    {
        $data = array
                (
                'ItemID' => $item_id
                );
               $query = $this->db->get_where('item', $data);  
             if($query->num_rows()>0)
                 return true;
             else
                 return false;
    }
	 public function item_picture_import($item_id, $item_picture_url)
   {
       $data= array("item_id"=>$item_id,"picture_url"=>$item_picture_url);
            if(!$this->item_picture_exist($item_id,$item_picture_url )):            
                $this->db->insert('item_pictures', $data); 
             return true;
            endif;          
   }
   public function item_picture_exist($item_id,$item_picture_url)
   {
      $data = array
                (
                'item_id' => $item_id,
                 'picture_url' => $item_picture_url
                );
               $query = $this->db->get_where('item_pictures', $data);  
             if($query->num_rows()>0)
                 return true;
             else
                 return false; 
   }
}
