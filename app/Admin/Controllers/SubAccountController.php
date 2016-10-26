<?php

namespace App\Admin\Controllers;

use App\Models\Admin\Database\Administrator;
use App\Models\Admin\Database\Role;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;

class SubAccountController extends BaseController
{
    use AdminController;
    private $header = "臨時帳號";
    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        parent::index();
//        var_dump(\App\Models\Admin\Database\Administrator::find(3)->parent->name);
        return Admin::content(function (Content $content) {
            $content->header($this->header);
            $content->description(trans('admin::lang.list'));
            $content->body($this->grid()->render());
        });
    }

    /**
     * Edit interface.
     *
     * @param $id
     *
     * @return Content
     */
    public function edit($id)
    {
        parent::edit($id);
        return Admin::content(function (Content $content) use ($id) {
            $content->header($this->header);
            $content->description(trans('admin::lang.edit'));
            $content->body($this->form()->edit($id));
        });
    }

    /**
     * Create interface.
     *
     * @return Content
     */
    public function create()
    {
        parent::create();
        return Admin::content(function (Content $content) {
            $content->header($this->header);
            $content->description(trans('admin::lang.create'));
            $content->body($this->form());
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(Administrator::class, function (Grid $grid) {
            if (\Admin::user()->isRole('administrator'))
                $grid->parent()->name('宮廟');
            $grid->username(trans('admin::lang.username'));
            $grid->name(trans('admin::lang.name'));

            $grid->created_at(trans('admin::lang.created_at'));
            $grid->updated_at(trans('admin::lang.updated_at'));
            $this->rowActions($grid);
            $this->batchDeleteButton($grid);
            // 篩選
            if (!\Admin::user()->isRole('administrator'))
                $grid->model()->where('type','=', 'other')->where('parent_id', '=', Admin::user()->id);
            else {
                $grid->model()->where('type','=', 'other');
                $grid->filter(function($filter){
                    // sql: ... WHERE `user.email` = $email;
                    $filter->is('parent_id', '宮廟')->select(Administrator::select('id','name')->where('type','temple')->pluck('name', 'id'));

                });
            }
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    public function form()
    {
        return Admin::form(Administrator::class, function (Form $form) {
            $form->hidden('type','type')->value('other'); // #臨時帳號
            if (\Admin::user()->isRole('administrator'))
                $form->select('parent_id', '宮廟')->options(Administrator::select('id','name')->where('type','temple')->pluck('name', 'id'));
            else
                $form->hidden('parent_id', '')->default(\Admin::user()->id);
            $form->text('username', trans('admin::lang.username'))->rules("required|unique:admin_users,username,@key_id");
            $form->text('name', trans('admin::lang.name'))->rules('required');
            $form->password('password', trans('admin::lang.password'))->rules('required');

            $form->multipleSelect('roles', trans('admin::lang.roles'))->options(Role::select('id','name')->where('id',3)->pluck('name', 'id'))->rules('required');
            $form->display('created_at', trans('admin::lang.created_at'));
            $form->display('updated_at', trans('admin::lang.updated_at'));

            $form->saving(function (Form $form) {
                if ($form->password && $form->model()->password != $form->password) {
                    $form->password = bcrypt($form->password);
                }
            });
        });
    }
}
