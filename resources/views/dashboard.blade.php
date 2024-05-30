@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center">{{ __('Welcome') }}</div>
                    <div class="card-header text-center">
                        <p>Welcome to our application, {{ Auth::user()->name }}!</p>
                        <p>This is your dashboard.</p>
                    </div>
                        
                    <div class="card-body">
                        
                    </div>
                    <div class="row m-3">
                        <div class="col">
                            <button class="btn btn-primary" id="addRequestBtn">Add Request</button>
                        </div>
                    </div>
                    <div class="row m-3">
                        <div class="col">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>{{ __('Id') }}</th>
                                        <th>{{ __('Items') }}</th>
                                        <th>{{ __('Type') }}</th>
                                    </tr>
                                </thead>
                                <tbody id="requestTableBody">
                                    <tr>
                                        <td>Row 1, Column 1</td>
                                        <td>Row 1, Column 2</td>
                                        <td>Row 1, Column 3</td>
                                    </tr>
                                    <tr>
                                        <td>Row 2, Column 1</td>
                                        <td>Row 2, Column 2</td>
                                        <td>Row 2, Column 3</td>
                                    </tr>
                                    <tr>
                                        <td>Row 3, Column 1</td>
                                        <td>Row 3, Column 2</td>
                                        <td>Row 3, Column 3</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
