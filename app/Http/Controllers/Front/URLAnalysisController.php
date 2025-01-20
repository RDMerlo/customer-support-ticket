<?php

namespace App\Http\Controllers\Front;

use App\Domain\CategoryRecord\Models\CategoryRecord;
use App\Domain\ProcessingStatuses\Models\ProcessingStatuses;
use App\Domain\SupportTicketRecord\Models\SupportTicketRecord;
use App\Http\Controllers\Controller;
use App\Services\MailerService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class URLAnalysisController extends Controller
{
    public function submit(Request $request)
    {
//        dd($request->all());
        // Валидация данных формы
        $request->validate([
            'url' => 'required|string|max:255',
        ]);

        /// Отправка данных на внешний сайт
        $response = Http::get('http://dimsultan-website-2-sweb.ru/cgi-bin/url-phishing.py', [
            'quest_text' => $request->input('url'),
        ]);

        // Проверка успешности запроса
        if ($response->successful()) {
            $jsonResponse = $response->json();
            // Проверка наличия ключа 'category_record' в JSON
            if (isset($jsonResponse['slug_category_record'])) {
                return response()->json(['success' => true, 'slug_category_record' => $jsonResponse['slug_category_record'], 'message' => 'Форма успешно отправлена.']);
            } else {
                return response()->json(['success' => false, 'message' => 'Ключ slug_category_record отсутствует в JSON ответе.']);
            }
        } else {
            return response()->json(['success' => false, 'message' => 'Ошибка при отправке формы.']);
        }
    }
}
