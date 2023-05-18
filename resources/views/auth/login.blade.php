<x-main>
    <div class="container mt-5">
        <div class="row">
            <div class="col-8 mx-auto">
                <h1>Effettua il Login</h1>
                <form action="{{route('login')}}" method="POST">
                @csrf
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control">
                            @error('email') <span class="small text-danger">{{$message}}</span>@enderror
                        </div>
                        <div class="col-12">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control">
                            @error('password') <span class="small text-danger">{{$message}}</span>@enderror
                        </div>
                        <div>
                            <button type="submit" class="btn btn-warning">Accedi</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="spazio"></div>
    <div class="spazio"></div>
</x-main>