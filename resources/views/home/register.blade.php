@extends('layout.master')

@section('content')

<div class="container">
    <div class="row ">

        <div class="col d-flex justify-content-center">           
            <form  action="{{ route('handle.register') }}"  method="post">
            @csrf
                <br>
                <br>
                <h2>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;Register</h2>
                <h1 >&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;</h1>
                <div class="mb-3">
                    <label for="" class="form-label">Họ và tên </label>
                    <input type="" name="Name" class="form-control" id="" >
                    
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Email</label>
                    <input type="email" name="Email" class="form-control" id="">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Số điện thoại </label>
                    <input type="phonenumber" name="Phone" class="form-control" id="" >
                    
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Giới tính </label>
                    <input type="" name="Sex" class="form-control" id="" >
                    
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">ngày sinh</label>
                    <input type="date" name="DateOfBirth" class="form-control" id="">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Mật khẩu </label>
                    <input type="password" name="Password" class="form-control" id="" >
                    
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Xác nhận mật khẩu</label>
                    <input type="password" name="rPassword" class="form-control" id="">
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>



<br>
<br>
<br>
<br>

@endsection