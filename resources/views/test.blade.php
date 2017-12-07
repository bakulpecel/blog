<h1>{{ $data }}</h1>

@if (session()->has('success'))
    {{ session()->get('success') }}
@endif

<form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <input type="text" name="name" value="{{ old('name') }}"><br>
    @if ($errors->has('name'))
        {{ $errors->first('name') }}
    @endif
    <br>

    <input type="text" name="email" value="{{ old('email') }}"><br>
    @if ($errors->has('email'))
        {{ $errors->first('email') }}
    @endif
    <br>

    <input type="text" name="password"><br>
    @if ($errors->has('password'))
        {{ $errors->first('password') }}
    @endif
    <br>

    <input type="file" name="avatar"><br>
    @if ($errors->has('avatar'))
        {{ $errors->first('avatar') }}
    @endif
    <br>
    <button type="submit">Simpan</button>
</form>