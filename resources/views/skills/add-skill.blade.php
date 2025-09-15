@extends('layouts.dashboard')
@section('content')
    <div class="card p-4">
        <h3 class="mb-3">Add Skill</h3>
        <form action="{{ route('save.skill') }}" method="POST" class="mb-4">
            @csrf
            <div class="form-group mb-4">
                <label for="skill_category">Skill Category</label>
                <select name="skill_category" class="form-control" id="skill_category">
                    <option value="">--Select--</option>
                    <option value="Domestic">Domestic</option>
                    <option value="Nursing">Nursing</option>
                    <option value="Soft Skill">Soft Skill</option>
                </select>
                @error('skill_category')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label for="skill_type">Skill Type</label>
                <select name="skill_type" class="form-control" id="skill_type">
                    <option value="">--Select--</option>
                    <option value="House Cleaning">House Cleaning</option>
                    <option value="Laundry">Laundry</option>
                    <option value="Car Wash">Car Wash</option>
                    <option value="Gardening">Gardening</option>
                    <option value="Child Care">Child Care</option>
                    <option value="Elderly Care">Elderly Care</option>
                    <option value="Errand Clerk">Errand Clerk</option>
                </select>
                @error('skill_type')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <small class="text-danger">The maximum number of skills allowed is 5.</small>
            </div>

            <button type="submit" class="btn btn-primary">Save Skill</button>
        </form>

        <h3 class="mb-3">Manage Skills</h3>

        <div class="table-responsive">
            <table class="table table-striped">
               
                <tbody>
                    @if ($skills->count() > 0)
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Skill Category</th>
                            <th>Skill Type</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                @endif
                    @forelse ($skills as $skill)
                    
                        <tr>
                            <td>{{ $loop->iteration  }}</td>
                            <td>{{ $skill->skill_category }}</td>
                            <td>{{ $skill->skill_type }}</td>
                            <td>
                                <a href="{{ route('delete.skill', $skill) }}"
                                    onclick="
                                event.preventDefault();
                                if(confirm('Dangerous Action, Do you want to Continue??')){
                                     document.getElementById('{{ 'form-delete-' . $skill->id }}').submit();
                                }" class="btn btn-danger btn-sm"><i class="mdi mdi-delete"></i></a>

                                <form action="{{ route('delete.skill', $skill) }}" method="POST"
                                    class="d-none" id="{{ 'form-delete-' . $skill->id }}">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                    @empty
                        <p class="text-center">You have not added any skill</p>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
@endsection