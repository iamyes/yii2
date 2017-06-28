<option value="<?= $category['id'] ?>" 
	<?php if($category['id'] == $this->model->parent_id) echo ' selected' ?>
	<?php if($category['id'] == $this->model->id) echo ' disabled' ?>
	><?php if($category['parent_id'] == 0) echo $tab . $category['name']; ?>
</option>
<?php if(isset($category['childs'])): ?>
	<ul>
		<?= $this->getMenuHtml($category['childs'], $tab . '-') ?>
    </ul>	
<?php endif; ?>