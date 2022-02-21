@extends('layouts.app')
@section('content')
    @include('navbar')
    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                <img src="https://via.placeholder.com/600x400">
                <h1 class="display-one">{{ $article->title }}</h1>
                <p>{!! $article->body !!}</p> 
                <hr>
                <div>
                    <span>Теги:</span>
                    @forelse(explode(" ", $article->tags) as $tag)
                        <span class="selected"><a href="#">{{ $tag }}</a></span>
                    @empty
                        <p class="text-warning">No tag available</p>
                    @endforelse
                </div>
                <p>Количество просмотров: <span id="views">{{ $article->views }}</span></p>
                <span>Лайки:</span><button id="like" type="button">{{ $article->likes }}</button>
                <br><br>
                <p>Комментарий</p>
                <div id="form_place">
                    <form>
                        @csrf
                        <label for="theme_comment">Тема:</label><br>
                        <input type="text" id="theme_comment" name="theme_comment"><br>
                        <label for="body_comment">Текст комментария:</label><br>
                        <textarea id="body_comment" name="body_comment" rows="5" cols="33"></textarea><br><br>
                        <input type="submit" id="send_comment" value="Отправить">
                    </form> 
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
         $(document).ready(function() {

            $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('input[name="_token"]').attr('value')
                  }
            });

            setTimeout(function () {
                $.ajax({
                  url: "{{ url('/view') }}",
                  method: 'post',
                  data: {
                     article_id: {{ $article->id }}
                  },
                  success: function(result){
                    $('#views').text(result.views);
                  }
                });
            }, 5000);

            $('#like').click(function(e) {
               e.preventDefault();
               $.ajax({
                  url: "{{ url('/like') }}",
                  method: 'post',
                  data: {
                     article_id: {{ $article->id }}
                  },
                  success: function(result){
                    $('#like').text(result.likes);
                  }
                });
               });

               $('#send_comment').click(function(e) {
               e.preventDefault();
               $.ajax({
                  url: "{{ url('/comment') }}",
                  method: 'post',
                  data: {
                     article_id: {{ $article->id }},
                     theme_comment: $('input[name="theme_comment"]').val(),
                     body_comment:  $('textarea[name="body_comment"]').val()
                  },
                  success: function(result){
                      if (result.success) $('#form_place').text("Ваше сообщение успешно отправлено!");
                      else console.log(result);
                  }
                });
               });

            });
    </script>
@endsection