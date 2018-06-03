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
                        endif;
                    endif;
                    ?>
			
			<div class="box-content">
				
                                    <?php
                                    $attributes = array('class' => 'form-horizontal', 'id' => 'myform', 'role'=>"form");
                                    echo form_open('mercadolibre/profit/import_seller_items', $attributes);
                                    ?>
                                
					<div class="form-group" >
                                            
						<label class="col-sm-2 control-label">User ID</label>
						<div class="col-sm-4">
                                                    <input name="userID" id="userID" type="text" class="form-control" placeholder="the_trader" data-toggle="tooltip" data-placement="bottom" title="Type user id" style="min-width: 200px;">
						</div>
                          <input type="hidden" name="page" id="page" value="<?=$page?>">  
                          <input type="hidden" name="display_items" id="display_items" value="<?=$display_items?>"> 						  
					</div>	
                                    <?php
                                    echo form_submit('mysubmit', 'Submit');
                                    ?>
				</form>
			</div>
		</div>
	</div>
</div>
</div> 