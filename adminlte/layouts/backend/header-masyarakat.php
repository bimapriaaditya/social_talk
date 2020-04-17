<?php
use app\models\Masyarakat;
use app\models\User;
use yii\helpers\Html;

?>

<header class="main-header">
  <nav class="navbar navbar-static-top">
    <div class="container">
      <?= Html::a('' . Yii::$app->name . '</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <?= Html::img('@MasyarakatImgUrl/' . User::getImgMasyarakat(), ['class' => 'user-image']); ?>
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?= User::getNamaMasyarakat(); ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <?= Html::img('@MasyarakatImgUrl/' . User::getImgMasyarakat() , ['class' => 'img-circle']); ?>

                <p>
                  <?= User::getNamaMasyarakat(); ?>
                  <small>NIK.<?= User::getNIK();?></small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <?= Html::a('Profile', ['/masyarakat/view/', 'id' => Yii::$app->user->identity->id_masyarakat], ['class' => 'btn btn-default btn-flat']); ?>
                </div>
                <div class="pull-right">
                  <?php echo Html::beginForm(['/site/logout'], 'post');
                  echo Html::submitButton(
                    'Sign out',
                    ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                  );
                  Html::endForm()?>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
      <!-- /.navbar-custom-menu -->
    </div>
    <!-- /.container-fluid -->
  </nav>
</header>