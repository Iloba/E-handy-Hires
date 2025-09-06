@extends('layouts.dashboard')
@section('content')
    <div class="card p-4">
        <form action="{{ route('save.bio.data') }}" method="POST" enctype="multipart/form-data">
            @csrf


            <div class="form-group mb-4">
                <label for="phone">Phone Number</label>
                <input type="number" name="phone" class="form-control" placeholder="Enter Phone Number" required>
                @error('phone')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label for="age">Age</label>
                <input type="number" name="age" id="age" class="form-control" placeholder="Enter Age" required>
                @error('age')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label for="gender">Gender</label>
                <select class="form-control" name="gender" id="gender">
                    <option value="">---Select---</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
                @error('gender')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label for="disability">Disability</label>
                <select class="form-control" name="disability"  id="disability">
                    <option value="">---Select---</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
                @error('disability') 
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label for="identification">Means of Identification</label>
                <input type="file" name="identification" id="identification" class="form-control" required>
                @error('identification')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label for="address">Address</label>
                <textarea name="address" class="form-control" id="address" placeholder="Enter Address"></textarea>
                @error('address')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label for="passport">Passport Photograph</label>
                <input type="file" name="passport" id="passport" class="form-control" required>
                @error('passport')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>


            <button type="submit" class="btn btn-primary">Update</button>
        </form>


    </div>
@endsection