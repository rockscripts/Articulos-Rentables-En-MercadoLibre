<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Ebay extends CI_Model
{	
   public function get_orders()
        {
          $GetOrders = new GetOrders();  
          $orders = $GetOrders->get_orders();
          return $orders;
        }   
}
