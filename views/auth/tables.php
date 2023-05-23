<?php
/**
 * @var $this yii\web\View
 * @var $model webvimark\modules\UserManagement\models\forms\LoginForm
 */

use webvimark\modules\UserManagement\components\GhostHtml;
use webvimark\modules\UserManagement\UserManagementModule;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;
?>
<style>
.card:hover {
    background-color: bisque;
}
@media only screen and (max-width:  800px) {
.container{
   padding-top : 20px !important;
}
}

</style>
        <section>
         <?php
          $tablesModel = new \frontend\models\Tables();
          $tables =   $tablesModel->find()->all();

          ?>
         <div class="container">
            <div class="row align-items-center justify-content-center height-self-center">
              <?php foreach($tables as $table) { ?>
               <div class="col-lg-3 col-md-3">
               <a href="<?= Yii::$app->urlManager->createUrl(['/user-management/auth/select-table?id='.$table['id']])?>">
                  <div class="card text-center">
                     <div class="card-body">
                        <h4 class="card-title">TABLE <?= $table['table_number'] ?></h4>
                       
                     </div>
                  </div>
                
                    </a>
                    </div>
                    <?php } ?>
                     <!-- card end -->
                
     
  
</div>
         </div>
</section>

	