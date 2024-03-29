<?php
$html->addCrumb('Referrals', '/referrals');
$html->addCrumb('Pending', '/referrals/pending');
echo $this->element('crumb_user');
?>

<h1><?php __('Pending Referrals');?></h1>

<p><?php __('Pending referrals are users who you have referred who have not purchased any bids yet.');?></p>

<?php if(!empty($referrals)) : ?>

<?php echo $this->element('pagination'); ?>

<table class="results" cellpadding="0" cellspacing="0">
	<tr>
		<th><?php echo $paginator->sort('User.username');?></th>
		<th><?php echo $paginator->sort('User.first_name');?></th>
		<th><?php echo $paginator->sort('User.last_name');?></th>
		<th><?php echo $paginator->sort('Date Joined', 'Referral.created');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($referrals as $referral):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $referral['User']['username']; ?>
		</td>
		<td>
			<?php echo $referral['User']['first_name']; ?>
		</td>
		<td>
			<?php echo $referral['User']['last_name']; ?>
		</td>
		<td>
			<?php echo $time->niceShort($referral['Referral']['created']); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>

<?php echo $this->element('pagination'); ?>

<?php else:?>
	<p><?php __('You do not have any pending referrals at the moment.');?></p>
<?php endif;?>
