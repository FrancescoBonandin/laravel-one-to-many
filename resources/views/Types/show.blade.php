@extends('layouts.app')

@section('page-title', 'Show')

@section('main-content')
    <div class="row">
        <div class="col">

            <h1 class="text-center text-success">
                Sei nello Show di {{$type->type_name}}!
            </h1>

            <div class="card">

                <div class="card-body">

                    <div>
                        id:{{$type->id}}
                    </div>

                    <div>
                        Title:{{$type->type_name}}
                    </div>

                    <div>
                        projects:
                        
                        @foreach($type->projects as $project)

                            {{ $project->title }},

                        @endforeach

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection