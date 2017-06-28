<?php
use yii\helpers\Url;
?>



    <?php if($category['childs']): // если это родительская категория ?>
    <h3>
    	<li><a href="<?= Url::to(['category/view', 'id' => $category['id']]) ?>"><?=$category['name']?></a>
			<span class="count-item">(<?= count($category['childs']); ?>)</span>
    	</li>
    </h3>
        <ul>
            <li class="menu_indent"><a href="<?= Url::to(['category/view', 'id' => $category['id']]) ?>">Все модели</a></li>
            <?php foreach($category['childs'] as $key => $item): ?>
            <li class="<?php if($_GET['id'] == $item['id']) echo 'current-cat ' ?>menu_indent"><a href="<?= Url::to(['category/view', 'id' => $item['id']]) ?>"><?= $item['name']; ?></a></li>
            <?php endforeach; ?>
        </ul>
    <?php else: // если самостоятельная категория ?>
        <li class="<?php if($_GET['id'] == $category['id']) echo 'current-cat' ?>"><a href="<?= Url::to(['category/view', 'id' => $category['id']]) ?>"><?=$category['name']?></a></li>
    <?php endif; ?>


<!-- <?php if($category['parent_id'] == 0): ?>
	<h3>
		<li><a href="<?= Url::to(['category/view', 'id' => $category['id']]) ?>"><?= $category['name']; ?></a>
			<?php if(isset($category['childs'])): ?>
				<span class="count-item">(<?= count($category['childs']); ?>)</span>
			<?php endif; ?>
		</li>
	</h3>
<?php endif; ?>
	<?php if($category['childs']): ?>
		<ul>
		<?php foreach($category['childs'] as $key => $item): ?>
				<li style="margin-left: 15px;"><a href="<?= Url::to(['category/view', 'id' => $item['id']]) ?>"><?= $item['name']; ?></a></li>
		<?php endforeach; ?>
		</ul>
	<?php endif; ?> --><!-- 
	    <li><a href="#">Watches</a><span class="count-item">(23)</span></li>
	    <li class="current-cat"><a href="#">Jewelry</a><span class="count-item">(9)</span></li>
	    <li><a href="#">Hats, Scraves &amp; Gloves</a><span class="count-item">(12)</span></li>
	    <li><a href="#">Underwear &amp; Socks</a><span class="count-item">(48)</span></li>
	    <li><a href="#">Grooming</a><span class="count-item">(6)</span></li>
	    <li><a href="#">Belts</a><span class="count-item">(18)</span></li> -->
