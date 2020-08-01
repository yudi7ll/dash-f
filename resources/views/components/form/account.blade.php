<form method="post" action="{{ route('user.update_account', $user) }}">
    @csrf
    @method('PUT')
    <div class="form-label-group">
        <input type="text" name="name" value="{{ old('name') ?: $user->name }}" id="inputName" class="form-control @error('name') is-invalid @enderror" placeholder="Name" required>
        <label for="inputName">Name</label>

        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-label-group">
        <input type="text" name="username" value="{{ old('username') ?: $user->username }}" id="inputUsername" class="form-control @error('username') is-invalid @enderror" placeholder="Username" required>
        <label for="inputUsername">Username</label>

        @error('username')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-label-group">
        <input type="email" name="email" value="{{ old('email') ?: $user->email }}" id="inputEmail" class="form-control @error('email') is-invalid @enderror" placeholder="Email address" required>
        <label for="inputEmail">Email address</label>

        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <button class="btn btn-dark" type="submit">Save</button>
</form>
