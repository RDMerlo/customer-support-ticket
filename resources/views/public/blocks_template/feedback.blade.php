<section>
    <h2 class="section-title text-center">Заполнение формы обратной связи</h2>
    <div class="row">
        <form id="feedbackForm" method="post" enctype="multipart/form-data" action="{{ route('feedback.submit') }}">
            @csrf
            <div class="mb-3">
                <label for="exampleInputFullName" class="form-label">ФИО</label>
                <input type="text" class="form-control" name="fullName" id="exampleInputFullName" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail" class="form-label">E-mail</label>
                <input type="email" class="form-control" name="email" id="exampleInputEmail" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputMessage" class="form-label">Сообщение</label>
                <textarea id="exampleInputMessage" name="message" class="form-control" cols="30" rows="7" required></textarea>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                <label class="form-check-label" for="exampleCheck1">Согласие....</label>
            </div>
            <div class="alert" role="alert" style="display: none;"></div>
            <div class="text-center">
                <button type="submit" class="btn btn-submit" style="margin-top: 5px">Отправить</button>
                <button id="btn_clear_form" type="button" class="btn btn-clear-form" style="margin-top: 5px; margin-left: 5px">Очистить форму</button>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const feedbackForm = document.getElementById('feedbackForm');
            const csrfToken = document.getElementById('input_token').value;
            const submitButton = feedbackForm.querySelector('button[type="submit"]');
            const btnClearForm = document.getElementById('btn_clear_form');
            const alertDiv = document.querySelector('.alert');

            feedbackForm.addEventListener('submit', function(event) {
                event.preventDefault();

                // Блокировка кнопки отправки
                submitButton.disabled = true;
                btnClearForm.disabled = true;

                // Очистка блока от сообщений и классов
                alertDiv.classList.remove('alert-success', 'alert-danger');
                alertDiv.textContent = '';
                alertDiv.style.display = 'none';

                const formData = new FormData(feedbackForm);
                formData.append('_token', csrfToken);

                fetch('{{ route('feedback.submit') }}', {
                    method: 'POST',
                    body: formData,
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alertDiv.classList.add('alert-success');
                        alertDiv.textContent = 'Форма успешно отправлена и сохранена.';
                    } else {
                        alertDiv.classList.add('alert-danger');
                        alertDiv.textContent = 'Ошибка при отправке формы.';
                    }
                    alertDiv.style.display = 'block';
                    setTimeout(() => {
                        alertDiv.style.display = 'none';
                    }, 5000);
                })
                .catch(error => {
                    console.error('Ошибка:', error);
                    alertDiv.classList.add('alert-danger');
                    alertDiv.textContent = 'Произошла ошибка при отправке формы.';
                    alertDiv.style.display = 'block';
                    setTimeout(() => {
                        alertDiv.style.display = 'none';
                    }, 5000);
                })
                .finally(() => {
                    // Разблокировка кнопки отправки после завершения запроса
                    submitButton.disabled = false;
                    btnClearForm.disabled = false;
                });
            });
        });
    </script>
</section>
