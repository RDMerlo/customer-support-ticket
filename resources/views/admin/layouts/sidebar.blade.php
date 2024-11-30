<div class="col col-lg-2 p-2 flex-shrink-0 p-4 bg-white border-end" >
    {{--        <a href="{{route('admin-home')}}" class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom">--}}
    <img class="bi me-2" src="/assets/img/logo.svg" >
    <span class="mb-1 "><b>Админ панель</b></span>
    </a>
    <ul class="list-unstyled ps-0">
        <li class="mb-1 btn-toggle-nav">
            <a href="" class="btn align-items-center rounded">Файловый менеджер</a>
        </li>
        <li class="mb-1 btn-toggle-nav">
            <a href="{{route('users.index')}}" class="btn align-items-center rounded">Пользователи</a>
        </li>
        <li class="mb-1">
            <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse-2" aria-expanded="false">
                Новости и События
            </button>
            <div class="collapse" id="dashboard-collapse-2">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li><a href="{{route('news.index')}}" class="link-dark rounded">Новости</a></li>
                </ul>
            </div>
            <div class="collapse" id="dashboard-collapse-2">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li><a href="{{route('news.parsing-news-page')}}" class="link-dark rounded">Парсинг</a></li>
                </ul>
                <hr>
            </div>
        </li>

        <li class="mb-1 btn-toggle-nav">
            <a href="{{route('mentor.index')}}" class="btn align-items-center rounded">Наставники</a>
        </li>
        <li class="mb-1 btn-toggle-nav">
            <a href="{{route('winner.index')}}" class="btn align-items-center rounded">Победители</a>
        </li>
        <li class="mb-1 btn-toggle-nav">
            <a href="{{route('participant.index')}}" class="btn align-items-center rounded">Участники</a>
        </li>
        <li class="mb-1 btn-toggle-nav">
            <a href="{{route('reviews.index')}}" class="btn align-items-center rounded">Отзывы</a>
        </li>
    </ul>
</div>
