<?php

namespace App\Admin\Controllers;

use App\Models\Product;
use App\Models\Admin\Database\Administrator;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\NestedForm;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;

class ProductController extends BaseController
{
    use AdminController;
    private $header = '商品上架';
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
        return Admin::grid(Product::class, function (Grid $grid) {
            $grid->id('ID')->sortable();
            $grid->name('品名');
            $grid->start_at('銷售日');
            $grid->end_at('結束日');
//            $grid->created_at(trans('admin::lang.created_at'));
//            $grid->updated_at(trans('admin::lang.updated_at'));
            $this->rowActions($grid);
            $this->batchDeleteButton($grid);
            $this->filterAdmin($grid);
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    public function form()
    {
        return Admin::form(Product::class,
          function (Form $form) {
            if (\Admin::user()->isRole('administrator'))
              $form->select('admin_user_id', '宮廟')->options(Administrator::select('id','name')->where('type','temple')->pluck('name', 'id'));
            else
              $form->hidden('admin_user_id', '')->default(\Admin::user()->id);

            $form->text('name', '品名')->rules('required');
            $form->datetimeRange('start_at', 'end_at', '銷售日');
            $form->hasManyForm('detail', function (NestedForm $sub){
                $sub->setHeader('商品明細');
                $sub->hidden('id', 'ID');
                $sub->hidden('image', 'image');
                $sub->hidden('memo2', 'memo2');
                $sub->text('name', '品名');
                $sub->text('memo', '備註');
                $sub->currency('price', '價格');
                $sub->number('qty', '可售數量');
                $sub->editor('spec', '說明');
            });
        });
    }
}
