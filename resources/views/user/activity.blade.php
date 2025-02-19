@extends('layout.user')

@section('contents')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Overview</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
</head>
<body>
<style>
    body {
        background: rgb(224 231 255);
    }

    .form-control:focus {
        box-shadow: none;
        border-color: #BA68C8;
    }

    .profile-button {
        background: rgb(30 64 175);
        box-shadow: none;
        border: none;
    }

    .profile-button:hover {
        background: #682773;
    }

    .profile-button:focus {
        background: #682773;
        box-shadow: none;
    }

    .profile-button:active {
        background: #682773;
        box-shadow: none;
    }

    .back:hover {
        color: #682773;
        cursor: pointer;
    }

    .labels {
        font-size: 11px;
    }

    .add-experience:hover {
        background: #BA68C8;
        color: #fff;
        cursor: pointer;
        border: solid 1px #BA68C8;
    }
</style>
<div class="container bg-white mt-5 mb-5">
  <div class="row">
      <!-- User Profile Section -->
      <div class="col-md-4 border-right">
          <div class="d-flex flex-column align-items-center text-center p-3 py-7">
              <img class="rounded-circle mt-5" width="150px" src="{{ $user->profile_image ? asset($user->profile_image) : 'https://as1.ftcdn.net/v2/jpg/03/46/83/96/1000_F_346839683_6nAPzbhpSkIpb8pmAwufkC7c5eD7wYws.jpg' }}">
              <span class="font-weight-bold">{{ $user->name }}</span>
              <span class="text-black-50">{{ $user->email }}</span>
              <a href="{{ route('userprofile.show') }}" class="btn btn-primary mt-4">Profile</a>
              
              <div class="card-body mt-4">
                  <div class="row">
                      <div class="col-sm-3">
                          <h6 class="mb-0">Name</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                          {{ $user->name }}
                      </div>
                  </div>
                  <hr>
                  <div class="row">
                      <div class="col-sm-3">
                          <h6 class="mb-0">Email</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                          {{ $user->email }}
                      </div>
                  </div>
                  <hr>
                  <div class="row">
                      <div class="col-sm-3">
                          <h6 class="mb-0">Phone</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                          {{ $user->phone ?? 'N/A' }}
                      </div>
                  </div>
                  <hr>
                  <div class="row">
                      <div class="col-sm-3">
                          <h6 class="mb-0">Address</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                          {{ $user->address ?? 'N/A' }}
                      </div>
                  </div>
              </div>
          </div>
      </div>
      
      <!-- Activity Section -->
      <div class="col-md-8">
          <div class="p-3 py-5">
              <div class="d-flex justify-content-start mb-6">
                  <a href="{{ url('overview') }}" class="btn btn-primary mr-2">Overview</a>
                  <a href="{{ url('activity') }}" class="btn btn-primary">Activity</a>
              </div>
              <hr style="background-color: blue; height: 5px;">
              
              <div class="card-body">
                  <h3 class="mb-4">User Activity</h3>
                  @if($activities->isEmpty())
                      <p>No activity found.</p>
                  @else
                      <ul class="list-group">
                          @foreach($activities as $activity)
                              <li class="list-group-item">
                                  <strong>{{ $activity->crime_type }}</strong> - {{ $activity->description }}<br>
                                  <small>Reported on {{ $activity->created_at->format('jS F Y') }}</small>
                              </li>
                          @endforeach
                      </ul>
                  @endif
              </div>
          </div>
      </div>
  </div>
</div>
</body>
</html>
@endsection
