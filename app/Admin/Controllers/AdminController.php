<?php

namespace App\Admin\Controllers;

use Illuminate\Support\Facades\Auth;

trait AdminController
{
    public function show($id)
    {
        return $this->edit($id);
    }

    public function update($id, $status='')
    {
        return $this->form($status)->update($id);
    }

    public function destroy($id, $statue='')
    {
        if ($this->form($statue)->destroy($id)) {
            return response()->json(['msg' => 'delete success!']);
        }
    }

    public function store($status='')
    {
        return $this->form($status)->store();
    }

    public function rowActions($grid){
        $grid->rows(function($row){
            if (\Admin::user()->isRole('administrator')) return;
            $delete = \Admin::user()->can('delete')?"delete":"";
            $edit = \Admin::user()->can('update')?"edit":"";
            $row->actions("$edit|$delete");
        });
    }

    public function batchDeleteButton($grid){
        if (!Auth::guard('admin')->user()->isRole('administrator'))
            Auth::guard('admin')->user()->can('batch-delete') ? $grid->allowBatchDeletion() : $grid->disableBatchDeletion();
    }

    public function filterAdmin($grid){
        if (!\Admin::user()->isRole('administrator'))
            $grid->model()->where(function($query){
                $query->where('admin_user_id', '=', \Admin::user()->id) // 原始帳號
                ->orWhere('admin_user_id', '=', \Admin::user()->parent_id); // 附屬帳號
            });
    }
}