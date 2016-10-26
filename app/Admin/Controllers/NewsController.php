<?php

namespace App\Admin\Controllers;

use App\Models\News;
use App\Models\Admin\Database\Administrator;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;

class NewsController extends BaseController
{
    use AdminController;
    private $header = '最新動態';
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
            $content->body($this->form('edit')->edit($id));
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
            $content->body($this->form('create'));
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $data = ['news'=>'最新訊息','feature'=>'花絮','festival'=>'慶典'];
        return Admin::grid(News::class, function (Grid $grid) use($data) {
            $grid->type('類別')->value(function($val) use($data){
                return $data[$val];
            });
            $grid->title('標題');

            $grid->created_at(trans('admin::lang.created_at'));
            $grid->updated_at(trans('admin::lang.updated_at'));
            $this->rowActions($grid);
            $this->batchDeleteButton($grid);
            $this->filterAdmin($grid);
            // 查詢條件
            $grid->filter(function($filter)use($data){
                $filter->is('type', '類別')->select($data);;
                // 篩選
            });
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    public function form($status)
    {
        return Admin::form(News::class, function (Form $form) use($status) {
            $date=date_create(date('Y/m/d H:i:s'));
            if (\Admin::user()->isRole('administrator'))
                $form->select('admin_user_id', '宮廟')->options(Administrator::select('id','name')->where('type','temple')->pluck('name', 'id'));
            else
                $form->hidden('admin_user_id', '')->default(\Admin::user()->id);
            $form->select('type', '類別')->options(['news'=>'最新訊息','feature'=>'花絮','festival'=>'慶典'])->rules('required');
            $form->text('title', '標題')->rules('required');
            $form->editor('content', '內容');
            $form->maskedfield('publish_date', '發佈日期', 'fa-clock-o')
              ->rules('required')
              ->default(($status === 'create' ? date_format($date,"Y/m/d H:i:s"): ""))
              ->format('9999/99/99 99:99:99');

            $form->saving(function (Form $form) {

            });
        });
    }
}
