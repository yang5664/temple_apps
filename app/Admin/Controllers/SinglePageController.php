<?php

namespace App\Admin\Controllers;

use App\Models\Admin\Database\Administrator;
use App\Models\SinglePage;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;

class SinglePageController extends BaseController
{
    use AdminController;
    private $header = [
        'news' => '最新消息',
        'festival' => '慶典',
        'introduce' => '宮廟介紹',
        'organization' => '組織圖',
        'events' => '大事記',
        'evolution' => '建廟沿革',
        'history' => '歷史緣由',
        'culture' => '特色文化',
        'building' => '建築藝術',
        'traffic' => '交通指南',
        'qa'       => '常見問題'
    ];
    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        if (\Admin::user()->isRole('administrator')) {
            parent::index();
            return Admin::content(function (Content $content) {
                $content->header($this->header[$this->seg3]);
                $content->description(trans('admin::lang.list'));
                $content->body($this->grid()->render());
            });
        } else {
            $data = SinglePage::where('type', $this->seg3)->where(function($filter){
                $filter->where('admin_user_id', '=', \Admin::user()->id) // 原始帳號
                ->orWhere('admin_user_id', '=', \Admin::user()->parent_id); // 附屬帳號
            });

            if ($data->first()){
                return $this->edit($data->first()->id);
            } else {
                return $this->create();
            }
        }
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
            $content->header($this->header[$this->seg3]);
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
            $content->header($this->header[$this->seg3]);
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

        return Admin::grid(SinglePage::class, function (Grid $grid) {
            $grid->owner()->name('宮廟');
            $grid->type('類別')->value(function($val){
                return $this->header[$val];
            });
            $grid->title('標題');
            $grid->publish_date('發布日期');
            $grid->model()->where('type', $this->seg3);
            $this->rowActions($grid);
            $this->batchDeleteButton($grid);
            $this->filterAdmin($grid);

            // 查詢條件
            $grid->filter(function($filter) {
                $filter->is('admin_user_id', '宮廟')->select(Administrator::select('id','name')->where('type','temple')->pluck('name', 'id'));;
                // 篩選
            });
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    public function form($status='')
    {
        return Admin::form(SinglePage::class, function (Form $form) use($status) {
            $date=date_create(date('Y/m/d H:i:s'));
            if (\Admin::user()->isRole('administrator'))
                $form->select('admin_user_id', '宮廟')->options(Administrator::select('id','name')->where('type','temple')->pluck('name', 'id'));
            else
                $form->hidden('admin_user_id', '')->default(\Admin::user()->id);
            $form->hidden('type', '類別')->default($this->seg3);
            $form->text('title', '標題')->rules('required');
            $form->editor('content', '內容')->rules('required');;
            $form->maskedfield('publish_date', '發佈日期', 'fa-clock-o')
              ->rules('required')
              ->default(($status === 'create' ? date_format($date,"Y/m/d H:i:s"): ""))
              ->format('9999/99/99 99:99:99');
            $form->saving(function (Form $form) {

            });
        });
    }
}
