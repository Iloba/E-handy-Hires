@extends('layouts.dashboard')
@section('content')
    <div class="card p-4">
        <h3 class="mb-3">Add Experience</h3>
        <form action="{{ route('save.experience') }}" method="POST" >
            @csrf
            <div class="form-group mb-4">
                <label for="name_of_workplace">Name of Workplace</label>
                <input type="text" name="name_of_workplace" class="form-control" placeholder="Enter name of Workplace" required>
                @error('name_of_workplace')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label for="start_date">Start Date</label>
                <input type="date" name="start_date" class="form-control" required>
                @error('start_date')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label for="end_date">End Date</label>
                <input type="date" name="end_date" class="form-control" required>
                @error('end_date')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label for="r_held">Responsibilities Held</label>
                <textarea name="r_held" id="r_held" class="form-control" placeholder="Responsibilities Held" required></textarea>
                @error('r_held')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label for="reference">Reference</label>
                <textarea name="reference" id="reference" class="form-control" placeholder="Referees" required></textarea>
                @error('reference')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>



          

            <button type="submit" class="btn btn-primary">Save Experience</button>
        </form>


    </div>
@endsection