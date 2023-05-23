<?php

use webvimark\modules\UserManagement\UserManagementModule;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var webvimark\modules\UserManagement\models\forms\ChangeOwnPasswordForm $model
 */

$this->title = UserManagementModule::t('back', 'Change own password');
$this->params['breadcrumbs'][] = $this->title;
?>

   <section class="login-content">
         <div class="container">
            <div class="row align-items-center justify-content-center height-self-center">
               <div class="col-lg-8">
                  <div class="card auth-card">
                     <div class="card-body p-0">
                        <div class="d-flex align-items-center auth-content">
                           <div class="col-lg-7 align-self-center">
                              <div class="p-3">
                                 <h2 class="mb-2">User Change Password</h2>
                                 <p>Login to stay connected.</p>
								 <?php $form = ActiveForm::begin([
									'id'=>'user',
									'layout'=>'horizontal',
									'validateOnBlur'=>false,
								]); ?>
				
                                    <div class="row">
                                       <div class="col-lg-12">
                                          <div class="floating-label form-group">
										  <?= $form->field($model, 'current_password')->passwordInput(['maxlength' => 255, 'autocomplete'=>'off','placeholder'=>'Current Password']) ?>
                                          </div>
                                       </div>
                                       <div class="col-lg-12">
                                          <div class="floating-label form-group">
										  <?= $form->field($model, 'password')->passwordInput(['maxlength' => 255, 'autocomplete'=>'off','placeholder'=>'New Password']) ?>

                                          </div>
                                       </div>
									   <div class="col-lg-12">
                                          <div class="floating-label form-group">
										  <?= $form->field($model, 'repeat_password')->passwordInput(['maxlength' => 255, 'autocomplete'=>'off','placeholder'=>'Repeat New Password']) ?>

                                          </div>
                                       </div>
                                       <div class="col-lg-6">
									   <?= Html::checkbox('reveal-password', false, ['id' => 'reveal-password']) ?> <?= Html::label('Show password', 'reveal-password') ?>
                                 
                                       </div>
                                    </div>
									<?php
	$this->registerJs("jQuery('#reveal-password').change(function(){jQuery('#changeownpasswordform-password').attr('type',this.checked?'text':'password');})");
	$this->registerJs("jQuery('#reveal-password').change(function(){jQuery('#changeownpasswordform-repeat_password').attr('type',this.checked?'text':'password');})");
	$this->registerJs("jQuery('#reveal-password').change(function(){jQuery('#changeownpasswordform-current_password').attr('type',this.checked?'text':'password');})");
	
	?>
							<?= Html::submitButton(
						UserManagementModule::t('front', 'Login'),
						['class' => 'btn btn-lg btn-primary btn-block']
					) ?>
         
                                	<?php ActiveForm::end() ?>
                              </div>
                           </div>
                           <div class="col-lg-5 content-right">
                              <img src="/pos/images/01.png" class="img-fluid image-right" alt="">
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>