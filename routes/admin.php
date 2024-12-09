<?php

//use App\Http\Controllers\Admin\BestPracticController;
//use App\Http\Controllers\Admin\CalendarEventController;
//use App\Http\Controllers\Admin\CategoryKnowledgeBaseController;
//use App\Http\Controllers\Admin\CityController;
//use App\Http\Controllers\Admin\CountryController;
//use App\Http\Controllers\Admin\ExpertController;
//use App\Http\Controllers\Admin\FeedbackController;
//use App\Http\Controllers\Admin\KnowledgeBaseController;
//use App\Http\Controllers\Admin\LandingBlockController;
//use App\Http\Controllers\Admin\MapController;
//use App\Http\Controllers\Admin\PastEventController;
//use App\Http\Controllers\Admin\RedactorFileController;
//use App\Http\Controllers\Admin\RoleController;
//use App\Http\Controllers\Admin\SubscriberController;
use App\Http\Controllers\Admin\CategoryRecordController;
use App\Http\Controllers\Admin\IndexController;
//use App\Http\Controllers\Admin\TypeResearchController;
use App\Http\Controllers\Admin\ProcessingStatusesController;
use App\Http\Controllers\Admin\SupportTicketRecordController;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return redirect('/admin/home');
//});

//Route::get('/', function () {
//    return view('admin.main');
//});

Route::get('/', [IndexController::class, 'index'])->name('index');

Route::resource('category_record', CategoryRecordController::class);
Route::resource('processing_statuses', ProcessingStatusesController::class);
Route::resource('support_ticket_record', SupportTicketRecordController::class);


//Route::resource('best_practice', BestPracticController::class);
//Route::delete('best_practice/{best_practice}/delete-image', [BestPracticController::class, 'delete_image'])->name('best_practice.delete_image');
//
//Route::resource('calendar_event', CalendarEventController::class);
//Route::delete('calendar_event/{calendar_event}/delete-image', [CalendarEventController::class, 'delete_image'])->name('calendar_event.delete_image');
//
//
//Route::resource('category_knowledge_base', CategoryKnowledgeBaseController::class);
//Route::delete('category_knowledge_base/{category_knowledge_base}/delete-image', [CategoryKnowledgeBaseController::class, 'delete_image'])->name('category_knowledge_base.delete_image');
//
//
//Route::resource('expert', ExpertController::class);
//Route::delete('expert/{expert}/delete-image', [ExpertController::class, 'delete_image'])->name('expert.delete_image');
//
//Route::resource('type_research', TypeResearchController::class);
//
//Route::resource('knowledge_base', KnowledgeBaseController::class);
////                   knowledge_base/1/edit/delete-document
//Route::delete('knowledge_base/{knowledge_base}/delete-document', [KnowledgeBaseController::class, 'delete_document'])->name('knowledge_base.delete_document');;
//
//Route::resource('landing_block', LandingBlockController::class);
//Route::get('landing_block/edit-section/{slug}', [LandingBlockController::class, 'edit_section'])->name('landing_block.edit_section');
//Route::delete('landing_block/edit-section/{slug}/delete-image', [LandingBlockController::class, 'delete_image'])->name('landing_block.delete_image');
//Route::delete('landing_block/edit-section/{slug}/delete-document/{id}', [LandingBlockController::class, 'delete_document'])->name('landing_block.delete_document');
//Route::delete('landing_block/edit-section/{slug}/delete-contact/{id}', [LandingBlockController::class, 'delete_contact'])->name('landing_block.delete_contact');
//
//
//Route::resource('past_event', PastEventController::class);
//Route::delete('past_event/{past_event}/delete-image', [PastEventController::class, 'delete_image'])->name('past_event.delete_image');
//
//
//Route::resource('role', RoleController::class);
//
//Route::resource('subscriber', SubscriberController::class);
//Route::post('subscriber/export', [SubscriberController::class, 'exportSubscriber'])->name('subscriber.export');
//
//Route::resource('map', MapController::class);
//
//Route::resource('feedback', FeedbackController::class);


//Route::resource('program', ProgramController::class);
//Route::put('program/{program}/attach-speaker', [ProgramController::class, 'attachEventModerator'])->name('program.attachEventModerator');
//Route::get('program/{program}/add_event_program', [ProgramController::class, 'add_event_program'])->name('program.add_event_program');
//
//Route::put('program/{program}/attach-event-moderator', [ProgramController::class, 'attachSpeaker'])->name('program.attachSpeaker');
//Route::get('program/{program}/add_event_moderator_program', [ProgramController::class, 'add_event_moderator_program'])->name('program.add_event_moderator_program');

Route::post('ajax/image/upload', [RedactorFileController::class, 'upload'])->name('redactor.file.upload');
Route::post('ajax/image/delete', [RedactorFileController::class, 'delete'])->name('redactor.file.delete');
