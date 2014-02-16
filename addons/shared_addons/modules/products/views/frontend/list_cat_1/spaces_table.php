<?php //var_dump($this->front->page->get_categoryauxiliars('usetypessync')); ?>
<?php $i = $result->list->offset; ?>
<?php $usetypesArr = $this->front->page->get_categoryauxiliars('usetypessync'); ?>
<?php //var_dump($usetypesArr); ?>	
<?php foreach($result->list->items as $item): ?>
<?php //var_dump($item); ?>	
<div id="amrresulttable" class="table-responsive">
	<table class="table table-bordered table-homelist" onmouseover="markers[<?php echo $i; ?>].setIcon(gimage_hover)" onmouseout="markers[<?php echo $i; ?>].setIcon(gimage)">
		<tr>
			<td rowspan="4" width="200px">
				<div id="crsl-homelist-<?php echo $item->id ?>" class="carousel slide crsl-homelist" data-ride="carousel">
				<div class="carousel-inner">
					<?php foreach($item->cloud_th_images as $index=>$img): ?>
						<div class="item <?php if($index==0) echo 'active'; ?>">
							<a href="<?php echo $item->itemUri; ?>">
								<img src="<?php echo $media->cdnUri.$img; ?>" alt="<?php echo $item->space_denomination.' '.$item->space_name ?>" />
								<div class="carousel-caption ccsm">
									<p><?php echo $item->space_denomination.' '.$item->space_name ?></p>
								</div>
							</a>
						</div>
					<?php endforeach; ?>													
				</div>			  
				<a class="left carousel-control" href="#crsl-homelist-<?php echo $item->id ?>" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left"></span>
				</a>
				<a class="right carousel-control" href="#crsl-homelist-<?php echo $item->id ?>" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right"></span>
				</a>
				</div>
			</td>
			<td colspan="2" class="theader">
				<a href="<?php echo $item->itemUri; ?>"><h4><span class="glyphicon glyphicon-chevron-right"></span> <?php echo $item->space_denomination ?>&nbsp;<?php echo $item->space_name ?></a>
				<span class="pull-right">
					<span class="glyphicon glyphicon-map-marker"></span> <?php echo $item->loc_area ?>
				</span>
				<span class="pull-right"> 
					<i class="fa fa-users"></i> <?php echo $item->space_max_capacity ?> <a data-toggle="tooltip" title="Capacidad máxima de personas">pax</a>&nbsp;&nbsp;&nbsp;
				</span>						
				</h4>						
			</td>
		</tr>
		<tr>
			<td class="content" colspan="3">
				<div class="service-tags pull-left">
					<?php foreach($item->space_usetypes_all as $utid): ?>
						<?php if(in_array($utid, $item->space_usetypes_published)): ?>
							<a href="<?php echo $item->space_usetypes_published_uri[$utid]; ?>"><span class="label label-servicetable published">{{ theme:image file="amr-isologo-sm.png" class="amrlogo-tiny space-table-service" }} <?php echo $usetypesArr[$utid]->name; ?> <i class="fa fa-chevron-circle-right"></i></span></a>						
						<?php else: ?>
							<span class="label label-servicetable"><i class="fa fa-check"></i> <?php echo $usetypesArr[$utid]->name; ?></span>
						<?php endif; ?>
					<?php endforeach; ?>
				</div>					
			</td>		
		</tr>	
		<tr>
			<td class="content last" colspan="3">
				<p>
					<span class="loc-color"><span class="glyphicon glyphicon-home"></span> <?php echo $item->loc_name ?></span> &nbsp;&nbsp;<small><i class="fa fa-flag"></i> <?php echo $item->loc_type ?></small><br>
					<small class="pull-left"><i class="fa fa-location-arrow"></i> <?php echo $item->loc_city ?> ( <?php echo $item->loc_area ?> ) &nbsp;&nbsp;<i class="fa fa-globe"></i> <?php echo $item->loc_country ?></small>				
			    </p>
				<a class="btn btn-primary btn-md pull-right btn-list-go" href="<?php echo $item->itemUri; ?>">Ver y <strong>consultar</strong></a>				    
			</td>
		</tr>		
		</table>
</div>
<?php $i++; ?>
<?php endforeach; ?>	
