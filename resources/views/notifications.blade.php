<h1>Mysite</h1>
@if (count(Auth::user()->unreadNotifications))
    <ul class="list-group">
        @foreach (Auth::user()->unreadNotifications as $item)
        <li class="list-group-item">
            your lesson hash been canceled: {{ snake_case(class_basename($item->type)) }}
            <form method="POST" action="/notification/{{ Auth::id() }}/read">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
                <button type="submit" class="btn btn-primary">mark as read</button>
            </form>
        </li>
        @endforeach
    </ul>
@endif



