<form id="profileForm" method="post" action="{{ route('user.update_profile', $user) }}">
    @csrf
    @method('put')

    <div class="form-label-group">
        <input type="text" name="bio" value="{{ old('bio') ?: $user->userinfo->bio }}" id="inputBio" placeholder="Tell about yourself." class="form-control @error('bio') is-invalid @enderror">
        <label for="inputBio">Your bio</label>

        @error('bio')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-label-group">
        <input type="text" name="work_as" value="{{ old('work_as') ?: $user->userinfo->work_as }}" id="inputWorkAs" class="form-control @error('work_as') is-invalid @enderror" placeholder="Work As">
        <label for="inputWorkAs">Work As</label>

        @error('work_as')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-label-group">
        <input type="text" name="work_at" value="{{ old('work_at') ?: $user->userinfo->work_at }}" id="inputWorkAt" class="form-control @error('work_at') is-invalid @enderror" placeholder="Work At">
        <label for="inputWorkAt">Work At</label>

        @error('work_at')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <h4>Links</h4>
    <div class="form-label-group">
        <input type="text" name="github" value="{{ old('github') ?: $user->userinfo->github }}" id="inputGithub" class="form-control @error('github') is-invalid @enderror" placeholder="Github">
        <label for="inputGithub">Github profile URL</label>

        @error('github')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-label-group">
        <input type="text" name="twitter" value="{{ old('twitter') ?: $user->userinfo->twitter }}" id="inputTwitter" class="form-control @error('twitter') is-invalid @enderror" placeholder="Twitter">
        <label for="inputGithub">Twitter profile URL</label>

        @error('twitter')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-label-group">
        <input type="text" name="linkedin" value="{{ old('linkedin') ?: $user->userinfo->linkedin }}" id="inputLinkedin" class="form-control @error('linkedin') is-invalid @enderror" placeholder="Linkedin">
        <label for="inputLinkedin">LinkedIn profile URL</label>

        @error('linkedin')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-label-group">
        <input type="text" name="instagram" value="{{ old('instagram') ?: $user->userinfo->instagram }}" id="inputInstagram" class="form-control @error('instagram') is-invalid @enderror" placeholder="Instagram">
        <label for="inputInstagram">Instagram profile URL</label>

        @error('instagram')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-label-group">
        <input type="text" name="facebook" value="{{ old('facebook') ?: $user->userinfo->facebook }}" id="inputFacebook" class="form-control @error('facebook') is-invalid @enderror" placeholder="Facebook">
        <label for="inputFacebook">Facebook profile URL</label>

        @error('facebook')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-label-group">
        <input type="text" name="website" value="{{ old('website') ?: $user->userinfo->website }}" id="inputWebsite" class="form-control @error('website') is-invalid @enderror" placeholder="Website">
        <label for="inputWebsite">Website profile URL</label>

        @error('website')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <button class="btn btn-dark" type="button" onclick="document.getElementById('profileForm').submit()">Save</button>
</form>
