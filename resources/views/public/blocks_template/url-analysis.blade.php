<section>
    <h2 class="section-title text-center">Заполнение формы</h2>
    <div class="row">
        <form id="urlAnalysisForm" method="post" enctype="multipart/form-data" action="{{ route('url_analysis.submit') }}">
            @csrf
            <div class="mb-3">
                <label for="exampleInputURL" class="form-label">URL-адреса (по одному на строку)</label>
                <textarea class="form-control" name="urls" id="exampleInputURL" rows="5" required></textarea>
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
            const urlAnalysisForm = document.getElementById('urlAnalysisForm');
            const csrfToken = document.getElementById('input_token').value;
            const submitButton = urlAnalysisForm.querySelector('button[type="submit"]');
            const btnClearForm = document.getElementById('btn_clear_form');
            const alertDiv = document.querySelector('.alert');

            urlAnalysisForm.addEventListener('submit', function(event) {
                event.preventDefault();

                // Блокировка кнопки отправки
                submitButton.disabled = true;
                btnClearForm.disabled = true;

                // Очистка блока от сообщений и классов
                alertDiv.classList.remove('alert-success', 'alert-danger');
                alertDiv.textContent = '';
                alertDiv.style.display = 'none';

                const formData = new FormData(urlAnalysisForm);
                formData.append('_token', csrfToken);

                fetch('{{ route('url_analysis.submit') }}', {
                    method: 'POST',
                    body: formData,
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    if (data.success) {
                        alertDiv.classList.add('alert-success');
                        alertDiv.textContent = 'Форма успешно отправлена.\nРезультаты:';
                        data.results.forEach(result => {
                            alertDiv.textContent += `\n${result.url}: ${result.slug_category_record};`;
                        });
                    } else {
                        alertDiv.classList.add('alert-danger');
                        alertDiv.textContent = 'Ошибка при отправке формы.';
                    }
                    alertDiv.style.display = 'block';
                    // setTimeout(() => {
                    //     alertDiv.style.display = 'none';
                    // }, 5000);
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
