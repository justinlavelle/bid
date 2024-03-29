<?php
$html->addCrumb(__('Manage Auctions', true), '/admin/auctions');
if(!empty($extraCrumb)) :
	$html->addCrumb($extraCrumb['title'], '/admin/auctions/'.$extraCrumb['url']);
endif;
echo $this->element('admin/crumb');
?>

<div class="auctions index">

<h2><?php __('Auctions');?></h2>

<blockquote><p>Administer your website's auctions below. Here you can edit their content, refund bids, views entire auction bid history, start an auction, and much more. <span class="helplink">[ <a href="https://members.phppennyauction.com/link_help.php?id=12" target="_blank">Find out more &raquo;</a> ]</span></p></blockquote>

<?php if(!empty($statuses)):?>
	<?php if(!empty($appConfigurations['autobids'])) : ?>
		<div class="actions">
			<ul>
				<li><?php echo $html->link(__('View auctions won by autobidders', true), array('controller' => 'auctions', 'action' => 'autobidders')); ?></li>
				<li><?php echo $html->link(__('View auctions won by admin users', true), array('controller' => 'auctions', 'action' => 'adminusers')); ?></li>
			</ul>
		</div>
	<?php endif; ?>
	
	<p><?php __('View by status :');?>
	<?php echo $form->create('Auction', array('action' => 'won'));?>
	<?php echo $form->input('status_id', array('id' => 'selectStatus', 'selected' => $selected, 'options' => $statuses, 'label' => false));?>
	<?php echo $form->end();?></p>
<?php endif;?>

<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Manage your Products', true), array('controller' => 'products', 'action' => 'index')); ?></li>
	</ul>
</div>

<?php if($paginator->counter() > 0):?>

<?php echo $this->element('admin/pagination'); ?>

<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort(__('ID',true), 'Auction.id');?></th>
	<th><?php echo $paginator->sort(__('Title',true), 'Product.title');?></th>
	<th><?php echo $paginator->sort(__('Category',true), 'Category.name');?> <img src="<?php echo $appConfigurations['url']?>/admin/img/sortup.gif" /> <img src="<?php echo $appConfigurations['url']?>/admin/img/sortdown.gif" /> </th>
	<th><?php echo $paginator->sort(__('Featured',true));?></th>
	<th><?php echo $paginator->sort(__('Peak Only', true), 'peak_only');?></th>
	<th><?php echo $paginator->sort(__('Fixed Price', true), 'Product.fixed_price');?></th>
	<th><?php echo $paginator->sort(__('Start Time', true), 'end_time');?></th>
	<th><?php echo $paginator->sort(__('End Time', true), 'end_time');?></th>
	<th><?php echo $paginator->sort(__('Price', true), 'price');?></th>
	<th><?php echo $paginator->sort(__('Active', true));?></th>
	<th><?php echo $paginator->sort(__('Hits', true));?></th>
	<th><?php echo $paginator->sort(__('Status', true), 'Status.name');?></th>
	<th class="actions"><?php __('Options');?></th>
