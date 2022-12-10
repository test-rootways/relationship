<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <a href="/" class="btn btn-dark btn-sm float-end">Back</a>
        <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" id="username" class="form-control" value="{{ old('username') }}" required>
                @error('username')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="first_name" class="form-label">first name</label>
                <input type="text" name="first_name" id="first_name" class="form-control" required value="{{ old('first_name') }}">
                @error('first_name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="last_name" class="form-label">last name</label>
                <input type="text" name="last_name" id="last_name" class="form-control" required value="{{ old('last_name') }}">
                @error('last_name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" required value="{{ old('email') }}">
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="age" class="form-label">Age</label>
                <input type="number" name="age" id="age" class="form-control" required value="{{ old('age') }}">
                @error('age')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="profile_picture" class="form-label">profile picture</label>
                <input type="file" name="profile_picture" id="profile_picture" class="form-control" required >
                    @error('profile_picture')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
            </div>
            <div class="mb-3">
                <label for="hobbies" class="form-label">Check Hobbies</label>
                @foreach ($hobbies as $item)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="hobbies[]" value="{{ $item->id }}" id="{{ $item->id }}-checkbox"  @if(is_array(old('hobbies')) && in_array($item->id, old('hobbies'))) checked @endif>
                        <label class="form-check-label" for="{{ $item->id }}-checkbox">
                            {{ $item->name }}
                        </label>
                    </div>
                @endforeach
            </div>
            <div class="mb-3 float-end">
                <button type="submit" class="btn btn-sm btn-primary">Save</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
