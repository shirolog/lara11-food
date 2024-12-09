@extends('layouts.admin_app')

@section('title', 'completed_order')


@section('content')

    <!-- placed-orders section -->
    <section class="placed-orders">

        <h1 class="heading">placed orders</h1>

        <div class="box-container">

            @if($orders->isNotEmpty())
                @foreach($orders as $order)
                    <div class="box">
                        <p>user id : <span>{{$order->user_id}}</span></p>
                        <p>placed on : <span>{{$order->placed_on}}</span></p>
                        <p>name : <span>{{$order->name}}</span></p>
                        <p>email : <span>{{$order->email}}</span></p>
                        <p>number : <span>{{$order->number}}</span></p>
                        <p>address : <span>{{$order->address}}</span></p>
                        <p>total products : <span>{{$order->total_products}}</span></p>
                        <p>total price : <span>${{$order->total_price}}/-</span></p>
                        <p>payment method : <span>{{$order->method}}</span></p>
                        <form action="{{route('admin.completed_orders_update', $order->id)}}" method="post">
                            @csrf
                            @method('PUT')
                            <select name="status" class="drop-down">
                                <option value="" selected disabled>{{$order->status}}</option>
                                <option value="pending"  {{ $order->status == 'pending' ? 'selected' : '' }} >pending</option>
                                <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>completed</option>
                            </select>
                            <div class="flex-btn">
                                <input type="submit"  class="btn" value="update">
                                <a href="javascript:avoid(0);" class="delete-btn" data-id="{{$order->id}}">delete</a>
                            </div>
                        </form>
                    </div>
                @endforeach
            @else
                <p class="empty">no orders placed yet!</p>
            @endif

        </div>

        @if($orders->isNotEmpty())
        <div class="page mt-5" style="width: 100%;">{!! $orders->links('vendor.pagination.bootstrap-5') !!}</div>
        @endif
    </section>

@endsection

@section('script')
    <script type="text/javascript">
        $(document).on('click', '.delete-btn', function(e){
            e.preventDefault();

            const orderId = $(this).data('id');

            if(confirm('delete this order?')){

                deleteOrder(orderId);
            }
        });

        function deleteOrder(orderId){
            $.ajax({
                'url': '{{ route("admin.completed_orders_destroy", ":id") }}'.replace(":id", orderId),
                'type':'DELETE',
                'headers':{
                    'X-CSRF-TOKEN': '{{csrf_token()}}'
                },
                success:function(response){
                    if(response.status){
                        window.location.reload();
                    }
                }
            });
        }
    </script>
@endsection


