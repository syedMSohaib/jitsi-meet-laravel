@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h3>Create Meetups</h3></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(Auth::user()->type)
                        <div class="form-group">
                            <form action="{{url('create-meetup')}}" method="post">
                                @csrf
                                <input type="text" required class="form-control" name="name" placeholder="meetup name">
                                <div class="text-right">
                                    <button class="btn btn-primary mt-2" type="submit">Create</button>
                                </div>
                            </form>
                        </div>
                    @endif
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h3>Latest Meetups</h3>
                    <table class="table">
                        <tr>
                            <th>S.No</th>
                            <th>Name</th>
                            <th>Open</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                        @foreach($meetups as $key => $meetup)
                        <tr>
                            <th>{{++$key}}</th>
                            <th>{{$meetup->name}}</th>
                            <th>{{ ($meetup->closed) ? "closed" : "open" }}</th>
                            <th>{{$meetup->created_at}}</th>
                            <th><a class="btn btn-success" href="{{url('meetup-conferencing/'.str_slug($meetup->name)) }}">JOIN</a></th>
                        </tr>

                        @endforeach
                    </table>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection
