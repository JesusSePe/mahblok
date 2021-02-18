<h1>Hello!</h1>
<ul>
@foreach( $posts as $post )
    <li>{{$post->text}}</li>
@endforeach
</ul>