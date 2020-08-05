<form method="post" action="{{ route('user.update_account', $user) }}" enctype="multipart/form-data">
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
    <div class="input-group mb-3">
        <div class="align-self-center">
            <a href="{{ route('cover', $user->cover) }}">
                <img class="img-circle mr-2" src="{{ route('cover.thumb', $user->cover) }}" alt="{{ $user->username }}"/>
            </a>
        </div>
        <div class="custom-file">
            <input class="custom-file-input @error('cover') is-invalid @enderror" id="inputCover" type="file" accept=".jpg,.jpeg,.png,.gif,.webp" name="cover">
            <label class="custom-file-label" for="inputCover">Choose file</label>
        </div>
        @error('cover')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <button class="btn btn-dark" type="submit">Save</button>
</form>
<script>
    document.getElementById('inputCover').addEventListener('change', ({ target }) => {
        target.parentNode.querySelector('label').textContent = target.files[0].name;
    });
</script>
