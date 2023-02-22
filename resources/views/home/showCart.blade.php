@extends('layout.master')

@section('content')

@php
$baseUrl = 'http://127.0.0.1:8001';
$stt = 1 ;
$total = 0;



@endphp
<div class="container " style="height: 800px;">
    @php
    if(!empty($carts)){
    @endphp

    <div class="row removeItemCart" data-url="{{route('removeItemCart')}}">

        <div class="col-md-12 removeCart" data-url="{{route('removeCart')}}">

            <h1 class="text-center my-3">Giỏ hàng</h1>

            <table class="table changeQuantilyCart" data-url="{{route('changeQuantily')}}">
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Ảnh </th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Đơn giá</th>
                        <th scope="col">Thao tác</th>


                    </tr>
                </thead>

                @foreach($carts as $id => $cartItem)
                <tbody>

                    <tr id="row-cart-{{$id}}">
                        <th scope="row">{{$stt ++}}</th>
                        <td>{{$cartItem['name']}}</td>
                        <td><img src=" {{$cartItem['image']}}" style="height: 100px;" alt=""></td>


                        <td><input type="number" value="{{$cartItem['quantity']}}" min="1" class="js-change-qty" id="{{ $id }}">
                            <!-- <button type="button" class="btn btn-dark">cập nhật</button> -->
                        </td>
                        <td id="m-{{$id}}"> {{ number_format( $cartItem['quantity']* $cartItem['price'])  }} VNĐ</td>

                        <td><button type="button" class="btn btn-danger js-remove-item-cart" id="{{$id}}">Xóa</button></td>

                    </tr>

                    @php
                    $total += $cartItem['quantity']* $cartItem['price'] ;
                    @endphp

                    @endforeach


                    <tr>
                        <td>Tổng tiền</td>
                        <td colspan="3"></td>
                        <td> {{ number_format($total) }} VNĐ</td>
                        <td><button type="button" class="btn btn-danger">Thanh toán</button></td>

                    </tr>
                </tbody>

            </table>

        </div>

    </div>

    <div class="row">
        <div class="col">
            <a href="{{asset('shop')}}" class="btn btn-danger">Tiếp tục mua sản phẩm</a>
        </div>
        <div class="col">
            <button class="btn btn-danger js-delete-card">Xóa toàn bộ</button>
        </div>
    </div>
    @php
    }else{
    @endphp
    <div class="row">
        <h1 class="text-center my-3">Không có sản phẩm nào trong giỏ hàng</h1>
    </div>
    <div class="row">
        <div class="col">
            <a href="{{asset('shop')}}" class="btn btn-primary">Tiếp tục mua sản phẩm</a>
        </div>

    </div>

    @php
    }
    @endphp

</div>


@section('cart')
<script>
    $(function() {
        $('.js-change-qty').on('change', function() {
            let self = $(this);
            let Url = $('.changeQuantilyCart').data('url');
            let qty = self.val().trim();
            // console.log(qty);
            let id = self.attr('id').trim();
            // console.log(id);
            if (qty > 0 && $.isNumeric(id)) {
                $.ajax({
                    url: Url,
                    type: 'get',
                    data: {
                        id: id,
                        quantity: qty
                    },
                    success: function(data) {
                        // console.log(data);

                        // let result = JSON.parse(data);

                        if (data.code === 200) {


                            $('#m-' + id).text(data.price.toLocaleString('en-US') + ' ' + 'VND');
                            location.reload();
                            // $('.cart_wrapper').html(data.cartComponent);


                        }
                    }
                })
            }
        });

        $('.js-delete-card').on('click', function() {
            let urlremoveCart = $('.removeCart').data('url');
            if (confirm('bạn có thực sự muốn xóa toàn bộ giỏ hàng')) {
                $.ajax({
                    url: urlremoveCart,
                    type: 'get',
                    success: function(data) {
                        if (data.code === 200) {
                            location.reload();
                        }
                        alert(data.message);
                        history.back();
                    }
                })
            }
        })

        $('.js-remove-item-cart').on('click', function() {
            let self = $(this);
            let urlRemoveItemCart = $('.removeItemCart').data('url');
            let id = self.attr('id').trim();
            if (confirm('bạn có thực sự muốn xóa sản phẩm khỏi giỏ hàng')) {
                $.ajax({
                    url: urlRemoveItemCart,
                    type: 'get',
                    data: {
                        id: id
                    },
                    success: function(data) {
                        if (data.code === 200) {
                            $('#row-cart-' + id).hide();
                            location.reload();

                        }

                    }
                })
            }
        })


    })
</script>

@endsection
@endsection