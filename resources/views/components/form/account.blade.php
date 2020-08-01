<form method="post" action="{{ route('user.update_account', $user) }}">
    @csrf
    @method('put')
    <div class="form-label-group">
        <input type="text" name="name" value="{{ old('name') ?: $user->name }}" id="inputName" class="form-control" placeholder="Name" required>
        <label for="inputName">Name</label>
    </div>
    <div class="form-label-group">
        <input type="text" name="username" value="{{ old('username') ?: $user->username }}" id="inputUsername" class="form-control" placeholder="Username" required>
        <label for="inputUsername">Username</label>
    </div>
    <div class="form-label-group">
        <input type="email" name="email" value="{{ old('email') ?: $user->email }}" id="inputEmail" class="form-control" placeholder="Email address" required>
        <label for="inputEmail">Email address</label>
    </div>

    <button class="btn btn-dark" type="submit">Save</button>
</form>
