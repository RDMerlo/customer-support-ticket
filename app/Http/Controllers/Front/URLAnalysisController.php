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
use Illuminate\Support\Facades\View;

class URLAnalysisController extends Controller
{
    public function index(){
//        return View::make("admin.category_record.index");
    }

    public function submit(Request $request)
    {
//        dd($request->all());

        // Валидация данных формы
        $request->validate([
            'urls' => 'required|string',
        ]);

        // Разделение строки URL-адресов на массив
        $urlsArray = explode("\n", $request->input('urls'));

        // Преобразование массива обратно в строку с разделителем `;`
        $urlsString = implode(';', $urlsArray);

        /// Отправка данных на внешний сайт
        $response = Http::get('http://dimsultan-website-2-sweb.ru/cgi-bin/url-phishing.py', [
            //'quest_text' => $request->input('url'),
            'urls' => $urlsString,
        ]);

        // Проверка успешности запроса
        if ($response->successful()) {
            $jsonResponse = $response->json();
            // Проверка наличия ключа 'results' в JSON
            if (isset($jsonResponse['results'])) {
                return response()->json(['success' => true, 'results' => $jsonResponse['results'], 'message' => 'Форма успешно отправлена.']);
            } else {
                return response()->json(['success' => false, 'message' => 'Ключ results отсутствует в JSON ответе.']);
            }
        } else {
            return response()->json(['success' => false, 'message' => 'Ошибка при отправке формы.']);
        }
    }
}
