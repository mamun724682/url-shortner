<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Url Shortner</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>

<div class="container mt-5">
    <form action="" method="post">
        @csrf

        <div class="input-group mb-3">
            <input type="text" class="form-control" name="link" placeholder="Link">
            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Submit</button>
        </div>
    </form>

    @if (Session::has('last_short_link_code'))
        <a href="{{ route('show', Session::get('last_short_link_code')) }}" class="w-100 btn btn-info" target="_blank">{{ route('show', Session::get('last_short_link_code')) }}</a>
    @endif

{{--    Validation errors alert--}}
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger pb-0">
                <p>{{ $error }}</p>
            </div>
        @endforeach
    @endif
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>
