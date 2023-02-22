@extends('layout.master')

@section('content')

@php
$baseUrl = 'http://127.0.0.1:8001';
@endphp
<!-- Start Content -->
<div class="container py-5">
    <div class="row">
        <!-- category-->
        <div class="col-lg-3">
            <h1 class="h2 pb-4">Categories</h1>
            <ul class="list-unstyled templatemo-accordion">
                <li class="pb-3">
                    @foreach($categories as $category)
                    <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">
                        <h3> {{$category -> name}} </h3>
                        @if($category->categoryChild->count())
                        <i class="fa fa-fw fa-chevron-circle-down mt-1"></i>
                        @endif
                    </a>

                    <ul class="collapse show list-unstyled pl-3">
                        @foreach($category->categoryChild as $categoryItem)
                        <li><a class="text-decoration-none" href="#">{{ $categoryItem ->name }}</a></li>
                        @endforeach
                    </ul>

                    @endforeach
                </li>
            </ul>
        </div>
        <!-- end category-->
        <div class="col-lg-9">
            <div class="row">
                <div class="col-md-6">
                    <ul class="list-inline shop-top-menu pb-3 pt-1">
                        <li class="list-inline-item">
                            <a class="h3 text-dark text-decoration-none mr-3" href="#">All</a>
                        </li>
                        <li class="list-inline-item">
                            <a class="h3 text-dark text-decoration-none mr-3" href="#">Men's</a>
                        </li>
                        <li class="list-inline-item">
                            <a class="h3 text-dark text-decoration-none" href="#">Women's</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-6 pb-4">
                    <div class="d-flex">
                        <select class="form-control">
                            <option>Featured</option>
                            <option>A to Z</option>
                            <option>Item</option>
                        </select>
                    </div>
                </div>
            </div>
            <!-- sản phẩm -->

            <div class="row">
                @foreach($products as $product)
                <div class="col-md-4">
                    <div class="card mb-4 product-wap rounded-0">
                        <div class="card rounded-0">
                            <img class="card-img rounded-0 img-fluid" src="{{$baseUrl.$product->feature_image_path }} " height='420px'>
                            <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                <ul class="list-unstyled">
                                    <li><a class="btn btn-success text-white" href="#"><i class="far fa-heart"></i></a></li>
                                    <li><a class="btn btn-success text-white mt-2 add-showdetailPoduct" data-url="{{ route('AddToProductdetail', ['id' => $product->id ]) }}" href="shop/product/showdetailPoduct"><i class="far fa-eye"></i></a></li>
                                    <li><a class="btn btn-success text-white mt-2 add-to-card" data-url="{{ route('Cart', ['id' => $product->id ]) }}" href=""><i class="fas fa-cart-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <a href="shop-single.html" class="h3 text-decoration-none">{{$product->name}}</a>
                            <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                <li>M/L/X/XL</li>
                                <li class="pt-2">
                                    <span class="product-color-dot color-dot-red float-left rounded-circle ml-1"></span>
                                    <span class="product-color-dot color-dot-blue float-left rounded-circle ml-1"></span>
                                    <span class="product-color-dot color-dot-black float-left rounded-circle ml-1"></span>
                                    <span class="product-color-dot color-dot-light float-left rounded-circle ml-1"></span>
                                    <span class="product-color-dot color-dot-green float-left rounded-circle ml-1"></span>
                                </li>
                            </ul>
                            <ul class="list-unstyled d-flex justify-content-center mb-1">
                                <li>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-muted fa fa-star"></i>
                                    <i class="text-muted fa fa-star"></i>
                                </li>
                            </ul>
                            <p class="text-center mb-0">{{number_format($product->price)}} VNĐ</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- kết thúc sản phẩm -->
            <!-- phân trang -->
            <div div="row">
                <div class="col-md-12">
                    {{ $products->links('pagination::bootstrap-4') }}
                </div>
            </div>
            <!--kết phân trang -->
        </div>

    </div>
</div>
<!-- End Content -->


@section('view_card')
<script>
    function addToCard(event) {
        event.preventDefault();
       
        let Url = $(this).data('url');
        $.ajax({
            type: 'GET',
            url: Url,
            success: function(data) {
                if (data.code == 200) {
                    // window.location('shop/card/show');
                }

            }
        });
    }
    function addToShowDetail(event) {
        // event.preventDefault();
        let Url = $(this).data('url');
        $.ajax({
            type: 'GET',
            url: Url,
            success: function(data) {
                if (data.code == 200) {
                    // window.location('shop/card/show');
                }

            }
        });
    }

    $(function() {
        $('.add-to-card').on('click', addToCard);
        $('.add-showdetailPoduct').on('click', addToShowDetail);
    });
</script>
@endsection







@endsection