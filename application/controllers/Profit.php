<?php
setlocale(LC_MONETARY,"es_CO");
setlocale(LC_ALL, 'es_CO');
defined('BASEPATH') OR exit('No direct script access allowed');

require 'mercadolibre/meli.php';

class Profit extends CI_Controller 
{

public $meli;

public function __construct()
{
    parent::__construct();
    $this->load->helper('form');
    $this->load->model('mercado_libre/Profit_model');
    $this->meli = new Meli('7217768868257712', 'xlpm9LDfLwUOOHj654TgmOqMvJfSj3yB');
}
public function index()
{
    $data["profitable_sellers"]= $this->Profit_model->get_profitable_sellers(); 
    $this->template->load('profits/ml_profits/display_sellers',$data);  
}
public function seller_items($message=null,$msn_type=null)
{	
    if($this->input->get("sellerID"))
    $data["userID"] = $userID = $this->input->get("sellerID");	
    else
    $data["userID"] = $userID = 'CYBER-GAMERS';	

    $data["profitable_items"]= $this->Profit_model->get_profitable_items($userID);	
    $data["profitable_seller"]= $this->Profit_model->get_profitable_seller(array("userID"=>$userID));

    if($message!=null):
        $data["message"] = $message;
        $data["message_type"] = $msn_type;
    endif;
    $this->template->load('profits/ml_profits/display_items',$data);	  	
}

public function get_import_form()
{		
    $data = array();
    $data["page"] = $this->input->post("page");
    $data["display_items"] = $this->input->post("display_items");
    $data["import_form"] = $this->template->ajax_load_view('profits/ml_profits/import_items_by_seller',$data, true); 
    echo json_encode($data);
}
public function import_seller_items()
{
    $pageToImport = $this->input->post("page");
    $userID = 'CYBER-GAMERS';
    if(!$this->input->post("page"))
        $pageToImport=1;
            
    $response = $this->get_seller_items_for_sale_by_nickname($userID, $pageToImport);
    if(!$this->Profit_model->exist_profitable_seller(array("userID"=>$userID)))
    {
        if(isset($response["body"]->results[0]))
        {
            $item = $response["body"]->results[0];
        }
        else
        {
            $state = $item->seller_address->city->state;
            $city = $item->seller_address->city->name;
            $country = $item->seller_address->city->country;
        }
        
        $totalPages = ceil($response["body"]->paging->total / 200);
        $this->Profit_model->import_profitable_seller(array("userID"=> $userID, 
                                                            "state"=> $state, 
                                                            "city"=> $city, 
                                                            "country"=> $country, 
                                                            "totalPages"=> $totalPages,  
                                                            "totalEntries"=> $response["body"]->paging->total));
    }
    for ($i=0;$i<$response["body"]->paging->limit;$i++) 
    {
        $item = $response["body"]->results[$i];
        if($item->id!=null)
        {
            $profitable_item = array("Title"=>$item->title,
                                     "itemID"=>$item->id,
                                     "viewItemURL"=>$item->permalink,
                                     "StartPrice"=>$item->price,
                                     "totalQTYPurchased"=> 0, 
                                     "totalMoneyPurchased" => $item->price*$item->sold_quantity, 
                                     "totalItemsSold" => $item->sold_quantity, 
                                     "userID"=>$userID);		                     
            if(!$this->Profit_model->profitable_item_exist($item->id))
            {
                $this->Profit_model->import_profitable_item($profitable_item);  
            }	
        }
                                        
    }	
    $profitable_seller = $this->Profit_model->get_profitable_seller(array("userID"=>$userID));
    if($profitable_seller)
    $this->Profit_model->update_profitable_seller(array("userID"=>$userID,"pageImported"=>$pageToImport)); 

    if($this->input->post("display_items")=="true")
        {
        $this->index();
        }	
}

public function get_seller_items_for_sale($userID, $pageToImport)
{
    $offset = (200*$pageToImport)-200;
    $params = array("seller_id"=>$userID,"offset"=>$offset,"limit"=>200);
    $result = $this->meli->get('/sites/MCO/search', $params);
    return $result;
    echo '<pre>'; 
    print_r($result);
    echo '</pre>'; 
}
public function t()
{
    $this->get_seller_items_for_sale_by_nickname('CYBER-GAMERS', 1) ;
}
public function get_seller_items_for_sale_by_nickname($userID, $pageToImport)
{
    $offset = (200*$pageToImport)-200;
    $params = array("nickname"=>$userID,"offset"=>$offset,"limit"=>50);
    $result = $this->meli->get('/sites/MCO/search', $params);
    //return $result;
    echo '<pre>'; 
    print_r($result);
    echo '</pre>'; 
}
public function get_seller_orders($seller_id)
{
    $params = array("seller"=>"147431313","access_token"=>$this->session->userdata('access_token'));
    $result = $this->meli->get('/orders/search', $params);
    return $result;
    echo '<pre>';             
    print_r($result);
    echo '</pre>'; 
}  
 
public function get_item($item_id="MCO418845716")
{
    $params = array();
    $result = $this->meli->get('/items/'.$item_id, $params);
    return $result;
    echo '<pre>';
    print_r($result);
    echo '</pre>'; 
}           
public function auth()
{
 echo '<a href="' . $this->meli->getAuthUrl('https://www.rockscripts.org/themecomponents/mercadolibre/return_page') . '">Login using MercadoLibre oAuth 2.0</a>';  
} 

public function return_page()
{

    if($this->input->get('code') || $this->session->userdata('access_token')) 
    {
        if($this->input->get('code') && !($this->session->userdata('access_token'))) 
        {
            // If the code was in get parameter we authorize
            $user = $this->meli->authorize($this->input->get('code'), 'https://www.rockscripts.org/themecomponents/mercadolibre/return_page');
            // Now we create the sessions with the authenticated user
            $this->session->set_userdata("access_token",$user['body']->access_token);
            $this->session->set_userdata("expires_in",time() + $user['body']->expires_in);
            $this->session->set_userdata("refresh_token",$user['body']->refresh_token);
        } 
        else 
        {
        // We can check if the access token in invalid checking the time
        if($this->session->userdata('expires_in') < time()) 
        {
        try {
                    // Make the refresh proccess
                    $refresh = $this->meli->refreshAccessToken();

                    // Now we create the sessions with the new parameters
                    $this->session->set_userdata("access_token",$refresh['body']->access_token);
                    $this->session->set_userdata("expires_in",time() + $refresh['body']->expires_in);
                    $this->session->set_userdata("refresh_token",$refresh['body']->refresh_token);
        } 
                catch (Exception $e) 
                {
                    echo "Exception: ",  $e->getMessage(), "\n";
        }
        }
        }
        echo '<pre>';
        print_r($this->session->all_userdata());
        echo '</pre>';	
     }
} 
}