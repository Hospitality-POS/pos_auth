<?php

/* @var $this \yii\web\View */
/* @var $content string */

use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use webvimark\modules\UserManagement\models\User;
use webvimark\modules\UserManagement\models\rbacDB\Role;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <script>
  (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    '../../../../../www.googletagmanager.com/gtm5445.html?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-WNGH9RL');window.tag_manager_event='dashboard-free-preview';window.tag_manager_product='Posdash';
    </script>
    <style>
  .dropdown-menu.notifications{
 height:500px;
 overflow: scroll;
 }
 .profile-card{
    z-index: 7;
 }
    </style>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>


<div class="wrapper">
   

           <div class="iq-top-navbar" style="left:0 !important; width: 100% !important">
          <div class="iq-navbar-custom">
              <nav class="navbar navbar-expand-lg navbar-light ">
                  <div class="iq-navbar-logo d-flex align-items-center justify-content-between">
                  <i class="fas fa-bars wrapper-menu"></i>
                      <a href="index.html" class="header-logo">
                          <img src="/pos/images/logo.png" class="img-fluid rounded-normal" alt="logo">
                          <h5 class="logo-title ml-3">POSDash</h5>
      
                      </a>
                  </div>
                  <div class="iq-search-bar device-search">
                   <h5 style="text-transform: uppercase;color:#000">WELCOME  <?=  Yii:: $app->getUser()->identity->username  ?></h5>
                  </div>
                  <div class="d-flex align-items-center">
                      <button class="navbar-toggler" type="button" data-toggle="collapse"
                          data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                          aria-label="Toggle navigation">
                          <i class="fas fa-thin fa-caret-down"></i>
                      </button>
                      <div class="collapse navbar-collapse" id="navbarSupportedContent">
                          <ul class="navbar-nav ml-auto navbar-list align-items-center">
                          
                         
                          
                            
                              <li class="nav-item nav-icon dropdown caption-content">
                                  <a href="#" class="search-toggle dropdown-toggle" id="dropdownMenuButton4"
                                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      <img src="/pos/images/1.png" class="img-fluid rounded" alt="user">
                                  </a>
                                  <div class="iq-sub-dropdown dropdown-menu profile-card" aria-labelledby="dropdownMenuButton">
                                      <div class="card shadow-none m-0">
                                          <div class="card-body p-0 text-center">
                                              <div class="media-body profile-detail text-center">
                                                  <img src="/pos/images/1.png"  alt="profile-bg"
                                                      class="rounded-top img-fluid mb-4">
                                                  <img src="/pos/images/1.png"  alt="profile-img"
                                                      class="rounded profile-img img-fluid avatar-70">
                                              </div>
                                              <div class="p-3">
                                                  <h5 class="mb-1"><?=  Yii:: $app->getUser()->identity->username  ?></h5>
                                                  <?php
                                                    $model= new \frontend\models\Reporting();
                                                    $todayDate =  date('Y-m-d');
                                                    $modelData=$model->find()->where(['user_id'=>Yii::$app->getUser()->identity->id])->andwhere(['status'=>0])->one();
                                                
                                                ?>
                                                  <div class="d-flex align-items-center justify-content-center mt-3">
                                                      <a href="<?= Yii::$app->urlManager->createUrl(['/user-management/auth/logout'])?>" class="btn border">Sign Out</a>
                                                      <div style="padding:2px" >
                                                      <?php if(!$modelData) {  ?>
                                                      <a href="<?= Yii::$app->urlManager->createUrl(['/site/clockin'])?>" class="btn btn-primary border">Clock In</a>
                                                      <?php } else { ?>
                                                      <a href="<?= Yii::$app->urlManager->createUrl(['/site/clockout'])?>" class="btn btn-danger border">Clock out</a>
                                                      <?php } ?>
                                                </div>
                                                    </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </li>
                          </ul>
                      </div>
                  </div>
              </nav>
          </div>
      </div>
      <div class="modal fade" id="new-order" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                  <div class="modal-body">
                      <div class="popup text-left">
                          <h4 class="mb-3">New Order</h4>
                          <div class="content create-workform bg-body">
                              <div class="pb-3">
                                  <label class="mb-2">Email</label>
                                  <input type="text" class="form-control" placeholder="Enter Name or Email">
                              </div>
                              <div class="col-lg-12 mt-4">
                                  <div class="d-flex flex-wrap align-items-ceter justify-content-center">
                                      <div class="btn btn-primary mr-4" data-dismiss="modal">Cancel</div>
                                      <div class="btn btn-outline-primary" data-dismiss="modal">Create</div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>  
      <div class="content-page" style="margin-left:0px !important">
     <div class="container-fluid">   
      <?= $content ?>
</div>
</div>
    </div>
      </div>
    </div>
    <!-- Wrapper End-->


<?php $this->endBody() ?>
</body>
</html>

<?php $this->endPage();
