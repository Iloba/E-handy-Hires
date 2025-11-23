@extends('layouts.dashboard')

@section('content')
    <div class="container">
        {{-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div> --}}
        @if (Auth::user()->role == 'employer')
            <div class="row">
                <div class="col-md-4 stretch-card grid-margin">
                    <div class="card bg-gradient-danger card-img-holder text-white">
                        <div class="card-body">
                            <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                            <h4 class="font-weight-normal mb-3">Number of Domestic Staff
                            </h4>
                            <h3>

                                @php
                                    $staffCount = \App\Models\User::where('role', 'domestic_staff')->count();

                                @endphp
                                {{ $staffCount }}
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 stretch-card grid-margin">
                    <div class="card bg-gradient-info card-img-holder text-white">
                        <div class="card-body">
                            <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                            <h4 class="font-weight-normal mb-3">Number of Skills
                            </h4>
                            <h3>
                                @php
                                    $skillCount = \App\Models\Skill::count();
                                @endphp
                                {{ $skillCount }}

                            </h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 stretch-card grid-margin">
                    <div class="card bg-gradient-success card-img-holder text-white">
                        <div class="card-body">
                            <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                            <h4 class="font-weight-normal mb-3">Number of Unique Experiences
                            </h4>
                            <h3>
                                @php
                                    $experienceCount = \App\Models\Experience::distinct('name_of_workplace')->count(
                                        'name_of_workplace',
                                    );
                                @endphp
                                {{ $experienceCount }}
                            </h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Domestic Staff</h4>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th> Staff </th>
                                            <th> Skill </th>
                                            <th> Status </th>
                                            <th> Gender</th>
                                            <th> Age </th>
                                            <th> More Details </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $staff = \App\Models\User::where('role', 'domestic_staff')->get();

                                        @endphp
                                        @forelse ($staff as $st)
                                            <tr>
                                                <td>
                                                    <img src="{{ asset('storage/Passport_Photographs/' . $st->photo) }}"
                                                        class="me-2" alt="image">
                                                    {{ $st->full_name }}
                                                </td>
                                                <td> {{ $st->skills()->first()->skill_type }}</td>
                                                <td>
                                                    <label class="badge badge-gradient-success">Approved</label>
                                                </td>
                                                <td> {{ $st->gender }} </td>
                                                <td> {{ $st->age }} </td>
                                                <td>
                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-primary btn-sm  d-block mx-auto"
                                                        data-toggle="modal" data-target="#exampleModal-{{ $st->id }}">
                                                        <i class="mdi mdi-eye-outline"></i>
                                                    </button>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="exampleModal-{{ $st->id }}"
                                                        tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                                        {{ $st->full_name }}</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="row mb-3">
                                                                        <div class="col-md-3">
                                                                            <img style=""
                                                                                src="{{ asset('storage/Passport_Photographs/' . $st->photo) }}"
                                                                                class="img-fluid rounded w-100 h-100"
                                                                                alt="image">
                                                                        </div>
                                                                           <div class="col-md-4">
                                                                            <h5>Skills:</h5>
                                                                            <ul>
                                                                                @foreach ($st->skills as $skill)
                                                                                    <li>{{ $skill->skill_type }}
                                                                                        {{ $skill->proficiency_level }}
                                                                                    </li>
                                                                                @endforeach
                                                                            </ul>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <h5>Experiences:</h5>
                                                                            <ul>
                                                                                @foreach ($st->experiences as $experience)
                                                                                    <li>
                                                                                        {{ $experience->name_of_workplace }}
                                                                                        <br>

                                                                                        Start Date:
                                                                                        {{ \Carbon\Carbon::parse($experience->start_date)->format('F d, Y') }}
                                                                                        <br>
                                                                                        End Date:
                                                                                        {{ \Carbon\Carbon::parse($experience->end_date)->format('F d, Y') }}

                                                                                    </li>
                                                                                @endforeach
                                                                            </ul>
                                                                        </div>


                                                                        </div>
                                                                    

                                                                        <div class="row ">
                                                                            <div class="col-md-6">
                                                                                <a href=""
                                                                                    class="btn btn-primary ">Hire</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">Close</button>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <p>No staff</p>
                                        @endforelse




                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if (Auth::user()->role == 'domestic_staff')
            <div class="row">
                <div class="col-md-4 stretch-card grid-margin">
                    <div class="card bg-gradient-danger card-img-holder text-white">
                        <div class="card-body">
                            <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                            <h4 class="font-weight-normal mb-3">Number Skills
                            </h4>
                            <h3>100</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 stretch-card grid-margin">
                    <div class="card bg-gradient-info card-img-holder text-white">
                        <div class="card-body">
                            <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                            <h4 class="font-weight-normal mb-3">Contracts
                            </h4>
                            <h3>100</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 stretch-card grid-margin">
                    <div class="card bg-gradient-success card-img-holder text-white">
                        <div class="card-body">
                            <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                            <h4 class="font-weight-normal mb-3">Number of Experiences
                            </h4>
                            <h3>100</h3>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        {{-- <div class="row">
        <div class="col-md-7 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Project Status</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th> # </th>
                                    <th> Name </th>
                                    <th> Due Date </th>
                                    <th> Progress </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td> 1 </td>
                                    <td> Herman Beck </td>
                                    <td> May 15, 2015 </td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar bg-gradient-success"
                                                role="progressbar" style="width: 25%"
                                                aria-valuenow="25" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td> 2 </td>
                                    <td> Messsy Adam </td>
                                    <td> Jul 01, 2015 </td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar bg-gradient-danger"
                                                role="progressbar" style="width: 75%"
                                                aria-valuenow="75" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td> 3 </td>
                                    <td> John Richards </td>
                                    <td> Apr 12, 2015 </td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar bg-gradient-warning"
                                                role="progressbar" style="width: 90%"
                                                aria-valuenow="90" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td> 4 </td>
                                    <td> Peter Meggik </td>
                                    <td> May 15, 2015 </td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar bg-gradient-primary"
                                                role="progressbar" style="width: 50%"
                                                aria-valuenow="50" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td> 5 </td>
                                    <td> Edward </td>
                                    <td> May 03, 2015 </td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar bg-gradient-danger"
                                                role="progressbar" style="width: 35%"
                                                aria-valuenow="35" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td> 5 </td>
                                    <td> Ronald </td>
                                    <td> Jun 05, 2015 </td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar bg-gradient-info"
                                                role="progressbar" style="width: 65%"
                                                aria-valuenow="65" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-white">Todo</h4>
                    <div class="add-items d-flex">
                        <input type="text" class="form-control todo-list-input"
                            placeholder="What do you need to do today?">
                        <button class="add btn btn-gradient-primary font-weight-bold todo-list-add-btn"
                            id="add-task">Add</button>
                    </div>
                    <div class="list-wrapper">
                        <ul class="d-flex flex-column-reverse todo-list todo-list-custom">
                            <li>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="checkbox" type="checkbox"> Meeting with Alisa
                                    </label>
                                </div>
                                <i class="remove mdi mdi-close-circle-outline"></i>
                            </li>
                            <li class="completed">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="checkbox" type="checkbox" checked> Call John
                                    </label>
                                </div>
                                <i class="remove mdi mdi-close-circle-outline"></i>
                            </li>
                            <li>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="checkbox" type="checkbox"> Create invoice
                                    </label>
                                </div>
                                <i class="remove mdi mdi-close-circle-outline"></i>
                            </li>
                            <li>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="checkbox" type="checkbox"> Print Statements
                                    </label>
                                </div>
                                <i class="remove mdi mdi-close-circle-outline"></i>
                            </li>
                            <li class="completed">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="checkbox" type="checkbox" checked> Prepare for
                                        presentation </label>
                                </div>
                                <i class="remove mdi mdi-close-circle-outline"></i>
                            </li>
                            <li>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="checkbox" type="checkbox"> Pick up kids from
                                        school </label>
                                </div>
                                <i class="remove mdi mdi-close-circle-outline"></i>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    </div>
@endsection
