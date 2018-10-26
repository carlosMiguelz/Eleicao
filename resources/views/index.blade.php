<!-- index.blade.php -->

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Index Page</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
  </head>
  <body>
    <div class="container">
    <br />
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
    <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Endereço</th>
        <th>Number</th>
        <th>Initials</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>
      
      @foreach($passports as $election)
      @php
        $date=date('Y-m-d', $election['date']);
        @endphp
      <tr>
        <td>{{$election['id']}}</td>
        <td>{{$election['name']}}</td>
        <td>{{$date}}</td>
        <td>{{$election['endereco']}}</td>
        <td>{{$election['number']}}</td>
        <td>{{$election['initials']}}</td>
        
        <td><a href="{{action('PassportController@edit', $election['id'])}}" class="btn btn-warning">Edit</a></td>
        <td>
          <form action="{{action('PassportController@destroy', $election['id'])}}" method="post">
            @csrf
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
  </body>
</html>