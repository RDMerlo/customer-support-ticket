<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>
    <link rel="icon" href="{{asset('favicon.ico')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/admin/app.css') }}"/>
{{--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">--}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="bg-light">
<header>
    <nav class="navbar navbar-light navbar-expand-md bg-white shadow-sm">
        <div class="container-fluid">
{{--            <img src="{{ asset('img/admin/niioz-logo.svg') }}" width="120"--}}
{{--                 alt="НИИ Организации Здравоохранения и Медицинского Менеджмента">--}}
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link px-3" href="/" target="_blank">На сайт</a>
                </li>
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn nav-link text-danger">Выход</button>
                    </form>
                </li>
            </ul>
        </div>
    </nav>
</header>
<main class="my-4">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="list-group">

                    {{--Категория заявок--}}
                    <a href="{{ route('admin.category_record.index') }}"
                       class="list-group-item list-group-item-action ">
                        {{ __('sections.category_record') }}
                    </a>

                    {{--Статус заявок--}}
                    <a href="{{ route('admin.processing_statuses.index') }}"
                       class="list-group-item list-group-item-action ">
                        {{ __('sections.processing_statuses') }}
                    </a>

                    {{--Заявки--}}
                    <a href="{{ route('admin.support_ticket_record.index') }}"
                       class="list-group-item list-group-item-action ">
                        {{ __('sections.support_ticket_record') }}
                    </a>



{{--                    --}}{{--База знаний--}}
{{--                    <div class="accordion accordion-flush" id="accordionExample">--}}
{{--                        <div class="card">--}}
{{--                            <div class="product-filter-sidebar widget-area accordion-item" id="headingOne">--}}
{{--                                <h2 class="accordion-header">--}}
{{--                                    <button class="accordion-button collapsed"--}}
{{--                                            type="button"--}}
{{--                                            data-toggle="collapse"--}}
{{--                                            data-target="#collapseOne"--}}
{{--                                            aria-expanded="false"--}}
{{--                                            aria-controls="collapseOne">--}}
{{--                                        База знаний--}}
{{--                                    </button>--}}
{{--                                </h2>--}}
{{--                            </div>--}}
{{--                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample" style="">--}}
{{--                                <div class="card-body">--}}
{{--                                    <a href="{{ route('admin.category_knowledge_base.index') }}"--}}
{{--                                       class="list-group-item list-group-item-action ">--}}
{{--                                        {{ __('sections.category_knowledge_base') }}--}}
{{--                                    </a>--}}
{{--                                    <a href="{{ route('admin.type_research.index') }}"--}}
{{--                                       class="list-group-item list-group-item-action ">--}}
{{--                                        {{ __('sections.type_research') }}--}}
{{--                                    </a>--}}
{{--                                    <a href="{{ route('admin.knowledge_base.index') }}"--}}
{{--                                       class="list-group-item list-group-item-action ">--}}
{{--                                        {{ __('sections.knowledge_base') }}--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
            </div>

            <div class="col-md-9">
                @include('admin.inc.messages')

                @yield('content')
            </div>
        </div>
    </div>
</main>
{{----------------------------------------------------------------------------------------}}

<div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
    Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
</div>

<script src="{{ asset('js/ckeditor.js') }}"></script>
<script src="{{ asset('js/admin/app.js') }}"></script>
<script
    src="https://code.jquery.com/jquery-3.6.3.js"
    integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
    crossorigin="anonymous">
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

{{--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>--}}
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

<script src="{{ asset('js/admin/custom.js') }}"></script>

@stack('scripts')

{{--<script>--}}
{{--    ClassicEditor.create(document.querySelector('#field_body'), {--}}
{{--            simpleUpload: {--}}
{{--                uploadUrl: '/uploader',--}}
{{--            },--}}
{{--            mediaEmbed: {--}}
{{--                previewsInData: true--}}
{{--            }--}}
{{--        })--}}
{{--        .catch(error => {--}}
{{--            console.error(error);--}}


{{--        });--}}
{{--</script>--}}
<script defer>
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
url: "{{route('admin.redactor.file.upload')}}",
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
url: "{{route('admin.redactor.file.delete')}}",
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

</body>
</html>

