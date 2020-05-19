<?php 

use app\models\User;
use dmstr\widgets\Menu;
use yii\helpers\Html;


?>

<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image" style="height: 50px;" >
                <?php 
                if(User::isMasyarakat()){
                    echo Html::img('@MasyarakatImgUrl/' . User::getImgMasyarakat() , ['class' => 'img-circle']);
                }else{
                    echo Html::img('@PetugasImgUrl/' . User::getImgPetugas() , ['class' => 'img-circle']);
                }
                ?>
            </div>
            <div class="pull-left info">
                <p>
                    <?php 
                    if (User::isMasyarakat()) {
                        echo Html::a(User::getNamaMasyarakat(),['/masyarakat/view/','id' => User::getIdMasyarakat()]);
                    }else{
                        echo Html::a(User::getNamaPetugas(),['/petugas/view/','id' => User::getIdPetugas()]);
                    }
                    ?>
                </p>
                <a href="#"><i class="fa fa-circle text-success"></i>
                    <?php
                    if (User::isMasyarakat()) {
                        echo "NIK." . User::getNik();
                    }else{
                        echo User::getBagian();
                    }
                    ?>
                </a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    [
                        'label' => 'Menu Social Talk', 
                        'icon' => 'dashboard',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Index Petugas', 'icon' => 'user-plus', 'url' => ['aduan/index'],],
                            ['label' => 'Index Masyarakat', 'icon' => 'user', 'url' => ['aduan/user-index'],],
                        ] 
                    ],
                    ['label' => 'Kategori Aduan', 'icon' => 'clone', 'url' => ['kategori/create']],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    [
                        'label' => 'Users',
                        'icon' => 'users',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Masyarakat', 'icon' => 'child', 'url' => ['masyarakat/index'],],
                            ['label' => 'Petugas', 'icon' => 'male', 'url' => ['petugas/index'],],
                            ['label' => 'Admin', 'icon' => 'key', 'url' => ['petugas/index'],],
                        ],
                    ],
                    [
                        'label' => 'Rekapitulasi', 'icon' => 'pie-chart', 'url' => ['aduan/rekapitulasi'],
                    ],
                ],
            ]
        ) ?>

    </section>

</aside>
