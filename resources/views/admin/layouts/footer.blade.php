<div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
    Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
</div>

<!-- Scripts -->

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
{{--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>--}}
<script src="{{ asset('js/app.js') }}" ></script>
<script src="{{ asset('js/datepicker/datepicker.min.js') }}" ></script>
{{--<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>--}}
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/codemirror.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/mode/xml/xml.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/codemirror/2.36.0/formatting.js"></script>
{{--<script src="{{ asset('assets/js/main.min.js') }}"></script>--}}

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>


<script src="{{ asset('js/custom.js') }}" ></script>
@yield('add-js')
@stack('scripts')

<script defer>

    $(document).ready(function() {
        $('.list-select-dictionary').on('click', 'button.add-obj-list-select', function () {

            let sClass = this.getAttribute("parameter-class");
            let sNameField = this.getAttribute("parameter-name-field");

            let sValueObj = $('.list-select-dictionary-' + sClass + ' option:selected').val();
            let sIdObj = $('.list-select-dictionary-' + sClass + ' option:selected').attr('id_obj');

            var arListSelectData = [];

            $('.list-select-data-' + sClass).find(':input.obj-name').each(function (i, input) {
                arListSelectData.push($(input).val());
            });

            console.log(arListSelectData);

            if (!arListSelectData.includes(sValueObj)) {
                $('.list-select-data-' + sClass).append('' +
                    '<div class="row"> ' +
                    '<div class="col"> ' +
                    '<input type="hidden" name="' + sNameField + '[]" value="' + sIdObj + '"> ' +
                    '<input class="list-group-item w-100 obj-name" readonly type="text" value="' + sValueObj + '"> ' +
                    '</div> ' +
                    '<div class="col"> ' +
                    '<button type="button" class="btn btn-danger delete-obj-list-select">Удалить</button> ' +
                    '</div> ' +
                    '<div class="w-100"></div> ' +
                    '</div>' +
                    '').show();
            } else {
                alert("У пользователя уже имеется выбранное значение.");
            }
        });

        $('.list-select-data').on('click', 'button.delete-obj-list-select', function () {
            $(this).parent().parent().remove();
        })
    })

    $(document).ready(function () {

        $('.show_answer_card').on('click', function(){
            $('.card-body#' + $(this).attr('data-card')).toggle(100);
        });

        var editor = $('[summernote]');

        if(editor.length > 0) {
            var configFull = {
                lang: 'ru-RU', // default: 'en-US'
                shortcuts: false,
                airMode: false,
                minHeight: 220, // set minimum height of editor
                maxHeight: null, // set maximum height of editor
                focus: false, // set focus to editable area after initializing summernote
                disableDragAndDrop: false,
                codemirror: { // codemirror options
                    theme: 'monokai'
                },
                callbacks: {
                    onImageUpload: function (files) {
                        uploadFile(files, $(this));
                    },

                    onMediaDelete: function ($target, editor, $editable) {

                        var fileURL = $target[0].src;
                        deleteFile(fileURL);

// remove element in editor
                        $target.remove();
                    }
                }
            };

// Featured editor
            editor.summernote(configFull);

// Upload file on the server.
            function uploadFile(filesForm, el) {
                data = new FormData();

// Add all files from form to array.
                for (var i = 0; i < filesForm.length; i++) {
                    data.append("files[]", filesForm[i]);
                }

                if ($("#path_post").length){
                    let path_post = $('#path_post').val();
                    data.append("path_post", path_post);
                } else {
                    data.append("path_post", "/other");
                }



                $.ajax({
                    data: data,
                    type: "POST",
                    url: "{{route('redactor.file.upload')}}",
                    cache: false,
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    contentType: false,
                    processData: false,
                    success: function (images) {

// If not errors.
                        if (typeof images['error'] == 'undefined') {

// Get all images and insert to editor.
                            for (var i = 0; i < images['url'].length; i++) {

                                el.summernote('insertImage', images['url'][i], function ($image) {
//$image.css('width', $image.width() / 3);
//$image.attr('data-filename', 'retriever')
                                });
                            }
                        } else {
// Get user's browser language.
                            var userLang = navigator.language || navigator.userLanguage;

                            if (userLang == 'ru-RU') {
                                var error = 'Ошибка, не могу загрузить файл! Пожалуйста, проверьте файл или ссылку. ' +
                                    'Изображение должно быть не менее 500px!';
                            } else {
                                var error = 'Error, can\'t upload file! Please check file or URL. Image should be more then 500px!';
                            }

                            alert(error);
                        }
                    }
                });
            }

// Delete file from the server.
            function deleteFile(file) {
                data = new FormData();
                data.append("file", file);
                $.ajax({
                    data: data,
                    type: "POST",
                    url: "{{route('redactor.file.delete')}}",
                    cache: false,
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    contentType: false,
                    processData: false,
                    success: function (image) {
//console.log(image);
                    }
                });
            }
        }
    });
</script>

<script>
    (function () {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })()
</script>
