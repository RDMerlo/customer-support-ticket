<?php

namespace App\Http\Controllers\Admin;

use App\Domain\ProcessingStatuses\Actions\CreateProcessingStatusesAction;
use App\Domain\ProcessingStatuses\Actions\UpdateProcessingStatusesAction;
use App\Domain\ProcessingStatuses\DataTransferObjects\CreateProcessingStatusesData;
use App\Domain\ProcessingStatuses\DataTransferObjects\UpdateProcessingStatusesData;
use App\Domain\ProcessingStatuses\Models\ProcessingStatuses;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class ProcessingStatusesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $processingStatuses = ProcessingStatuses::all();
        return View::make("admin.processing_statuses.index", [
            'processingStatuses' => $processingStatuses
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
    public function store(CreateProcessingStatusesAction $action, CreateProcessingStatusesData $data)
    {
        $action->execute(Auth::user(), $data);

        return redirect()
            ->route('admin.processing_statuses.index')
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
    public function edit(ProcessingStatuses $processing_status)
    {
        return View::make("admin.processing_statuses.form", compact('processing_status'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProcessingStatusesAction $action, UpdateProcessingStatusesData $data, ProcessingStatuses $processing_status)
    {
        $action->execute($processing_status, $data);

        return redirect()
            ->route('admin.processing_statuses.index')
            ->with('success', trans('message.admin.default.create.success'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProcessingStatuses $processing_status)
    {
        $processing_status->delete();

        return redirect()
            ->route('admin.processing_statuses.index')
            ->with('success', trans('message.admin.default.delete.success'));
    }
}
