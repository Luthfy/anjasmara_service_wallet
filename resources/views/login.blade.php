<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
        <div>

            @if (session('status'))
            <div>
                {{ session('status') }}
            </div>
            @endif

            <form action="{{ route('login') }}" method="post">
                @csrf
                {{-- Input Email --}}
                <div class="mb-4">
                    <label for="email" class="sr-only">Email</label>
                    <input type="email" name="email" id="email" placeholder="Your email address" value="{{ old('email') }}">
                </div>

                {{-- Input Password --}}
                <div class="mb-4">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Input a password"  value="">
                </div>

                {{-- Remember Me --}}
                <div>
                    <div>
                        <input type="checkbox" name="remember" id="remember">
                        <label for="remember">Remember me</label>
                    </div>
                </div>

                {{-- Submit Button   --}}
                <div>
                    <button type="submit">Login</button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>
