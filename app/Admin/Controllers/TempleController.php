<?php

namespace App\Admin\Controllers;

use App\Models\Admin\Database\Administrator;
use App\Models\Admin\Database\Role;
use App\Models\Admin\Database\Menu;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;

class TempleController extends BaseController
{
    use AdminController;
    private $header = "宮廟帳號";
    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        parent::index();
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
            $grid->id('ID')->sortable();
            $grid->username(trans('admin::lang.username'));
            $grid->name(trans('admin::lang.name'));
            $grid->api_token('API Token');
            $grid->created_at(trans('admin::lang.created_at'));
            $grid->updated_at(trans('admin::lang.updated_at'));
            $this->rowActions($grid);
            $this->batchDeleteButton($grid);
            $grid->model()->where('type','=', 'temple');
//            $grid->filter(function($filter){
//                // sql: ... WHERE `user.email` = $email;
//                $filter->is('temple_id', '發送端')->select(Temple::all()->pluck('temple_name', 'temple_id'));
//
//            });
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
            $form->display('id', 'ID');
            $form->hidden('type','type')->value('temple');
            $form->text('username', trans('admin::lang.username'))->rules("required|unique:admin_users,username,@key_id");
            $form->text('name', trans('admin::lang.name'))->rules('required');
            $form->password('password', trans('admin::lang.password'))->rules('required');
            $form->multipleSelect('menus', '可選功能')->options(Menu::select('id','title')->where('type',1)->where('parent_id','<>',0)->pluck('title', 'id'))->rules('required');
            $form->multipleSelect('roles', trans('admin::lang.roles'))->options(Role::select('id','name')->where('id',2)->pluck('name', 'id'))->rules('required');
            $form->hidden('api_token', 'API TOKEN');
            $form->saving(function (Form $form) {
                if ($form->password && $form->model()->password != $form->password) {
                    $form->password = bcrypt($form->password);
                }

                if (empty($form->api_token) && empty($form->model()->api_token)) {
                    $form->api_token = str_random(60);
                }
            });
        });
    }
}
