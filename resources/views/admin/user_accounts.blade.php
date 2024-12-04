@extends('layouts.admin_app')

@section('title', 'user_accounts')


@section('content')

    <!-- accounts section -->
    <section class="accounts">

        <h1 class="heading">users accounts</h1>

        <div class="box-container">
            @if($users->isNotEmpty())
            @foreach($users as $user)
            <div class="box">
                <p>user id : <span>{{$user->id}}</span></p>
                <p>username : <span>{{$user->name}}</span></p>
                <a href="javascript:avoid(0);" class="delete-btn" 
                 data-id="{{$user->id}}">delete</a>
            </div>
            @endforeach
            @else
                <p class="empty">no accounts available!</p>
            @endif

        </div>

        
        @if($users->isNotEmpty())
            <div class="page mt-5" style="width: 100%;">{!! $users->links('vendor.pagination.bootstrap-5') !!}</div>
        @endif

    </section>


@endsection

@section('script')
    <script type="text/javascript">
        $(document).on('click', '.delete-btn', function(e){
            e.preventDefault();

            const userId = $(this).data('id');
            if(confirm('delete this account?')){
                deleteUser(userId);
            }
        });

        function deleteUser(userId){
            $.ajax({
                'url': '{{route("admin.user_accounts_destroy", ":id")}}'.replace(':id', userId),
                'type': 'DELETE',
                'headers':{
                    'X-CSRF-TOKEN': '{{csrf_token()}}'
                },
                success:function(response){
                    if(response.status){
                        window.location.href = '{{route("admin.user_accounts")}}';
                    }
                }
            })
        }
    </script>
@endsection




