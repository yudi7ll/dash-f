<h4>Change Password</h4>
<form method="post" action="{{ route('user.update_security', $user) }}">
    @csrf
    @method('PUT')

    <div class="form-label-group">
        <input type="password" name="password" id="inputPassword" placeholder="Old Password" class="form-control @error('password') is-invalid @enderror" required>
        <label for="inputPassword">Old Password</label>

        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-label-group">
        <input type="password" name="new_password" id="inputNewPassword" placeholder="New Password" class="form-control @error('new_password') is-invalid @enderror" required>
        <label for="inputNewPassword">New Password</label>

        @error('new_password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-label-group">
        <input type="password" name="new_password_confirmation" id="inputNewPasswordConfirmation" placeholder="Confirm New Password" class="form-control @error('new_password_confirmation') is-invalid @enderror" required>
        <label for="inputNewPasswordConfirmation">Confirm New Password</label>

        @error('new_password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <button class="btn btn-dark" type="submit">Save</button>
</form>
