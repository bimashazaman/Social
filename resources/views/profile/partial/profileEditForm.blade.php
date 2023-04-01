<div class="card" style='background-color: #141A29;'>
    <div class="card-body">
        <form method="POST" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group row mt-2">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                        name="name" value="{{ old('name', $user->name) }}" autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row mt-2">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email', $user->email) }}" autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row mt-2">
                <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                <div class="col-md-6">
                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror"
                        name="username" value="{{ old('username', $user->username) }}" autocomplete="username">

                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>



            <div class="form-group row mt-2">

                <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>
                <div class="col-md-6">
                    <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror"
                        name="phone" value="{{ old('phone', $user->phone) }}" autocomplete="phone">
                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>
                <div class="col-md-6 mt-2">
                    <input id="address" type="text" class="form-control @error('address') is-invalid @enderror"
                        name="address" value="{{ old('address', $user->address) }}" autocomplete="address">

                    @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group row mt-2">
                    <label for="age" class="col-md-4 col-form-label text-md-right">{{ __('Age') }}</label>
                    <div class="col-md-6">
                        <input id="age" type="text" class="form-control @error('age') is-invalid @enderror"
                            name="age" value="{{ old('age', $user->age) }}" autocomplete="age">

                        @error('age')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>
                    <div class="col-md-6 mt-2">
                        <input id="gender" type="text" class="form-control @error('gender') is-invalid @enderror"
                            name="gender" value="{{ old('gender', $user->gender) }}" autocomplete="gender">

                        @error('gender')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                </div>
                <div class="form-group row mt-2">
                    <label for="avatar" class="col-md-4 col-form-label text-md-right">{{ __('Avatar') }}</label>
                    <div class="col-md-6">
                        <input id="avatar" type="file" class="form-control @error('avatar') is-invalid @enderror"
                            name="avatar" value="{{ old('avatar', $user->avatar) }}" autocomplete="avatar">
                        @error('avatar')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <label for="cover" class="col-md-4 col-form-label text-md-right">{{ __('Cover') }}</label>
                    <div class="col-md-6 mt-2">
                        <input id="cover" type="file"
                            class="form-control @error('cover') is-invalid @enderror" name="cover"
                            value="{{ old('cover', $user->cover) }}" autocomplete="cover">

                        @error('cover')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                </div>

                <div class="form-group row mt-2">
                    <label for="bio" class="col-md-4 col-form-label text-md-right">{{ __('Bio') }}</label>
                    <div class="col-md-6">
                        <input id="bio" type="text" class="form-control @error('bio') is-invalid @enderror"
                            name="bio" value="{{ old('bio', $user->bio) }}" autocomplete="bio">

                        @error('bio')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <label for="website" class="col-md-4 col-form-label text-md-right">{{ __('Website') }}</label>
                    <div class="col-md-6 mt-2">
                        <input id="website" type="text"
                            class="form-control @error('website') is-invalid @enderror" name="website"
                            value="{{ old('website', $user->website) }}" autocomplete="website">

                        @error('website')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                </div>
                <div class="form-group row mt-2">
                    <label for="birthday" class="col-md-4 col-form-label text-md-right">{{ __('Birthday') }}</label>
                    <div class="col-md-6">
                        <input id="birthday" type="date"
                            class="form-control @error('birthday') is-invalid @enderror" name="birthday"
                            value="{{ old('birthday', $user->birthday) }}" autocomplete="birthday">

                        @error('birthday')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>


                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