</tr>
<?php
$i = 0;
foreach ($auctions as $auction):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $auction['Auction']['id']; ?>
		</td>
		<td>
			<?php echo $auction['Product']['title']; ?>
		</td>
		<td>
			<?php echo $html->link($auction['Product']['Category']['name'], array('admin' => false, 'controller'=> 'categories', 'action'=>'view', $auction['Product']['Category']['id']), array('target' => '_blank')); ?>
		</td>
		<td>
			<?php echo !empty($auction['Auction']['featured']) ? __('Yes', true) : __('No', true); ?>
		</td>
		<td>
			<?php echo !empty($auction['Auction']['peak_only']) ? __('Yes', true) : __('No', true); ?>
		</td>
		<td>
			<?php echo !empty($auction['Product']['fixed']) ? __('Yes', true) : __('No', true); ?>
		</td>
		<td>
			<?php echo $time->niceShort($auction['Auction']['start_time']); ?>
		</td>
		<td>
			<?php echo $time->niceShort($auction['Auction']['end_time']); ?>
		</td>
		<td>
			<?php echo $number->currency($auction['Auction']['price'], $appConfigurations['currency']); ?>
		</td>
		<td>
			<?php echo !empty($auction['Auction']['active']) ? __('Yes', true) : __('No', true); ?>
		</td>
		<td>
			<?php echo $auction['Auction']['hits']; ?>
		</td>
		<td>
			<?php if(!empty($auction['Status']['name'])) : ?>
				<?php echo $auction['Status']['name']; ?>
			<?php elseif(!empty($auction['Auction']['closed'])): ?>
				Closed
			<?php elseif($auction['Auction']['end_time'] > time()): ?>	
				Coming Soon
			<?php else : ?>
				Live	
			<?php endif; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('admin' => false, 'action' => 'view', $auction['Auction']['id']), array('target' => '_blank')); ?>
			<?php if(!empty($auction['Winner']['id'])) : ?>
				<?php if($auction['Winner']['autobidder'] == 0) : ?>
					/ <?php echo $html->link(__('View Winner', true), array('action' => 'winner', $auction['Auction']['id'])); ?>
				<?php endif; ?>
			<?php elseif(empty($auction['Auction']['closed'])) : ?>
				/ <?php echo $html->link(__('Edit', true), array('action' => 'edit', $auction['Auction']['id'])); ?>
			<?php endif; ?>
			<?php if(!empty($appConfigurations['autobids'])) : ?>
				/ <?php echo $html->link(__('Stats', true), array('action' => 'stats', $auction['Auction']['id'])); ?>
			<?php endif; ?>
			<?php if(!empty($auction['Bid'])) : ?>
				/ <?php echo $html->link(__('Bids Placed', true), array('controller' => 'bids', 'action' => 'auction', $auction['Auction']['id'])); ?>
				/ <?php //echo $html->link(__('Refund Bids', true), array('action' => 'refund', $auction['Auction']['id']), null, sprintf(__('Are you sure you want to refund ALL the bids for this auction titled: %s?  This will delete ALL the bids on the auction to date.  If the auction has a winner, you should update the status to \'Refunded\' for the auction if you are refunding the winner.', true), $auction['Product']['title'])); ?>
			<?php endif; ?>
			<?php if($auction['Auction']['winner_id']!=0):?>
				<?php if($auction['Auction']['refund']==0):?>
					/ <?php echo $html->link("Trả lại XU cho người thắng cuộc", array('action' => 'refundwinner', $auction['Auction']['id']), null, "Xác nhận trả lại XU cho người thắng cuộc sản phẩm ".$auction['Product']['title']); ?>
				<?php endif;?>
				/ <?php echo $html->link("Gửi email cho người thắng cuộc", array('action' => 'emailwinner', $auction['Auction']['id']), null, "Gửi email cho người thắng cuộc sản phẩm ".$auction['Product']['title']) ; ?>
			<?php endif;?>
			/ <?php echo $html->link(__('Delete', true), array('action' => 'delete', $auction['Auction']['id']), null, sprintf(__('Are you sure you want to delete auction titled: %s?', true), $auction['Product']['title'])); ?>
			/ <?php echo $html->link("Trả lại 70% xu" , array('controller'=>'bids','action' => 'errorrefund', $auction['Auction']['id'],0.7,0)); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>

<?php echo $this->element('admin/pagination'); ?>

<?php else: ?>
	<p><?php __('There are no auctions at the moment.');?></p>
<?php endif; ?>
</div>

<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Manage your Products', true), array('controller' => 'products', 'action' => 'index')); ?></li>
	</ul>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		if($('#selectStatus').length){
			$('#selectStatus').change(function(){
				location.href = '/admin/auctions/won/' + $('#selectStatus').val();
			});
		}
	});
</script>