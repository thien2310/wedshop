@extends('layout.master')

@section('content')

<div class="container">
    <div class="row ">

        <div class="col d-flex justify-content-center">           
            <form  action="{{ route('handle.login') }}"  method="post">
            @csrf
                <br>
                <br>
                <h2>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;Login</h2>
                <p>&ensp;&ensp;&ensp;Bạn chưa có tài khoản ? <a href="{{ route('register') }}">Đăng kí</a> &ensp;&ensp;&ensp;&ensp;&ensp;</p>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email </label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" >
                    
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
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