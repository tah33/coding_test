@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-12 col-sm-12 col-12">
                <p>You will be charged for $10 for thim monthly subscription</p>
                <div class="card">
                    <form action="{{route('stripe.payment')}}" method="post" id="payment-form">@csrf
                        <div class="form-group">
                            <div class="card-header">
                                <label for="card-element">Enter Your Credit Card Information</label>
                            </div>
                            <div class="card-body">
                                <div id="card-element">

                                </div>
                                <div id="card-errors" role="alert"></div>
                                <input type="hidden" name="user_id" value="{{\Illuminate\Support\Facades\Auth::id()}}">
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-dark" type="submit">Pay</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
