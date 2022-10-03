
@foreach($users as $user)
    {{ $user['name'] }} has written:

    @foreach($user['posts'] as $post)
        -  {{ $post['title'] }}
    @endforeach
@endforeach