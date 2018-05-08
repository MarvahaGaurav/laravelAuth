@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    Name: {{config('app.name')}}<br>
                    Env: {{config('app.env')}}<br>
                    Url : {{config('app.url')}}<br>
                    Timezone: {{config('app.timezone')}}<br>
                    key: {{config('app.key')}}<br>
                    User Name :  {{ Auth::guard('admin')->user()->name }}<br>
                    User Detail :  {{Auth::guard('admin')->user()}}<br>
                    You are logged in! <br>
                    {{Auth::guard('admin')->user()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
