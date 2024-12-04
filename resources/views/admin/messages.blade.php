@extends('layouts.admin_app')

@section('title', 'admin_register')


@section('content')

    <!-- messages section -->
    <section class="messages">

        <h1 class="heading">new messages</h1>

        <div class="box-container">
            @if($messages->isNotEmpty())
            @foreach($messages as $message)
                <div class="box">
                    <p>user id : <span>{{$message->user_id}}</span></p>
                    <p>name : <span>{{$message->name}}</span></p>
                    <p>number : <span>{{$message->number}}</span></p>
                    <p>email : <span>{{$message->email}}</span></p>
                    <p>message : <span>{{$message->message}}</span></p>
                    <a href="javascript:avoid(0);" class="delete-btn" data-id="{{$message->id}}">delete</a>
                </div>
            @endforeach
            @else
                <p class="empty">you have no messages</p>
            @endif
        </div>
        @if($messages->isNotEmpty())
            <div class="page mt-5" style="width: 100%;">{!! $messages->links('vendor.pagination.bootstrap-5') !!}</div>
        @endif
    </section>

@endsection

@section('script')
    <script type="text/javascript">
        $(document).on('click', '.delete-btn', function(e){
            e.preventDefault();

            const messageId = $(this).data('id');

            if(confirm('delete this message?')){

                deleteId(messageId);
            }
        });

        function deleteId(messageId){
            $.ajax({
                'url': '{{route("admin.messages_destroy", ":id")}}'.replace(":id", messageId),
                'type':'DELETE',
                'headers':{
                    'X-CSRF-TOKEN': '{{csrf_token()}}'
                },
                success:function(response){
                    if(response.status){
                        window.location.href= '{{route("admin.messages")}}';
                    }
                }
            })
        }
    </script>
@endsection




