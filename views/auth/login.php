<?php
/**
 * @var $this yii\web\View
 * @var $model webvimark\modules\UserManagement\models\forms\LoginForm
 */

use webvimark\modules\UserManagement\components\GhostHtml;
use webvimark\modules\UserManagement\UserManagementModule;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
?>
<style>
         *, *:after, *:before {
         box-sizing: border-box;
         padding: 0;
         margin: 0;
         font-family: sans-serif;
         }
         body {
         min-height: 100vh;
         background-color: #fff;
         }
         .grid {
         display: grid;
         grid-template-columns: 1fr 1fr;
         height: 100vh;
         }
         .order__right {
         order: 1;
      
         }
         .order__left {
         order: 2;
         padding:  40px;
         }
         .centered {
         display: flex;
         align-items: center;
         justify-content: center;
         }
         .no__overflow {
         display: flex;
         align-items: center;
         overflow: hidden;
         }
         .form {
         max-width: 500px;
         }
         .logo {
         margin-bottom: 12px;
         }
         h4 {
         color: #867992;
         text-align: left;
         margin-bottom: 30px;
         letter-spacing: 0.2px;
         line-height: 20px;
         }
         input[type=text], input[type=password] {
         width: 100%;
         padding: 12px 16px;
         margin: 16px 0;
         display: block;
         border: 1px solid #c8c3cf;
         border-radius: 4px;
         box-sizing: border-box;
         background-color: #F6F5F7;
         font-size: 16px;
         color: #4F4659;
         outline: none;
         transition: box-shadow 0.25s ease-in-out,  background-image 0.25s;
         }
         input[type=text]:focus, input[type=password]:focus {
         border-color: #A26ED4;
         background: #FAF8FD;
         background: #FDFCFE;
         box-shadow: 0 0 0 0.25rem #ebd6ff;
         }
         ::-webkit-input-placeholder {
         color: #A29CA8;
         }
         :-ms-input-placeholder {
         color: #A29CA8;
         } ::placeholder {
         color: #A29CA8;
         }
         .justify__space_between {
         display: flex;
         align-items: center;
         justify-content: space-between;
         margin: 30px 0 26px 0;
         }
         input[type=checkbox], label {
         margin-right: 4px;
         cursor: pointer;
         outline-color: #B595D4;
         }
         .remember_me, .signup {
         color: #867992;
         }
         .forgot__password {
         color: #551A8B;
         text-align: left;
         outline-color: #B595D4;
         }
         .forgot__password:active {
         color: #867992;
         }
         .login__button {
         outline-color: #734E96;
         width: 100%;
         border: none;
         background-color: #A26ED4;
         padding: 13px 17px;
         color: #fff;
         border-radius: 0.25rem;
         font-size: 16px;
         cursor: pointer;
         transition: box-shadow 0.25s ease-in-out, background-color 0.3s;
         }
         .login__button:hover {
         box-shadow: 0 0 0 0.25rem #DAC5EE;
         }
         .login__button:active {
         background-color: #874DBF;
         box-shadow: 0 0 0 0.35rem #DAC5EE;
         }
         .signup {
         font-size: 14px;
         text-align: center;
         margin-top: 32px;
         }
         .img {
         height: 100%;
         object-fit: cover;
         max-width: auto;
         }
         @media only screen and (max-width:  800px) {
         .grid {
         grid-template-columns: auto;
         }
         .order__left {
         order: 2;
         padding: 20px;
         }
         .order__right {
         order: 1;
         }
         .centered {
         align-items: center;
         }      
         .no__overflow {
         align-items: flex-start;
         display:none
         }
         h4 {
         text-align: center;
         }
         .img {
         width: 100vw;
         }
         }
         @media only screen and (max-height:  600px) {
         .img {
         width: 120%;
         }
         }

</style>
        <div class="grid">
         <div class="order__left centered">
            <div class="form">
               <div class="logo">
               <h2 class="mb-2">User Authorization</h2>
               <p>Login to stay connected.</p>
               </div>


               <?php $form = ActiveForm::begin([
						'id'      => 'login-form',
						'options'=>['autocomplete'=>'off'],
						'validateOnBlur'=>false,
						'fieldConfig' => [
							'template'=>"{input}\n{error}",
						],
					]) ?>
                                    <div class="row">
                                     
                                       <div class="col-lg-12">
                                          <div class="floating-label form-group">
										  <?= $form->field($model, 'password')
						->passwordInput(['placeholder'=>$model->getAttributeLabel('password'), 'autocomplete'=>'off']) ?>
                   <?php if( Yii::$app->session->hasFlash('error')) { ?>
                  <p style="color:red">Invalid password confirm your password and try again</p>
                  <?php } ?>
                                          </div>
                                       </div>
                                    
                                       <div class="col-lg-6">
									   <?= Html::checkbox('reveal-password', false, ['id' => 'reveal-password']) ?> <?= Html::label('Show password', 'reveal-password') ?>
                                 
                                       </div>
                                    </div>
									<?= Html::submitButton(
						UserManagementModule::t('front', 'Login'),
						['class' => 'btn btn-lg btn-primary btn-block']
					) ?>
            <?php
	$this->registerJs("jQuery('#reveal-password').change(function(){jQuery('#loginform-password').attr('type',this.checked?'text':'password');})");
	?>
                                	<?php ActiveForm::end() ?>

            </div>
         </div><!-- order__left centered -->
         
         <div class="order__right centered no__overflow">
            <img class="img" src="/pos/images/bigsmoke.jpeg" alt="picture">
         </div><!-- order__right centered no__overflow -->

      </div><!-- end grid -->