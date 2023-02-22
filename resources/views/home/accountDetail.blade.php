@extends('layout.master')

@section('content')

<div class="container-fluid ">
    <div class="row ">
        <div class="col-md-3">
            <div class="row" style="height: 200px;">
                <div class="col-sm-5" style="margin-top: 30px;">
                    <img src="{{asset('acountDetail/img/l60Hf-150x150.png')}}" alt="" style="width:120px; height: 120px; border-radius: 60px;">
                </div>
                <div class="col-sm-7" style="margin-top: 30px;">
                    <div class="info">
                        <h5>{{ Auth::user() -> name }}</h5>
                        <p>{{ Auth::user() -> email }}</p>
                        <a href="">Tải lên avatar</a>
                        <p>kích thước tối đa 2mb</p>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <ul class="nav flex-column ">
                    <li class="nav-item">
                        <a class="nav-link disabled" aria-current="page" href="#">Thông tin cá nhân</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="#">Địa chỉ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Đơn hàng của tôi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ">Hạng thành viên</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ">Phiếu giảm giá</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ">Sản phẩm yêu thích</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="signout">Đăng xuất</a>
                    </li>
                </ul>
            </div>
        </div>


        <div class="col-md-9">
            <div class="row" style="height: 200px;">
                <div class="title" style="position: relative; left: 50px ;top:150px">
                    <h1>Thông tin cá nhân</h1>
                </div>
            </div>
            <hr>
            <div class="row">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <label for="" class="form-label">Họ tên</label>
                        <input type="text" id="inputPassword5" value="{{ Auth::user() -> name }}" class="form-control" aria-describedby="">
                    </li>
                    <li class="list-group-item">
                        <label for="" class="form-label">Email</label>
                        <input type="email" id="inputPassword5" value="{{ Auth::user() -> email }}" class="form-control" aria-describedby="">
                    </li>
                    <li class="list-group-item">
                        <label for="" class="form-label">Số điện thoại</label>
                        <input type="number" id="inputPassword5" value="{{ Auth::user() -> PhoneNumber }}" class="form-control" aria-describedby="">
                    </li>
                    <li class="list-group-item">
                        <label for="" class="form-label">Giới tính</label>
                        <input type="date" id="inputPassword5" value="{{ Auth::user() -> Sex }}" class="form-control" aria-describedby="">
                    </li>
                    <li class="list-group-item">
                        <label for="" class="form-label">Ngày sinh</label>
                        <input type="text" id="inputPassword5" value="{{ Auth::user() -> DayofBirth }}" class="form-control" aria-describedby="">
                    </li>
                    <button type="button" class="btn btn-primary">Lưu</button>
                </ul>
            </div>
        </div>
    </div>
</div>



<br>
<br>
<br>
<br>

@endsection