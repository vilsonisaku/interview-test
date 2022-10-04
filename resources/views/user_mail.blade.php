
@foreach($users as $user)

{{ $user->name }} has written:
@foreach($user->posts()->limit(3)->get() as $post)
-  {{ $post->title }}
@endforeach

@endforeach