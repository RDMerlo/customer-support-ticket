<section>
    <h2 class="section-title text-center">Заполнение формы обратной связи</h2>
    <div class="row">
        <form id="feedbackForm">
            <div class="mb-3">
                <label for="exampleInputFullName" class="form-label">ФИО</label>
                <input type="text" class="form-control" id="exampleInputFullName" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail" class="form-label">E-mail</label>
                <input type="email" class="form-control" id="exampleInputEmail" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputMessage" class="form-label">Сообщение</label>
                <textarea id="exampleInputMessage" name="exampleInputMessage" class="form-control" cols="30" rows="7" required></textarea>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                <label class="form-check-label" for="exampleCheck1">Согласие....</label>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-submit" style="margin-top: 5px">Отправить</button>
                <button id="btn_clear_form" type="button" class="btn btn-clear-form" style="margin-top: 5px; margin-left: 5px">Очистить форму</button>
            </div>
        </form>
    </div>
</section>
