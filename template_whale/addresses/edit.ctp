<div class="box clearfix">
	<div class="f-top clearfix"><h2><?php __('Change Address');?></h2></div>
	<div class="f-repeat clearfix">
		<div class="content">
			<div id="leftcol">
				<?php echo $this->element('menu_user', array('cache' => Configure::read('Cache.time')));?>
			</div>
			<div id="rightcol">
				<?php
				$html->addCrumb('My Addresses', '/addresses');
				$html->addCrumb('Edit', '/addresses/edit/'.$name);
				echo $this->element('crumb_user');
				?>
				
				<?php echo $form->create(null, array('url' => '/addresses/edit/'.$name));?>
					<fieldset>
						<legend><?php __('Update an Address');?></legend>
					<?php
						echo $form->input('id');
						echo $form->input('name', array('label' => __('Name *', true)));
						echo $form->input('address_1', array('label' => __('Address (line 1) *', true)));
						echo $form->input('address_2', array('label' => __('Address (line 2)', true)));
						echo $form->input('suburb', array('label' => __('Suburb / Town', true)));
						echo $form->input('city', array('label' => __('City / State / County *', true)));
						echo $form->input('postcode', array('label' => __('Post Code / Zip Code *', true)));
						echo $form->input('country_id', array('label' => __('Country *', true), 'empty' => 'Select'));
						echo $form->input('phone', array('label' => __('Phone', true)));
						echo $form->input('update_all', array('type' => 'checkbox', 'label' => __('Make all your addresses this address.', true)));
					?>
					</fieldset>
				<?php echo $form->end('Update Address');?>
				
				<div class="actions">
					<ul>
						<li><?php echo $html->link(__('<< Back to your addresses', true), array('action' => 'index'));?></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="f-bottom clearfix"> &nbsp; </div>
</div>