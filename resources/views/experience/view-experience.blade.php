@extends('layouts.dashboard')
@section('content')
    <div class="card p-4">
        <h3 class="mb-3">Manage Experience</h3>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name of Workplace</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Responsibilities Held</th>
                        <th>References</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse ($experiences as $experience)
                        <tr>
                            <td>{{ $loop->iteration  }}</td>
                            <td>{{ $experience->name_of_workplace }}</td>
                            <td>{{ $experience->start_date }}</td>
                            <td>{{ $experience->start_date }}</td>
                            <td>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary btn-sm  d-block mx-auto" data-toggle="modal"
                                    data-target="#exampleModal-{{  $experience->id }}">
                                    <i class="mdi mdi-eye-outline"></i>
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal-{{ $experience->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Responsibilities Held</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                {{  $experience->responsibilities_held }}
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <button type="button" class="btn btn-primary btn-sm d-block mx-auto" data-toggle="modal"
                                    data-target="#exampleModal2-{{  $experience->id }}">
                                    <i class="mdi mdi-eye-outline"></i>
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal2-{{ $experience->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">References</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                {{  $experience->reference }}
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            {{-- <td>{{ $skill->skill_type }}</td> --}}
                            <td>
                                <a href="{{ route('delete.experience', $experience) }}"
                                    onclick="
                                event.preventDefault();
                                if(confirm('Dangerous Action, Do you want to Continue??')){
                                     document.getElementById('{{ 'form-delete-' . $experience->id }}').submit();
                                }" class="btn btn-danger btn-sm"><i class="mdi mdi-delete"></i></a>

                                <form action="{{ route('delete.experience', $experience) }}" method="POST"
                                    class="d-none" id="{{ 'form-delete-' . $experience->id }}">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                    @empty
                        <p>You have not added any skill</p>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>
@endsection