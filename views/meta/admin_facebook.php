<?php
/**
 * Core Metas (core-meta)
 * @var $this yii\web\View
 * @var $this ommu\core\controllers\MetaController
 * @var $model ommu\core\models\CoreMeta
 * @var $form yii\widgets\ActiveForm
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @contact (+62)856-299-4114
 * @copyright Copyright (c) 2018 OMMU (www.ommu.co)
 * @created date 24 April 2018, 14:11 WIB
 * @link https://github.com/ommu/mod-core
 *
 */

use yii\helpers\Html;
use yii\helpers\Url;
use app\components\ActiveForm;

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Metas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$this->params['menu']['content'] = [
	['label' => Yii::t('app', 'Global Meta'), 'url' => Url::to(['update']), 'icon' => 'pencil'],
	['label' => Yii::t('app', 'Address'), 'url' => Url::to(['address']), 'icon' => 'pencil'],
	['label' => Yii::t('app', 'Google Owner Meta'), 'url' => Url::to(['google']), 'icon' => 'pencil'],
	['label' => Yii::t('app', 'Twitter Meta'), 'url' => Url::to(['twitter']), 'icon' => 'pencil'],
	['label' => Yii::t('app', 'Facebook Meta'), 'url' => Url::to(['facebook']), 'icon' => 'pencil'],
];

$js = <<<JS
	$('.field-facebook_type select[name="facebook_type"]').on('change', function() {
		var id = $(this).val();
		$('div.filter').slideUp();
		if(id == '1') {
			$('div.filter#profile').slideDown();
		}
	});
JS;
	$this->registerJs($js, \yii\web\View::POS_READY);
?>

<?php $form = ActiveForm::begin([
	'enableClientValidation' => false,
	'enableAjaxValidation' => false,
	//'enableClientScript' => true,
]); ?>

<?php //echo $form->errorSummary($model);?>

<?php 
$setting = [
	1 => Yii::t('app', 'Enable'),
	0 => Yii::t('app', 'Disable'),
];
echo $form->field($model, 'facebook_on', ['template' => '{label}<div class="col-md-9 col-sm-9 col-xs-12">{input}{error}</div>'])
	->radioList($setting, ['class'=>'desc', 'separator' => '<br />'])
	->label($model->getAttributeLabel('facebook_on'), ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']); ?>

<?php 
$facebook_type = [
	1 => Yii::t('app', 'Profile'),
	2 => Yii::t('app', 'Website'),
];
if($model->isNewRecord && !$model->getErrors())
	$model->facebook_type = 2;
echo $form->field($model, 'facebook_type', ['template' => '{label}<div class="col-md-9 col-sm-9 col-xs-12">{input}{error}</div>'])
	->dropDownList($facebook_type)
	->label($model->getAttributeLabel('facebook_type'), ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']); ?>

<div id="profile" class="filter mb-10" <?php echo $model->facebook_type != 1 ? 'style="display: none;"' : '';?>>
	<?php echo $form->field($model, 'facebook_profile_firstname', ['template' => '{label}<div class="col-md-9 col-sm-9 col-xs-12">{input}{error}<span class="small-px">'.Yii::t('app', 'The first name of the person that this profile represents').'</span></div>'])
		->textInput(['maxlength' => true])
		->label($model->getAttributeLabel('facebook_profile_firstname'), ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']); ?>

	<?php echo $form->field($model, 'facebook_profile_lastname', ['template' => '{label}<div class="col-md-9 col-sm-9 col-xs-12">{input}{error}<span class="small-px">'.Yii::t('app', 'The last name of the person that this profile represents').'</span></div>'])
		->textInput(['maxlength' => true])
		->label($model->getAttributeLabel('facebook_profile_lastname'), ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']); ?>

	<?php echo $form->field($model, 'facebook_profile_username', ['template' => '{label}<div class="col-md-9 col-sm-9 col-xs-12">{input}{error}<span class="small-px">'.Yii::t('app', 'A username for the person that this profile represents (.i.e. "PutraSudaryanto")').'</span></div>'])
		->textInput(['maxlength' => true])
		->label($model->getAttributeLabel('facebook_profile_username'), ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']); ?>
</div>

<?php echo $form->field($model, 'facebook_sitename', ['template' => '{label}<div class="col-md-9 col-sm-9 col-xs-12">{input}{error}<span class="small-px">'.Yii::t('app', 'The name of the web site upon which the object resides (.i.e. "Ommu Platform, Sudaryanto.ID")').'</span></div>'])
	->textInput(['maxlength' => true])
	->label($model->getAttributeLabel('facebook_sitename'), ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']); ?>

<?php echo $form->field($model, 'facebook_see_also', ['template' => '{label}<div class="col-md-9 col-sm-9 col-xs-12">{input}{error}<span class="small-px">'.Yii::t('app', 'URLs of related resources (.i.e. "http://www.ommu.co")').'</span></div>'])
	->textInput(['maxlength' => true])
	->label($model->getAttributeLabel('facebook_see_also'), ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']); ?>

<?php echo $form->field($model, 'facebook_admins', ['template' => '{label}<div class="col-md-9 col-sm-9 col-xs-12">{input}{error}<span class="small-px">'.Yii::t('app', 'Facebook IDs of the app\'s administrators (.i.e. "PutraSudaryanto")').'</span></div>'])
	->textInput(['maxlength' => true])
	->label($model->getAttributeLabel('facebook_admins'), ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']); ?>

<div class="ln_solid"></div>
<div class="form-group">
	<div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
		<?php echo Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']); ?>
	</div>
</div>

<?php ActiveForm::end(); ?>