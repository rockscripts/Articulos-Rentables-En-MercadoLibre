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
			
				<h4 class="page-header">Lista de Vendedores</h4>
				<b>Importar Articulos por:  </b>
				<span id="init_import" class='btn btn-primary button-top'>Vendedor</span> <span id="init_import" class='btn btn-info button-top'>Categoria</span>
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
            <th>Vendedor</th>
            <th>Acciones</th>			
        </tr>
    </thead>
 
    <tfoot>
        <tr>
            <th style="display:none">ID</th>
			<th>			
				<!--<input type="checkbox"  class="check-all" > -->
				
		    </th>
            <th>Vendedor</th>
            <th>Acciones</th>			
        </tr>
    </tfoot> 
    <tbody>
	<?php
	if(is_array($profitable_sellers )):
	 foreach($profitable_sellers as $profitable_seller):
	 ?>
	 <tr class="row-<?=$profitable_seller->userID?>">
	 <td style="display:none">
		<?=$profitable_seller->userID?>
	</td>
	<td>
		<input type="checkbox"  class="check-item" seller-id="<?=$profitable_seller->userID?>"> 
	</td>		   
	<td  class="userID-<?=$profitable_seller->userID?>">
		<a href="https://www.ebay.com/usr/<?=$profitable_seller->userID?>" target="_blank"><?=$profitable_seller->userID?></a>
	</td>  
	<td>
		<a href="<?=base_url()?>profit/seller_items?sellerID=<?=$profitable_seller->userID?>">
		 <img src="<?=base_url()?>template/devoops/img/analytics.png" class="icons-owner" title='Ver Articulos Rentables'/>
		</a>
		<a href="<?=base_url()?>profit?sellerID=<?=$profitable_seller->userID?>">
		 <img src="<?=base_url()?>template/devoops/img/x-button.png" class="icons-owner" title='Eliminar Vendedor'/>
        </a>
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

<style>
.fees-table td
{
	padding:4px;
	border:1px solid:#ccc;
}
</style>
<script>
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
$(document).on("click","#init_import",function(){
	var page = $("#pages").val();
			   if(page<=0)
			   page = 1;
			   
			   $.post(ajax_url+"profit/get_import_form",
				{page:page,display_items:"true"},
				function(data, status){
					new Messi(data.import_form, {title: 'Import items with profits', modal: true});
				}, "json");
});
</script>