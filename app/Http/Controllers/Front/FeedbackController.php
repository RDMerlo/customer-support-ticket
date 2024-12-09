<?php

namespace App\Http\Controllers\Front;

use App\Domain\CategoryRecord\Models\CategoryRecord;
use App\Domain\ProcessingStatuses\Models\ProcessingStatuses;
use App\Domain\SupportTicketRecord\Models\SupportTicketRecord;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{

    public function submit(Request $request)
    {

//        dd($request->all());
        // Валидация данных формы
        $request->validate([
            'fullName' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
//            'agreement' => 'required|accepted',
        ]);

        /// Отправка данных на внешний сайт
        $response = Http::get('http://dimsultan-website-2-sweb.ru/cgi-bin/support-ticket.py', [
            'quest_text' => $request->input('message'),
        ]);

        // Проверка успешности запроса
        if ($response->successful()) {
            $jsonResponse = $response->json();

            // Проверка наличия ключа 'category_record' в JSON
            if (isset($jsonResponse['category_record'])) {
                $category_record = $jsonResponse['slug_category_record'];

                // Проверка существования значения в таблице 'category_records'
                $categoryRecordExists = CategoryRecord::where('slug', $category_record)->first();

                if ($categoryRecordExists) {

                    $processingStatus = ProcessingStatuses::where('slug', 'new')->first();

                    // Сохранение результата в базе данных
                    SupportTicketRecord::create([
                        'fullName' => $request->input('fullName'),
                        'email' => $request->input('email'),
                        'message' => $request->input('message'),
                        'category_record_id' => $categoryRecordExists->id,
                        'processing_statuses_id' => $processingStatus ? $processingStatus->id : 1,
                    ]);

                    return response()->json(['success' => true, 'message' => 'Форма успешно отправлена и сохранена.']);
                } else {
                    return response()->json(['success' => false, 'message' => 'Значение category_record не найдено в базе данных.']);
                }
            } else {
                return response()->json(['success' => false, 'message' => 'Ключ category_record отсутствует в JSON ответе.']);
            }
        } else {
            return response()->json(['success' => false, 'message' => 'Ошибка при отправке формы.']);
        }
    }
}
