<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('/css/main.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>UrlShortener</title>
</head>
<body>
    <div class="container" style="margin: 0rem 5rem 0rem 5rem ">
        <h1>URL Shortener</h1>
        <h5>Add a Link</h5>
        <form action="{{route ('url.store')}}"  method="POST">
            @csrf
            <div style="margin: 1rem 15rem 1rem 0rem" class="form-group">
                <label for="url">Url</label>
                <input type="text" name="url" id="url" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Short Url</th>
                    <th scope="col">Url</th>
                    <th scope="col">Times Clicked</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($urls as $url)
                    <tr>
                        <td>
                            <a href="{{$url->url_short}}">{{$url->url_short}}</a>
                        </td>
                        <td>
                            <a href="{{$url->url}}">{{$url->url}}</a>
                        </td>
                        <td>
                            <p style="margin: 0px 10px">{{$url->short_url_access_count}}</p>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
</body>

