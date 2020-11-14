@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Monthly Report</div>

                    <div class="card-body">
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <th>Month</th>
                                <th>Amount</th>
                                <th>Activating Date</th>
                                <th>Activating End Date</th>
                            </tr>
                            <tr>
                                <td>{{}}</td>
                            </tr>
                            </tbody>
                        </table>
                        @if(Auth::user()->status!=1)
                            <a href="{{route('activate.account')}}" class="btn btn-success">Activate</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
