/**
 * Работа с згрузкой документов
 */
jQuery(document).ready(function () {

    let iItemDocument = 0;

    function addDocument() {
        var container = document.getElementById('documents_container');
        var memberBlock = `
                        <div class="document-block">
                          <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Файл</label>
                            <div class="col-sm-10">
                              <input type="file"
                                           name="new_documents[${iItemDocument}][document]"
                                           class="form-control">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Название</label>
                            <div class="col-sm-10">
                              <input type="text"
                                           name="new_documents[${iItemDocument}][name]"
                                           value=""
                                           class="form-control">
                            </div>
                          </div>
                            <div class="text-end">
                                <a id="" class="remove-document-btn text-end">Убрать</a>
                            </div>
                            <hr style="border-top: 1px solid rgb(0 0 0) !important;">
                        </div>
                            `;
        container.insertAdjacentHTML('beforeend', memberBlock);
    }

    /**
     * Убрать документ
     */
    $(document).on("click", ".remove-document-btn", function (e) {
        e.preventDefault(); // Предотвращаем стандартное действие ссылки
        $(this).closest('.document-block').remove(); // Удаляем ближайший блок.family-member-block
    });

    /**
     * Добавление документа
     */
    $("#add_document").on("click", function () {
        iItemDocument += 1;
        addDocument();
    });

    $('.destroy-document-item').on("click", function () {
        let route = $("#route_delete_document").val();
        let token = $("#input_token").val();
        let parent_div = $(this).closest('#landing_block_form_document');
        if (confirm('Вы действительно хотите удалить документ?')) {
            $.ajax({
                url: route,
                type: 'DELETE',
                data: {
                    _token: token
                },
                success: function (response) {
                    alert(response.success);
                    parent_div.remove();
                },
                error: function (xhr) {
                    alert('Ошибка. Не удалось удалить документ.');
                }
            });
        }
    });


    $('.destroy-document-acardeon').on("click", function () {
        let document_id = $(this).attr('document_id');
        let route = $("#route_delete_document_"+document_id).val();
        let token = $("#input_token").val();
        let parent_div = $(this).closest('.my-document-block');
        if (confirm('Хотите удалить документ?')) {
            $.ajax({
                url: route,
                type: 'DELETE',
                data: {
                    _token: token
                },
                success: function(response) {
                    alert(response.success);
                    parent_div.remove();
                },
                error: function(xhr) {
                    alert('Не удалось удалить документ');
                }
            });
        }
    });



});

/**
 * Работа с контактами
 */
jQuery(document).ready(function () {

    let iItemContact = 0;

    function addContact() {
        let sTipContact = $("#array_tip_contact").val();
        let arTipContact = JSON.parse(sTipContact);

        var container = document.getElementById('contacts_container');

        var options = arTipContact.map(tipContact => {
            return `<option value="${tipContact}">
                            ${tipContact}
                    </option>`;
        }).join('');

        var memberBlock = `
                        <div class="contact-block">
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Тип значка</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="new_contacts[${iItemContact}][tip]">
                                    ${options}
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Надпись:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="new_contacts[${iItemContact}][name]" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Информация:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="new_contacts[${iItemContact}][information]" value="">
                            </div>
                        </div>
                        <div class="text-end">
                            <a id="" class="remove-contact-btn text-end">Убрать</a>
                        </div>

                        <hr style="border-top: 1px solid rgb(0 0 0) !important;">
                        </div>
                            `;
        container.insertAdjacentHTML('beforeend', memberBlock);
    }

    /**
     * Убрать контакт
     */
    $(document).on("click", ".remove-contact-btn", function (e) {
        e.preventDefault(); // Предотвращаем стандартное действие ссылки
        $(this).closest('.contact-block').remove(); // Удаляем ближайший блок.family-member-block
    });

    /**
     * Добавление контакта
     */
    $("#add_contact").on("click", function () {
        iItemContact += 1;
        addContact();
    });

    $('.destroy-contact-acardeon').on("click", function () {
        let contact_id = $(this).attr('contact_id');
        let route = $("#route_delete_contact_"+contact_id).val();
        let token = $("#input_token").val();
        let parent_div = $(this).closest('.my-contact-block');
        if (confirm('Хотите удалить контакт?')) {
            $.ajax({
                url: route,
                type: 'DELETE',
                data: {
                    _token: token
                },
                success: function(response) {
                    alert(response.success);
                    parent_div.remove();
                },
                error: function(xhr) {
                    alert('Не удалось удалить контакт');
                }
            });
        }
    });

});

/**
 * Удаление фото
 */
jQuery(document).ready(function () {
    $('.destroy-image-item').on("click", function () {
        let route = $("#route_delete_image").val();
        let token = $("#input_token").val();
        let parent_div = $(this).closest('#landing_block_form_image');
        if (confirm('Вы действительно хотите удалить изображение?')) {
            $.ajax({
                url: route,
                type: 'DELETE',
                data: {
                    _token: token
                },
                success: function (response) {
                    alert(response.success);
                    parent_div.remove();
                },
                error: function (xhr) {
                    alert('An error occurred while deleting the image.');
                }
            });
        }
    });
});
