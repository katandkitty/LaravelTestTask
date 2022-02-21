@if(str_contains(Request::url(), 'articles'))
    <div class="navbar">
        <div><b>Тредиум</b></div>
        <div>
            <span><a href="/">На главную</a></span>
            <span class="selected"><a href="/articles">Каталог статей</a></span>
        </div>
    </div>
@else
    <div class="navbar">
        <div><b>Тредиум</b></div>
        <div>
            <span class="selected"><a href="/">На главную</a></span>
            <span><a href="/articles">Каталог статей</a></span>
        </div>
    </div>
@endif
