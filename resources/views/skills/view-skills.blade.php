@extends('layouts.dashboard')
@section('content')
    <div class="card p-4">
        <h3 class="mb-3">Manage Skills</h3>
        <small class="text-main mb-3">Hello {{ auth()->user()->full_name }}, You can manage your skills here</small>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Skill Category</th>
                        <th>Skill Type</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse ($skills as $skill)
                        <tr>
                            <td>{{ $loop->iteration  }}</td>
                            <td>{{ $skill->skill_category }}</td>
                            <td>{{ $skill->skill_type }}</td>
                            <td>
                                <button type="button" class="btn btn-danger btn-sm">
                                    <i class="mdi mdi-delete"></i>
                                  </button>
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