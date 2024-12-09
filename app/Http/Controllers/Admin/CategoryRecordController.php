<?php

namespace App\Http\Controllers\Admin;

use App\Domain\CategoryRecord\Actions\CreateCategoryRecordAction;
use App\Domain\CategoryRecord\Actions\UpdateCategoryRecordAction;
use App\Domain\CategoryRecord\DataTransferObjects\CreateCategoryRecordData;
use App\Domain\CategoryRecord\DataTransferObjects\UpdateCategoryRecordData;
use App\Domain\CategoryRecord\Models\CategoryRecord;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class CategoryRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categoryRecords = CategoryRecord::all();
        return View::make("admin.category_record.index", [
            'categoryRecords' => $categoryRecords
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateCategoryRecordAction $action, CreateCategoryRecordData $data)
    {
        $action->execute(Auth::user(), $data);

        return redirect()
            ->route('admin.category_record.index')
            ->with('success', trans('message.admin.default.create.success'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CategoryRecord $category_record)
    {
        return View::make('admin.category_record.form', compact('category_record'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRecordAction $action, UpdateCategoryRecordData $data, CategoryRecord $category_record)
    {
        $action->execute($category_record, $data);

        return redirect()
            ->route('admin.category_record.index')
            ->with('success', trans('message.admin.default.create.success'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CategoryRecord $category_record)
    {
        $category_record->delete();

        return redirect()
            ->route('admin.category_record.index')
            ->with('success', trans('message.admin.default.delete.success'));
    }
}
