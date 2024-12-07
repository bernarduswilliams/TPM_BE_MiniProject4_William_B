<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>View Employee Data</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>  

<body>

  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Employee Data</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/create">Create</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/register">Register</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/login">Login</a>
        </li>
        </ul>
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            @auth
            <li class="nav-item">
              <b><a class="nav-link" href="#">Welcome, {{ Auth::user()->name }}</a></b>
            </li>
            <li class="nav-item">
              <b><a class="nav-link text-danger" href="/logout">Logout</a></b>
            </li>
          @endauth
        </ul>
      </div>
    </div>
  </nav>  


  <h1 class="text-center">View Employees Data</h1>

  <div class="d-flex justify-content-center align-items-center" style="height: 20vh;">
    <a href="/create">
      <button class="btn btn-success">Create</button>
    </a>
  </div>

  <div class="container">  <div class="row row-cols-md-4">  @foreach ($employees as $employee)
        <div class="col mb-3">  <div class="card" style="width: 18rem;">
            <img src="{{asset('/storage/images/'. $employee->image)}}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Name: {{$employee->name}}</h5>
              <p class="card-text">Reason to Join: {{$employee->reason}}</p>
              <p class="card-text">Join Date: {{$employee->join_date}}</p>
              <p class="card-text">Interest Scale: {{$employee->scale}}</p>
              <p class="card-text">Jobdesk: {{$employee->jobdesk->job_category}}</p>
              <a href="{{route('editEmployee', $employee->id)}}" class="btn btn-success">Edit</a>
              <form action="{{route('deleteEmployee', $employee->id)}}" method = "POST">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger">Delete</button>
              </form>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.utility.min.js" integrity="sha384-TCYTfyu1iUZGCVnROojhHhnvd3y3HsC8JA99mznrXn4csJ8hIMsDQiEOwNbhON2Q" crossorigin="anonymous"></script>
</body>
</html>
