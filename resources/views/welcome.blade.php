<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>

    <div class="container mt-5">
        <!-- Button trigger modal -->
        <a class="btn btn-primary mb-5" href="{{ route('user.create') }}">Create new users</a>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Username</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($user as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td><img src="{{ asset('profile_picture/'.$item->profile_picture) }}" alt="{{ $item->username }}" class="img-thumbnail" style="height: 50px;width:50px"></td>
                    <td>{{ $item->first_name }} {{ $item->last_name }} </td>
                    <td>{{ $item->username }}</td>
                    <td>{{ $item->status == '1' ? 'Active' : 'Inactive' }}</td>
                    <td>
                        <a href="{{ route('user.edit',$item->id ) }}" class="btn btn-sm btn-secondary">Edit</a>
                        <form action="{{ route('user.destroy',$item) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                          @csrf
                          @method('DELETE')
                          <input type="hidden" name="id" value="{{ $item->id }}">
                          <button class="btn btn-sm btn-danger" type="Submit">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>
