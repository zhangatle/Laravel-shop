<?php

namespace App\Admin\Controllers;

use App\Models\User;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class UsersController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '用户';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new User);

        $grid->column('id', 'ID');
        $grid->column('name', '用户名');
        $grid->column('email', '邮箱');
        $grid->column('email_verified_at','已验证邮箱')->display(function ($value){
            return $value ? '是' : '否';
        });
        $grid->column('created_at', '注册时间');
        $grid->disableCreateButton();
        $grid->disableActions();
        $grid->tools(function ($tools){
            $tools->batch(function ($batch){
                $batch->disableDelete();
            });
        });

        return $grid;
    }
}
