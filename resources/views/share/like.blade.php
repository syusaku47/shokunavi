@if (Auth::check())
    @if ($like)
    {{ Form::model($shop, array('action' => array('LikesController@destroy', $shop->id, $like->id))) }}
        <button  class="py-4" type="submit">
        <span>Love</span>
        <span class="material-icons">favorite</span>
        <span>{{ $shop->likes_count }}</span>
        
        </button>
    {!! Form::close() !!}
    @else
    {{ Form::model($shop, array('action' => array('LikesController@store', $shop->id))) }}
        <button type="submit">
        <p class="m-0">お気に入り</p>
        <span class="material-icons">favorite_border</span>
        {{ $shop->likes_count }}
        </button>
    {!! Form::close() !!}
    @endif
@endif