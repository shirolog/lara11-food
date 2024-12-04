@extends('layouts.admin_app')

@section('title', 'admin_accounts')


@section('content')

   <!-- accounts section -->
    <section class="accounts">

        <h1 class="heading">admins accounts</h1>

        <div class="box-container">
            
            <div class="box">
                <p>register new admin</p>
                <a href="{{url('/admin_register')}}" class="option-btn">register</a>
            </div>

            @if($admins->isNotEmpty())
                @foreach($admins as $admin)
                    <div class="box">
                        <p>admin id : {{$admin->id}}</span></p>
                        <p>username : {{$admin->name}}</span></p>
                        <div class="flex-btn">
                            <a href="javascript:void(0);" class="delete-btn" 
                             data-id="{{$admin->id}}">delete</a>
                        </div>
                    </div>
                @endforeach
            @else
                <p class="empty">no accounts available!</p>
            @endif
            
        </div>
        
        @if($admins->isNotEmpty())
            <div class="page mt-5" style="width: 100%;">{!! $admins->links('vendor.pagination.bootstrap-5') !!}</div>
        @endif

    </section>
@endsection


@section('script')
    <script type="text/javascript">
        $(document).on('click', '.delete-btn', function(e){
            e.preventDefault();

            const adminId = $(this).data('id');

            if(confirm('delete this account?')){

                deleteAdmin(adminId);
            }
        });

        function deleteAdmin(adminId){
            $.ajax({
                'url': '{{route("admin.admin_accounts_destroy", ":id")}}'.replace(":id", adminId),
                'type': 'DELETE',
                'headers':{
                    'X-CSRF-TOKEN': '{{csrf_token()}}'
                },
                success: function(response){
                    if(response.status){
                        window.location.href = '{{route("admin.admin_accounts")}}';
                    }
                }
            });

        }
    </script>
@endsection




