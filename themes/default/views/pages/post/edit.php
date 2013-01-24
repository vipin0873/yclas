<?php defined('SYSPATH') or die('No direct script access.');?>
<div class="row-fluid">
	<div class="span10">
		 <?=Form::errors()?>
		<div class="page-header">
			<h1><?=__('Edit Advertisement')?></h1>
		</div>
		<?= FORM::open(Route::url('update', array('controller'=>'ad','action'=>'update','title'=>$ad->title,'id'=>$ad->id_ad)), array('class'=>'form-horizontal', 'enctype'=>'multipart/form-data'))?>
			<fieldset>
				<div class="control-group">
					<?if(Auth::instance()->get_user()->role = 10):?>
					<table class="table table-bordered span4">
						<tr>
							<th><?=__('Id_User')?></th>
							<th><?=__('Name')?></th>
							<th><?=__('Email')?></th>
						</tr>
						<tbody>
							<tr>
								<td><p><?=Auth::instance()->get_user()->id_user;?></p></td>
								<td><p><?=Auth::instance()->get_user()->name;?></p></td>
								<td>	
									<a src="#" alt=""><?=Auth::instance()->get_user()->email;?></a>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="control-group">
					<?= FORM::label('status', __('Status'), array('class'=>'control-label', 'for'=>'status'))?>
					<div class="controls">
						<?php $status = array('0'=>__('notpublished'), '1'=>__('published'),'30'=>__('spam'),'50'=>__('unavailible'));?>
						<?= FORM::select('status', $status, $ad->status, array('id'=>'status','class'=>'input-xlarge'));?>
					</div>
					<?endif?>
				</div>
				<div class="control-group">
					<?= FORM::label('title', __('Title'), array('class'=>'control-label', 'for'=>'title'))?>
					<div class="controls">
						<?= FORM::input('title', $ad->title, array('placeholder' => __('Title'), 'class' => 'input-xlarge', 'id' => 'title', 'required'))?>
					</div>
				</div>
				<div class="control-group">
					<?= FORM::label('category', __('Category'), array('class'=>'control-label', 'for'=>'category'))?>
					<div class="controls">
					<?$_val_category = array();?>	
					<?php foreach($category as $cat): ?>
						<? $id = $cat->id_category; ?>
							<? $_val_category[$cat->id_category] = $cat->seoname; ?>
						<?endforeach?>
					<?= FORM::select('category', $_val_category, $ad->id_category, array('id'=>'category','class'=>'input-xlarge', 'required'));?>
					</div>
				</div>
				<div class="control-group">
					<?= FORM::label('location', __('Location'), array('class'=>'control-label', 'for'=>'location'))?>
					<div class="controls">
						<?$_val_location = array();?>
						<?php foreach ($location as $loc):?>
							<? $_val_location[$loc->id_location] = $loc->seoname; ?>
						<?endforeach?>
					<?= FORM::select('location', $_val_location, $ad->id_location, array('id'=>'location', 'class'=>'input-xlarge', 'required'));?>
					</div>
				</div>
				<div class="control-group">
					<?= FORM::label('description', __('Description'), array('class'=>'control-label', 'for'=>'description'))?>
					<div class="controls">
						<?= FORM::textarea('description', $ad->description, array('class'=>'input-xxlarge', 'name'=>'description', 'id'=>'description', 'rows'=>15, 'required'))?>
					</div>
				</div>
				<div class="control-group">
					<div class="controls">
						<?php if($path):?>
						<ul class="thumbnails">
							<?php foreach ($path as $path):?>
							<?$img_name = str_replace(".jpg", "", substr(strrchr($path, "/"), 1 ));?>
							<?if(strstr($path, '_') != '_original.jpg'):?>
							<li>
								<a href="#" class="thumbnail">
									<img src="/<?echo $path?>" class="img-rounded" alt="">
								</a>
								<a class="btn btn-danger" href="<?=Route::url('update', array('controller'=>'ad', 'action'=>'delete', 'title'=>$ad->title,'id'=>$ad->id_ad, 'img_name'=>$img_name ))?>" rel"tooltip" title="<?=__('Delete image')?>">
									<?=__('Delete')?>
								</a>	
							</li>
							<?endif?>
							<?endforeach?>
						</ul>
						<?endif?>
					</div>	
				</div>
				<div class="control-group">
					<?= FORM::label('images', __('Images'), array('class'=>'control-label', 'for'=>'images1'))?>
					<div class="controls">
						<input class="input-file" type="file" name="image1" id="fileImput1" />
					</div>
					<?= FORM::label('images2', __('Images'), array('class'=>'control-label', 'for'=>'images2'))?>
					<div class="controls">	
						<input class="input-file" type="file" name="image2" id="fileImput2" />
					</div>
				</div>
				<div class="control-group">
					<?= FORM::label('phone', __('Phone'), array('class'=>'control-label', 'for'=>'phone'))?>
					<div class="controls">
						<?= FORM::input('phone', $ad->phone, array('class'=>'input-xlarge', 'id'=>'phone', 'placeholder'=>__('Phone')))?>
					</div>
				</div>
				<div class="control-group">
					<?= FORM::label('address', __('Address'), array('class'=>'control-label', 'for'=>'address'))?>
					<div class="controls">
						<?= FORM::input('address', $ad->adress, array('class'=>'input-xlarge', 'id'=>'address', 'placeholder'=>__('Address')))?>
					</div>
				</div>
				<div class="control-group">
					<?= FORM::label('price', __('Price'), array('class'=>'control-label', 'for'=>'price'))?>
					<div class="controls">
						<?= FORM::input('price', $ad->price, array('placeholder' => __('Price'), 'class' => 'input-xlarge', 'id' => 'price', 'type'=>'number'))?>
					</div>
				</div>
				<div class="form-actions">
					<?= FORM::button('submit', 'update', array('type'=>'submit', 'class'=>'btn-large btn-primary', 'action'=>Route::url('update', array('controller'=>'ad','action'=>'update','title'=>$ad->title,'id'=>$ad->id_ad))))?>
					<p class="help-block">Dynamic text, for free or pay XX€..</p>
				</div>
			</fieldset>
		<?= FORM::close()?>

	</div>
	<!--/span-->
</div>
<!--/row-->
