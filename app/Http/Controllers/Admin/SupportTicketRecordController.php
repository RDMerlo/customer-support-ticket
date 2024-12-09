<?php

namespace App\Http\Controllers\Admin;

use App\Domain\SupportTicketRecord\Models\SupportTicketRecord;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class SupportTicketRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $supportTicketRecords = SupportTicketRecord::orderBy('created_at', 'desc')->get();
        return View::make("admin.support_ticket_record.index", [
            'supportTicketRecords' => $supportTicketRecords
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(SupportTicketRecord $support_ticket_record)
    {
        return View::make("admin.support_ticket_record.show", [
            'supportTicketRecord' => $support_ticket_record,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
