@extends('layouts.app')

@section('page-title', 'Index')

@section('main-content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center text-success">
                        Sei nell'index!
                    </h1>

                    <table class="table">

                        <thead>
                
                            <tr>
                
                                <th scope="col">#</th>
                     
                                <th scope="col">
                                    Title
                                </th>
                     
                                <th scope="col">
                                    projects
                                </th>
                     
                
                        
                            </tr>
                
                        </thead>    
                
                        <tbody>
            
                            @foreach ($types as $type)
                            <tr>
            
                                <th scope="row">
                                    {{$type->id}}
                                </th>                    
                                
                                <td>
                                    {{$type->type_name}}
                                </td>

                                <td>
                                    
                                    @foreach ( $type->projects as $project)

                                        @if (($type->projects))

                                            {{$project->title}}, 

                                        @else

                                            {{$project->title}}

                                        @endif

                                    @endforeach
                                </td>

                              

            

                                <td>

                                    <a href="{{route('admin.types.show',['type'=>$type])}}">
                                  
                                        <button>
                                            Show
                                        </button>

                                    </a>

                                    <a href="{{route('admin.types.edit',['type'=>$type])}}">

                                        <button>
                                            Edit
                                        </button>

                                    </a>

                                    <form onsubmit="return confirm('sei sicuro?')" action="{{route('admin.types.destroy',['type'=>$type])}}" method="POST">
                                        @csrf
                                        @method('Delete')

                                        <button type='submit'>
                                            Delete
                                        </button>

                                    </form>
                                    
                                </td>
                                
                                
                                
                            </tr>
                            @endforeach


                                                            
                        </tbody>
            
                    </table>

                    <a href="{{route('admin.types.create')}}">
                    
                        <button>
                            + Nuovo Tipo
                        </button>

                    </a>

                 
                </div>
            </div>
        </div>
    </div>
@endsection