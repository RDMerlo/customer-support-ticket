<?php
namespace App\Services;

use Exception;
use http\Env\Request;
use PHPMailer\PHPMailer\PHPMailer;

class MailerService {


    protected $mail;

    public function __construct(string $from_email = '', string $from_name = '')
    {
        $this->mail = new PHPMailer(true);
        $this->mail->isSMTP(); // Отправка через SMTP

        $this->mail->Host   = env('SMTP_HOST');  // Адрес SMTP сервера
        $this->mail->SMTPAuth   = true;          // Enable SMTP authentication
        $this->mail->Username   = env('SMTP_USER');       // ваше имя пользователя (без домена и @)
        $this->mail->Password   = env('SMTP_PASSWORD');    // ваш пароль
        $this->mail->SMTPSecure = env('SMTP_SECURE');        // шифрование ssl
        $this->mail->Port   = env('SMTP_PORT');               // порт подключения

        if (!isset($from_email) || $from_email == ''){
            $from_email = env('SMTP_FROM_EMAIL');
        }

        if (!isset($from_name) || $from_name == ''){
            $from_name = env('SMTP_FROM_NAME');
        }

        $this->mail->setFrom($from_email, $from_name);    // от кого

        // Установка кодировки сообщения и заголовков в UTF-8
        $this->mail->CharSet = 'utf-8';

        $smtpOnOptions = env('SMTP_ON_OPTIONS', false); // Получаем значение из.env файла, если не установлено - false

        if ($smtpOnOptions) {
            $this->mail->SMTPOptions = array(
                'ssl' => array(
//                    'verify_peer' => false,
                    'verify_peer_name' => false,
//                    'allow_self_signed' => true
                )
            );
        }
    }

    public function send(string $to_address, string $subject, string $message)
    {
        $msgResult = [
            'output' => false,
            'message' => "",
            'code' => "",
        ];

        try {
            // кому
            if (is_array($to_address)) {
                foreach ($to_address as $recipient) {
                    $this->mail->addAddress($recipient);
                }
            } else {
                $this->mail->addAddress($to_address);
            }

            $this->mail->Subject = $subject;

            $this->mail->isHTML(true);

            // Убедитесь, что ваше HTML-сообщение начинается с метатега charset=UTF-8
            $message = '<html><head><meta charset="UTF-8"></head><body>'. $message. '</body></html>';

            $this->mail->msgHTML($message);

            // Отправляем
            if ($this->mail->send()) {
                $msgResult['output'] = true;
                $msgResult['message'] = "Сообщение успешно отправлено.";
                return $msgResult;
            } else {
                $msgResult['output'] = false;
                $msgResult['message'] = "Не удалось отправить сообщение.";
                return $msgResult;
            }
        } catch (Exception $e) {
            $msgResult['output'] = false;
            $msgResult['code'] = $e->getCode();
            $msgResult['message'] = 'Ошибка: ' .  $e->getMessage();
            return $msgResult;
        }
    }

    public function addFiles($attachments = []){
        // Добавление файлов в виде вложений
        if (!empty($attachments)) {
            foreach ($attachments as $attachment) {
                $this->mail->addAttachment($attachment); // Путь к файлу
            }
        }
    }
}
