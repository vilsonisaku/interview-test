
@foreach($users as $user)

{{ $user->name }} has written:
@foreach($user->posts()->orderBy('id')->limit(3)->get() as $post)
-  {{ $post->title }}
@endforeach

@endforeach