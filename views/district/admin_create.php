<?php
/**
 * Core Zone Districts (core-zone-district)
 * @var $this yii\web\View
 * @var $this ommu\core\controllers\DistrictController
 * @var $model ommu\core\models\CoreZoneDistrict
 * @var $form yii\widgets\ActiveForm
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @contact (+62)856-299-4114
 * @copyright Copyright (c) 2017 OMMU (www.ommu.co)
 * @created date 15 September 2017, 10:26 WIB
 * @modified date 24 April 2018, 23:00 WIB
 * @link https://github.com/ommu/mod-core
 *
 */

use yii\helpers\Html;
use yii\helpers\Url;

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Districts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'Create');

$this->params['menu']['content'] = [
	['label' => Yii::t('app', 'Back To Locale Settings'), 'url' => Url::to(['country/index']), 'icon' => 'table'],
	['label' => Yii::t('app', 'Back To Districts'), 'url' => Url::to(['index']), 'icon' => 'table'],
];
?>

<?php echo $this->render('_form', [
	'model' => $model,
]); ?>