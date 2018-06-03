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
			<p>It will remove items that match within 30 days and quantity sold less than this value</p>
				
                                    <?php
                                    $attributes = array('class' => 'form-horizontal', 'id' => 'myform', 'role'=>"form");
                                    echo form_open('profit/remove_by_qty', $attributes);
                                    ?>
                                
					<div class="form-group" >
                                            
						<label class="col-sm-2 control-label">Qty less than</label>
						<div class="col-sm-4">
                                                    <input name="qty" id="qty" type="text" class="form-control" placeholder="0" data-toggle="tooltip" data-placement="bottom" title="Type Quantity" value="0" style=" text-align:center;   width: 54px;">
													
						</div>
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