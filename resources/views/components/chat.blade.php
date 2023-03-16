<div>
    @forelse($chat as $message)
       <div class="border border-success mb-2 p-2">
           <span class="@if($loop->even)text-info @else text-primary @endif">{{ $message->fromUser->name }}</span><p>{{ $message->content }}</p>
       </div>
    @empty
    <h3  class="text-danger">Сообщений пока нет</h3>
    @endforelse
    <a class="btn btn-primary" href="{{ route('message.show') }}"> Вернуться к сообщениям</a>
</div> 