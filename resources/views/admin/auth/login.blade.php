<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.layouts.head')
    <title>Login Admin</title>
</head>

<body>
    <main class="d-flex w-80">
        <div class="container pt-5">
            <div class="row pt-5">
                <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                    <div class="">
                        <div class="card rounded-4">
                            <div class="card-body">
                                <div class="m-sm-3">

                                    <div class="text-start mt-4">
                                        <p class="lead">
                                            <strong>Welcome To Login </strong>
                                            <hr />
                                        </p>
                                    </div>

                                    <form action="{{ route('loginProses') }}" method="post" autocomplete="off">
                                        @csrf
                                        {{-- Tampilkan error global jika autentikasi gagal --}}
                                        @if ($errors->has('email'))
                                            <div class="alert alert-danger text-center">{{ $errors->first('email') }}
                                            </div>
                                        @endif

                                        <div class="mb-3">
                                            <label class="form-label">Email</label>
                                            <input
                                                class="form-control form-control-lg @error('email') is-invalid @enderror"
                                                type="text" name="email" placeholder="example@mail.com"
                                                value="{{ old('email') }}" />
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Password</label>
                                            <input class="form-control form-control-lg" type="password" name="password"
                                                placeholder="******" />
                                        </div>

                                        <div class="d-grid gap-2 mt-3">
                                            <button type="submit" class="btn btn-lg btn-primary">
                                                Masuk
                                            </button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pt-5">
                <center class="pt-5">
                    <strong>Powered by b-tech {{ date('Y') }}</strong>
                </center>
            </div>
        </div>
    </main>

    <script src="js/app.js"></script>

</body>

</html>
