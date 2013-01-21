<?php
/* @var $this FilmController */
/* @var $model Film */

$this->breadcrumbs=array(
	'Films'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Film', 'url'=>array('index')),
	array('label'=>'Create Film', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('film-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Films</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'film-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'film_id',
		'title',
		'type_of_film',
		'introduction_context',
		'description',
		'special_memo',
		/*
		'release_year',
		'language_id',
		'original_language_id',
		'rental_duration',
		'rental_rate',
		'length',
		'replacement_cost',
		'rating',
		'special_features',
		'last_update',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
