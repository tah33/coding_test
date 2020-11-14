@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Monthly Report</div>

                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Month</th>
                                <th>Amount</th>
                                <th>Activating Date</th>
                                <th>Activating End Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($payments as $key=> $payment)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$payment->created_at->format('M , Y')}}</td>
                                    <td>${{$payment->amount}}</td>
                                    <td>{{$payment->start_date}}</td>
                                    <td>{{$payment->end_date}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
