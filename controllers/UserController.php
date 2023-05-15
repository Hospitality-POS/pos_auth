<?php

namespace webvimark\modules\UserManagement\controllers;

use webvimark\components\AdminDefaultController;
use Yii;
use webvimark\modules\UserManagement\models\User;
use webvimark\modules\UserManagement\models\search\UserSearch;
use yii\web\NotFoundHttpException;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends AdminDefaultController
{
public function behaviors()
{
    return [
        'access' => [
            'class' => \yii\filters\AccessControl::className(),
            'only' => ['*'],
            'rules' => [                
                // allow authenticated users
                [
                    'allow' => true,
                    'roles' => ['@'],
                ],
                // everything else is denied
            ],
        ],
    ];
}
	/**
	 * @var User
	 */
	public $modelClass = 'webvimark\modules\UserManagement\models\User';

	/**
	 * @var UserSearch
	 */
	public $modelSearchClass = 'webvimark\modules\UserManagement\models\search\UserSearch';

	/**
	 * @return mixed|string|\yii\web\Response
	 */
	public function actionCreate()
	{
		$model = new User(['scenario'=>'newUser']);

		if ( $model->load(Yii::$app->request->post()))
		{
			$post = Yii::$app->request->post();
			$password= Yii::$app->security->generateRandomString(8);
            $model->password_hash= Yii::$app->getSecurity()->generatePasswordHash($password);
			$model->bind_to_ip='';
			$model->branch =1;
			$model->fullnames=$post["User"]["fullnames"];
			$model->phone_number=$post["User"]["phone_number"];
			$model->superadmin=$post["User"]["superadmin"];
			$model->docket=1;
			$model->employeeid =1;
			$model->profilepic='empty';
			$model->save(false);
			$user= new \frontend\models\User();
			$user->sendEmailSignUp($model->email,$model->username,$password);
			Yii::$app->session->setFlash('success', 'User Created Successfully.');
			return $this->redirect(['view',	'id' => $model->id]);
		}
          
		return $this->renderIsAjax('create', compact('model'));
	}

	/**
	 * @param int $id User ID
	 *
	 * @throws \yii\web\NotFoundHttpException
	 * @return string
	 */
	public function actionChangePassword($id)
	{
		$model = User::findOne($id);

		if ( !$model )
		{
			throw new NotFoundHttpException('User not found');
		}

		$model->scenario = 'changePassword';

		if ( $model->load(Yii::$app->request->post()) && $model->save() )
		{
			return $this->redirect(['view',	'id' => $model->id]);
		}

		return $this->renderIsAjax('changePassword', compact('model'));
	}

}
