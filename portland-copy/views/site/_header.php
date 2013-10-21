<div id="topbar" class="row-fluid" >
	<div id="searchentry" class="span3" >
		<?php echo $this->renderPartial("/site/_search",array(),true); ?>
	</div>
	<div class="span4" >

	</div>
	<div class="span4">
		<div id="login">
			<?php if(Yii::app()->user->isGuest): ?>
				<?php echo CHtml::ajaxLink(Yii::t('global','Login'),array('site/login'),
					array('onClick'=>'js:jQuery($("#LoginForm")).dialog("open")'),
					array('id'=>'btnLogin')); ?>
				&nbsp;/&nbsp;
				<a href="<?= _xls_site_url('myaccount/edit'); ?>"><?php echo Yii::t('global', 'Register'); ?></a>
			<?php else: ?>
				<?php echo CHtml::link(CHtml::image(Yii::app()->user->profilephoto).Yii::app()->user->firstname, array('/myaccount')); ?>
				&nbsp;&nbsp;/&nbsp;&nbsp;<?php echo CHtml::link(Yii::t('global', 'Logout'), array("site/logout")); ?>
				<?php endif; ?>
		</div>
		<?php if(_xls_get_conf('LANG_MENU',0)): ?>
			<div id="langmenu">
				<?php $this->widget('application.extensions.'._xls_get_conf('PROCESSOR_LANGMENU').'.'._xls_get_conf('PROCESSOR_LANGMENU')); ?>
				</div>
		<?php endif; ?>
		<?php if(_xls_get_conf('ENABLE_WISH_LIST',0)): ?>
			<div class="wishlists">
				<?php if(Yii::app()->user->isGuest)
					echo CHtml::link(Yii::t('global', 'Wish Lists'), array("wishlist/search"));
				else
					echo CHtml::link(Yii::t('global', 'Wish Lists'), array("/wishlist"));
				?>
			</div>
		<?php endif; ?>
		<div id="checkoutlink" class="wishlists">
			<?php echo CHtml::link(Yii::t('cart','n==1#Checkout ({n} item)|n>1#Checkout ({n} items)',Yii::app()->shoppingcart->totalItemCount),array('cart/checkout')) ?>
		</div>
	</div>


	<div class="span1" id="shoppingcartwrapper">

		<div id="shoppingcart">
			<?= $this->renderPartial('/site/_sidecart',null, true); ?>
		</div>

		<div id="shoppingcartcheckout" onclick="window.location.href='<?php echo Yii::app()->createUrl('cart/checkout') ?>'">
			<div class="checkoutlink"><?php echo CHtml::link(Yii::t('cart','Checkout'),array('cart/checkout')) ?></div>
			<div class="checkoutarrow"><?php echo CHtml::image(Yii::app()->theme->baseUrl."/css/images/checkoutarrow.png"); ?></div>
		</div>

		<div id="shoppingcarteditcart" onclick="window.location.href='<?php echo Yii::app()->createUrl('/cart') ?>'">
			<div class="editlink"><?php echo CHtml::link(Yii::t('cart','Edit Cart'),array('/cart')) ?></div>
		</div>


	</div>

</div>
<div id="headerimagebg">
	<div id="headerimage">
		<?php echo CHtml::link(CHtml::image(Yii::app()->baseUrl._xls_get_conf('HEADER_IMAGE')), Yii::app()->baseUrl."/"); ?>
	</div>
</div>