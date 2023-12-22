@extends('user_template.layouts.base')
@section('title','EcomSingle | Home')
@section('body')
<div class="container">
    <div class="row">
        <div class="col-lg-4">
            <div class="box_main">
                <ul>
                    <li><a href="{{route('UserDashboard')}}">Dashboard</a></li>
                    <li><a href="{{route('PendingOrders')}}">Pending Orders</a></li>
                    <li><a href="{{route('History')}}">History</a></li>
                    <li>
                        @auth
                        <form id="logout-form" action="{{route('logout')}}" method="POST">
                            @csrf</form>
                            <a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout
                            </a>
                        @endauth
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="box_main">
                @yield('userBody')
            </div>
        </div>
    </div>
</div>
@endsection
