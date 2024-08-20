<div class="p-3 card">
    <div class="card-header">پیام ها</div>
    <div class="card-body">

        @foreach ($RequestPortal->ticketsCoach as $ticket)

            @if($ticket->user_id_send==Auth::user()->id)
                <div class="media border border-1 p-2">

                    @if(is_null($ticket->ticket_user_send->personal_image))
                        <img class="align-self-center profile-user-img   img-circle" style="width:50px" src="/images/users/default-avatar.png"  height="50px" />
                    @else
                        <img class="align-self-center profile-user-img   img-circle" style="width:50px" src="{{'/documents/users/'.$ticket->ticket_user_send->personal_image}}"   height="50px" />
                    @endif
                    <div class="media-body">
                        <p>{{$ticket->date_fa.' '.$ticket->time_fa}}</p>
                        <h5 class="mt-0">{{$ticket->subject}}</h5>
                        <p>{!! $ticket->comment !!}</p>
                    </div>
                </div>
            @else
                <div class="media">
                    <div class="media-body">
                        <p>{{$ticket->ticket_user_send->fname.' '.$ticket->ticket_user_send->lname}}</p>
                        <p>{{$ticket->date_fa.' '.$ticket->time_fa}}</p>
                        <p>{!! $ticket->comment !!}</p>
                    </div>
                    @if(is_null($RequestPortal->user->personal_image))
                        <img class="profile-user-img   img-circle" style="width:50px" src="/images/users/default-avatar.png"  height="50px" />
                    @else
                        <img class="profile-user-img   img-circle" style="width:50px" src="{{'/documents/users/'.$RequestPortal->user->personal_image}}"   height="50px" />
                    @endif
                </div>
            @endif
        @endforeach
        <hr/>
        <form method="post" wire:submit.prevent="sendTicket">
            <div class="form-group">
                <label for="comment">متن پیام<span class="text-danger">*</span> </label>
                <textarea class="form-control" id="comment" rows="3" wire:model.lazy="comment"></textarea>
                @error('comment')
                <p class="text text-danger" role="alert">
                    {{ $message }}
                </p>
                @enderror
            </div>
            <button class="btn btn-success">ارسال پیام</button>
        </form>

    </div>
</div>
