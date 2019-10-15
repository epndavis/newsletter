<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>

<body>
    <div id="app" class="container">
        <div class="row mb-2">
            <div class="col">
                <register action="{{ route('api.register') }}"></register>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h4>Sign ups</h4>
                        @if (empty($emails))
                        <p>Nobody has signed up. So Sad!</p>
                        @else
                        <table class="table">
                            <tr>
                                <th>
                                    Email
                                </th>
                                <th>
                                    Fullname
                                </th>
                                <th>
                                    Action
                                </th>
                            </tr>
                            @foreach ($emails as $email)
                            <tr>
                                <td>
                                    {{ $email->email }}
                                </td>
                                <td>
                                    {{ $email->fullname() }}
                                </td>
                            </tr>
                            @endforeach
                        </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="{{ mix('/js/app.js') }}"></script>

</html>