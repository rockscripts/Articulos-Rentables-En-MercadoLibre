<script src="<?=base_url()?>template/devoops/plugins/dialog/messi.min.js"></script>
<link rel="stylesheet" href="<?=base_url()?>template/devoops/plugins/dialog/messi.min.css" />

<div class="well">
    <div class="row">
	<div class="col-xs-12 col-sm-12">
		<div class="box">
                    <?php
                    if(isset($message)):
                        if($message_type=="error"):
                            ?>
                            <p class="bg-warning"><?=$message?></p>
                            <?php
							else:
							?>
                            <p class="bg-success"><?=$message?></p>
                            <?php
                        endif;
                    endif;
                    ?>
			
			<div class="box-content">
			
				<h4 class="page-header">Articulos Rentables / <b><?=$_GET['sellerID']?></b></h4>
				<div class="buttons-area">					
					<div class="row form-group">
					<div class="col-sm-12"> 
					<!--Pages:    <select id="pages">
							<?php
							for($i=1;$i<=$profitable_seller->totalPages;$i++)
							{
						     ?>
							 <option value="<?=$i?>"><?=$i?></option>
							 <?php
							}
							?>
						</select>-->
						<select id="actions_main">
							<option>Acción</option>
							<!--<option value="0">Import Seller Items</option>-->
							<option value="1">Eliminar Seleccionados</option>
							<option value="2">Eliminar por Cantidad</option>							
							<!--<option value="3">Add Items Selected</option>-->
						</select>
						
					</div>
				</div>
				<!--<div class="row form-group">
				<div class="col-sm-12">  <b>Total entries: </b><?=$profitable_seller->totalEntries?></div>
				</div>-->
					</div>
				<div>				
				</div>
                 <table id="example" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>
           <th style="display:none">ID</th>
		   <th>			
				<!--<input type="checkbox" class="check-all"> -->
		    </th>
            <th>Titulo</th>
		<!--<th>sold in 30 days</th>-->
			<th>Vendidos</th>
			<th>u. Precio</th>
			<th>Ganancias</th>
            <th>Acciones</th>			
        </tr>
    </thead>
 
    <tfoot>
        <tr>
            <th style="display:none">ID</th>
			<th>			
				<!--<input type="checkbox"  class="check-all" > -->
				
		    </th>
            <th>Titulo</th>  
			<!--<th>sold in 30 days</th>-->
			<th>Vendidos</th>
			<th>u. Precio</th>
			<th>Ganancias</th>
			<th>Acciones</th>			
        </tr>
    </tfoot> 
    <tbody>
	<?php
	if(is_array($profitable_items )):
	 foreach($profitable_items as $profitable_item):
	 ?>
	 <tr class="row-<?=$profitable_item->itemID?>">
	 <td>
			<input type="checkbox"  class="check-item" item-id="<?=$profitable_item->itemID?>"> 
	 </td>
		    <td style="display:none"><?=$profitable_item->itemID?></td>
            <td  class="Title-<?=$profitable_item->itemID?>"><a href="<?=$profitable_item->viewItemURL?>" target="_blank"><?=$profitable_item->Title?></a></td>  
			<!--<td  class="totalQTYPurchased-<?=$profitable_item->itemID?>"><?=$profitable_item->totalQTYPurchased?></td>-->
			<td  class="totalItemsSold-<?=$profitable_item->itemID?>">
			  <?=$profitable_item->totalItemsSold?>
			</td>
			<td  class="StartPrice-<?=$profitable_item->itemID?>">
			<?php 
		 	 $platform_commision = number_format($profitable_item->StartPrice * 0.08,2,'.','');		 
			 /*Payment comission*/
			 $payment_commision = number_format($profitable_item->StartPrice * 0.06,2,'.','');;
			 $full_comission = 	number_format($platform_commision + $payment_commision,2,'.','');;
			 $total_per_sale =  number_format($profitable_item->StartPrice - $full_comission,2,'.','');;
			?>
			<a href="javascript:void();" class="open_fees" currency="<?=$profitable_item->Currency?>" platform_commision="<?=$platform_commision?>" payment_commision="<?=$payment_commision?>"  full_comission="<?=$full_comission?>" total_per_sale="<?=$total_per_sale?>">
			  <?php echo money_format('%.0n',$profitable_item->StartPrice);?>
			</a>
			</td>
			<td class="totalMoneyPurchased-<?=$profitable_item->itemID?>">
			<?php echo money_format('%.0n',$profitable_item->totalMoneyPurchased);?>
			</td>
            <td>
			 <select id="actions_item" item-id="<?=$profitable_item->itemID?>">
				<option>Seleccionar</option>
				<option value="0">Actualizar Articulo</option>
			</select>
			</td>           			
     </tr>
	 <?php
	 endforeach;
	 endif;
	?>
    </tbody>
</table>
			</div>
		</div>
	</div>
</div>
</div>
<div id="fees-table" style="display:none" > 
	<table class="fees-table">
	    <tr>
			<td><b>FEE</b></td><td><b class="currency"></b></td>
	    </tr>
		<tr>
			<td><b>Site:</b></td><td class="platform_commision"></td>
	    </tr>
		<tr>
			<td><b>Payment:</b></td><td class="payment_commision"></td>
			 </tr>
		<tr>
			<td><b>Full:</b></td><td class="full_comission"></td>
	    </tr>
	</table>
