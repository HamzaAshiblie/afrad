@extends('layouts.master')
@section('header')
@endsection
@section('title')
    نظام إدارة الأفراد
@endsection

@section('content')
    <div class="row" style="margin-top: 8%; text-align: center">
        <h3>
            نظام إدارة طلبات الأفراد
        </h3>
    </div>
    <div class="row" style="margin-top: 2%">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">تسجيل الدخول</h3>
                </div>
                <div class="panel-body">
                    <div class="messages">
                        <!--//////////////////////////////////////////////////////////////////
                        ///////////TO DO LOGIN ERROR MESSAGES/////////////////////////////
                        //////////////////////////////////////////////////////////////////-->
                    </div>
                    <form class="form-horizontal" action="{{ route('signIn') }}" method="post">
                        <fieldset>
                            <div class="form-group">
                                <div class="col-sm-10 {{$errors->has('username')? 'has-error':''}}">
                                    <input class="form-control" type="text" name="username" id="username" placeholder="اسم المستخدم" value="{{ Request::old('username') }}">
                                    <h6 style="color: red">{{$errors->first('username')}}</h6>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-10 {{$errors->has('password')? 'has-error':''}}">
                                    <input class="form-control" type="password" name="password" id="passsword" placeholder="كلمة المرور">
                                    <h6 style="color: red">{{$errors->first('password')}}</h6>

                                </div>
                            </div>
                            <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-log-in"></i>
                                دخول
                            </button>
                            <input type="hidden" name="_token" value="{{ Session::token() }}">
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>

@endsection
