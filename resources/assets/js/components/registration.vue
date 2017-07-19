<template>
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form  id="RegistrationForm" @submit.prevent='greet' class="form-horizontal" method="POST" action="{!! route('register') !!}" enctype="multipart/form-data">
                        {{csrf_field() !!}

                        <div class="form-group{!! $errors->has('name') ? ' has-error' : '' !!}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{!! old('name') !!}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{!!$errors->first('name') !!}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{!! $errors->has('email') ? ' has-error' : '' !!}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{!! old('email') !!}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{!! $errors->first('email') !!}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{!! $errors->has('user-name') ? ' has-error' : '' !!}">
                            <label for="user-name" class="col-md-4 control-label">Username</label>

                            <div class="col-md-6">
                                <input id="user-name" type="text" class="form-control" name="user-name" value="{!! old('user-name') !!}" required>

                                @if ($errors->has('user-name'))
                                    <span class="help-block">
                                        <strong>{!! $errors->first('user-name') !!}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{!! $errors->has('gender') ? ' has-error' : '' !!}">
                            <label for="gender" class="col-md-4 control-label">Gender</label>

                            <div class="col-md-6">
                                <select name="gender" id="gender">
                                    <option value="1">Male</option>
                                    <option value="2">Female</option>
                                    <option value="3">Neither</option>
                                </select>
                                @if ($errors->has('gender'))
                                    <span class="help-block">
                                        <strong>{!! $errors->first('gender') !!}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{!! $errors->has('bio') ? ' has-error' : '' !!}">
                            <label for="bio" class="col-md-4 control-label">Bio</label>

                            <div class="col-md-6">
                                <textarea id="bio" class="form-control" name="bio" required>
                                </textarea>
                                @if ($errors->has('bio'))
                                    <span class="help-block">
                                        <strong>{!! $errors->first('bio') !!}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{!! $errors->has('profile-picture') ? ' has-error' : '' !!}">
                            <label for="profile-picture" class="col-md-4 control-label">profile-picture</label>
                            <div class="col-md-6">
                                <input type="file" class="form-control" name="profile-picture" id="profile-picture">
                                @if ($errors->has('profile-picture'))
                                    <span class="help-block">
                                        <strong>{!! $errors->first('profile-picture') !!}</strong>
                                    </span>
                                @endif
                                
                            </div>
                        </div>

                        <div class="form-group{!! $errors->has('password') ? ' has-error' : '' !!}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{!! $errors->first('password') !!}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    export default {
        data(){

        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
<style lang="sass">

</style>