</div>
<script>
$(document).ready(function()
{
	var pageImported = "<?php echo $profitable_seller->pageImported;?>"
	$("#pages").val(pageImported);
})
	/*var table = $('#example').DataTable({
   'aoColumnDefs': [{
        'bSortable': false,
        'aTargets': [0,1] /* 1st one, start by the right */
   /* }],
	
});*/	
$('#example').DataTable({
    "language": {
        "sProcessing":    "Procesando...",
        "sLengthMenu":    "Mostrar _MENU_ registros",
        "sZeroRecords":   "No se encontraron resultados",
        "sEmptyTable":    "Ningún dato disponible en esta tabla",
        "sInfo":          "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty":     "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered":  "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":   "",
        "sSearch":        "Buscar:",
        "sUrl":           "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst":    "Primero",
            "sLast":    "Último",
            "sNext":    "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
    }
});
		/*$(document).on("click",".check-all",function()
		{
			var is_checked = $(".check-all").prop("checked");
			if(is_checked)
			{
			  $("#example").find(".check-item").prop("checked",true);
			  $(".check-all").prop("checked",true);	
			  $(".check-all").attr("page",$(".current").text())
			}
			else
			{
			 $(".check-item").prop("checked",false);
			 $(".check-all").prop("checked",false);
			}			
		});*/
		$(document).on("click",".open_fees",function()
		{
			$(".platform_commision").text($(this).attr("platform_commision"));
			$(".payment_commision").text($(this).attr("payment_commision"));
			$(".full_comission").text($(this).attr("full_comission"));
			$(".total_per_sale").text($(this).attr("total_per_sale"));
			$(".currency").text($(this).attr("currency"));			
			new Messi($("#fees-table").html(), {title: 'Fees Calculator', modal: true});
		});
		
		/************ACTIONS MAIN*************/
		$( "#actions_main" ).change(function() 
		    {
             if($(this).val()=="0")
			 {
			   var page = $("#pages").val();
			   $.post(ajax_url+"mercadolibre/profit/get_import_form",
				{page:page,display_items:"true"},
				function(data, status){
					new Messi(data.import_form, {title: 'Import items with profits', modal: true});
				}, "json");
			 }	
            if($(this).val()=="1")
			 {
				 Messi.ask('Are you sure you want remove items selected?', function(val) { 
             if(val=="Y")
			 {
				 var itemsIDs = new Array();
				 $(".check-item").each(function(){
					 var is_checked = $(this).prop("checked");
			         if(is_checked)
					 {
						itemsIDs.push($(this).attr("item-id"));
						$(".row-"+$(this).attr("item-id")).remove(); 
					 }
					
				 });
			   $.post(ajax_url+"profit/remove_profitable_items",
				{itemsIDs:itemsIDs},
				function(data, status){
					new Messi("Query has been processed.", {title: 'Remove Items', titleClass: 'success', buttons: [{id: 0, label: 'Close', val: 'X'}]});
				}, "json");	
             }
			});				
			 }	
           if($(this).val()=="2")
			 {
			   $.post(ajax_url+"profit/get_remove_by_qty_form",
				{display_items:"true"},
				function(data, status){
					new Messi(data.get_remove_by_qty_form, {title: 'Remove Items', modal: true});
				}, "json");			   
			 }				 
            });
			
			
			$("#actions_item").change(function() 
		    {
			  var itemID = $(this).attr("item-id");
			  if($(this).val()=="0")
			   {
				$(".loader-image").fadeIn();
			    $.post(ajax_url+"profit/update_item_info",
				{itemID:itemID},
				function(data, status)
				{
					$(".StartPrice-"+itemID).text(data.StartPrice);
					$(".StartPrice-"+itemID).attr("platform_commision",data.profitable_item.platform_commision);
					$(".StartPrice-"+itemID).attr("payment_commision",data.profitable_item.payment_commision);
					$(".StartPrice-"+itemID).attr("full_comission",data.profitable_item.full_comission);
					$(".StartPrice-"+itemID).attr("total_per_sale",data.profitable_item.total_per_sale);
					$(".totalQTYPurchased-"+itemID).text(data.profitable_item.totalQTYPurchased);
					$(".totalItemsSold-"+itemID).text(data.profitable_item.totalItemsSold);
					$(".Title-"+itemID).find("a").text(data.profitable_item.Title);
					$(".totalMoneyPurchased-"+itemID).text(data.profitable_item.totalMoneyPurchased);
					$(".loader-image").fadeOut();
				}, "json");	
				
			   }				 
			});		
			
		  $( "#pages" ).change(function() 
		    {
             
			   var page = $("#pages").val();
			   var userID = "<?php echo $userID;?>";
               $.post(ajax_url+"profit/update_pageImported",
				{
				   page:page,
				   userID:userID
				},
				function(data, status){
					
				}, "json");
			 
			 
            });
		
</script>
<style>
.fees-table td
{
	padding:4px;
	border:1px solid:#ccc;
}
</style>