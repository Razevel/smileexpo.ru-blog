<?php

use app\components\CategoryNav\CategoryNav;

use \yii\helpers\StringHelper;
use yii\helpers\Url;
			
$this->title = Yii::t('app','New articles').' - SmileBlog.ru';
?>

<!-- Tags Result-->
<h1 style="font-size: 2em; margin: 10px;">Теги</h1>
<div class="tags" style="margin-left: 10px;">
	<?php if(isset($model['result']['tags']) && count($model['result']['tags'])>0): ?>
	<ul>
		<?php foreach ($model['result']['tags'] as $tag): ?>
		<li>
			<a href="<?=Url::to(['blog/tag', 'id' => $tag['id']])?>">
				#<?=$tag['title']?> (<?=count($tag['articles'])?>)
			</a>
		</li>
		<?php endforeach;?>
	</ul>
	<?php else: ?>
		<p>Подходящих тегов не найдено :(</p>
	<?php endif; ?>
</div>

<!-- Categories Result-->
<h1 style="font-size: 2em; margin: 10px;">Категории</h1>
<div class="tags" style="margin-left: 10px;">
	<?php if(isset($model['result']['categories']) && count($model['result']['categories'])>0): ?>
	<ul>
		<?php foreach ($model['result']['categories'] as $category): ?>
		<li>
			<a href="<?=Url::to(['blog/category', 'id' => $category['id']])?>">
				#<?=$category['title']?> (<?=count($category['articles'])?>)
			</a>
		</li>
		<?php endforeach;?>
	</ul>
	<?php else: ?>
		<p>Подходящих категорий не найдено :(</p>
	<?php endif; ?>
</div>

<!-- Articles Result-->
<h1 style="font-size: 2em; margin: 10px;">Статьи</h1>

<?php if(isset($model['result']['articles']) && count($model['result']['articles'])>0): ?>

	<?php foreach ($model['result']['articles'] as $article): ?>
	<?php
		$img_path = Url::to('@web/images/articles/'.$article['image']);
		$pub_time = strtotime($article['pub_date']);
	?>

	<div class="blog-section">
		<a href="<?=Url::to(['blog/article', 'id' => $article['id']])?>">
			<img src="<?=$img_path?>" alt="<?=$article['title']?>"/>
		</a>
		<div class="grid">
		 	<div class="grid-left">
			  	<span class="f"> </span>
			   	<h3><?=date('d', $pub_time)?></h3>
			   	<p><?=date('M', $pub_time)?></p>
			</div>
			<div class="grid-right">
			  	<a href="<?=Url::to(['blog/article', 'id' => $article['id']])?>">
					<h3><?=$article['title']?></h3>
				</a>
				<p style="margin: 15px 0px">
				
				<?php foreach($article['tags'] as $tag): ?>
					<a href="<?=Url::to(['blog/tag', 'id' => $tag['id']])?>">
						#<?=$tag['title']?>
					</a>&nbsp;&nbsp;&nbsp;&nbsp;
				<?php endforeach;?>
				
				</p>
				<ul class="blog-list">
				  	<li>
				  		<span class="mike"> </span>
				  		<a href="#">admin</a>
				  	</li>
				  	<li>
				  		<span class="box"> </span>
				  		<a href="#"><?=$article['category']['title']?></a>
				  	</li>
					<li>
						<span class="comm"> </span>
						<a href="<?=Url::to(['blog/article', 'id' => $article['id'], '#' => 'comments'])?>"><?=Yii::t('app', 'Comments')?> (0)</a>
					</li>
				</ul>
				<p><?=StringHelper::truncate($article['text'], 150, '...')?></p>
				<a class="bwn" href="<?=Url::to(['blog/article', 'id' => $article['id']])?>">
					<?=Yii::t('app', 'READ MORE')?>
				</a>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<hr style="border-color: rgba(0,0,0,0.3);">
	<?php endforeach; ?>

<?php else: ?>
	<p style="margin: 0.7em;">Подходящих статей не найдено :(</p>
<?php endif; ?>
			
			
	

