@extends('layouts.dashboard')
@section('content')
    <div class="card p-4">
        <h3 class="mb-3">Add Skill</h3>
        <form action="" method="POST" >
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

            <button type="submit" class="btn btn-primary">Save Skill</button>
        </form>


    </div>
@endsection