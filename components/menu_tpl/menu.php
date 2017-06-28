<?php 

use yii\helpers\Url;

?>
	<li class="active menu-item-has-children item-megamenu">
		
		<a href="<?=Url::to(['category/view', 'id' => $category['id']]) ?>"><?= $category['name']; ?></a>
		
		<?php if(isset($category['childs'])): ?>
			<div style="width:500px;" class="sub-menu megamenu">
				<div class="row">
					<div class="col-sm-12">
						<div class="mega-custom-menu">

							<ul>
								<?= $this->getMenuHtml($category['childs']) ?>

		                            
	                        </ul>
						</div>
					</div>
					
				</div>
			</div>
		<?php endif; ?>
	</li>
	