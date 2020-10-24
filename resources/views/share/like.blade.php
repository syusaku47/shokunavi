@if (Auth::check())
@if ($like)
{{ Form::model($shop, array('action' => array('LikesController@destroy', $shop->id, $like->id))) }}
<button class="btn-like btn btn-default" type="submit">
    <span>Love</span>
    <span class="material-icons">favorite</span>
    <span>{{ $shop->likes_count }}</span>

</button>
{!! Form::close() !!}
@else
{{ Form::model($shop, array('action' => array('LikesController@store', $shop->id))) }}
<button class="btn-unlike btn btn-default" type="submit">
    <span>お気に入り</span>
    <span class="material-icons">favorite_border</span>
    {{ $shop->likes_count }}
</button>
{!! Form::close() !!}
@endif
@endif