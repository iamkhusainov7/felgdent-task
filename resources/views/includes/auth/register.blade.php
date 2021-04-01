<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 p-t-20">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                <input data-rule-required="true" data-rule-maxLength="60" id="firstname" value="{{$user['firstname'] ?? ''}}" name="firstname" class="mdl-textfield__input" type="text">
                <label for="firstname" class="mdl-textfield__label">First Name<span class="text-danger">*</span></label>
            </div>
        </div>
        <div class="col-lg-6 p-t-20">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                <input data-rule-required="true" data-rule-maxLength="60" id="surname" value="{{$user['surname'] ?? ''}}" name="surname" class="mdl-textfield__input" type="text">
                <label class="mdl-textfield__label">Last Name<span class="text-danger">*</span></label>
            </div>
        </div>
        <div class="col-lg-6 p-t-20">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width d-flex">
                <input required="required" name="email" autocomplete="email" autofocus id="email" @if(isset($user)) readonly @endif value="{{$user->email ?? ''}}" class="@if(!isset($user))w-75 @endif mdl-textfield__input">
                <label class="mdl-textfield__label" for="email">Email @if(!isset($user))<span class="text-danger">*</span>@endif</label>
            </div>
        </div>
        <div class="col-lg-6 p-t-20">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height select-width">
                <input data-rule-required="true" value="{{$user->role ?? ''}}" id="role" name="role" class="mdl-textfield__input" type="text" readonly tabIndex="-1">
                <label for="role" class="pull-right margin-0">
                    <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
                </label>
                <label for="role" class="mdl-textfield__label">User role<span class="text-danger">*</span></label>
                <ul data-mdl-for="role" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                    <li class="mdl-menu__item" data-val="admin">Admin</li>
                    <li class="mdl-menu__item" data-val="user">User</li>
                </ul>
            </div>
        </div>
        <div class="col-lg-6 p-t-20">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                <input data-rule-required="true" id="bday" name="bday" data-default-date="{{isset($user['bday']) ? date('d.m.Y', strtotime($user['bday'])) : ''}}" class="mdl-textfield__input flatpickr-input datetime" type="date" id="bday">
                <label class="mdl-textfield__label" for="bday">Birth Date<span class="text-danger">*</span></label>
            </div>
        </div>
        <div class="col-lg-6 p-t-20">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                <input id="password" type="password" name="password" autocomplete="current-password" class="mdl-textfield__input" type="text">
                <label for="password" class="mdl-textfield__label">Password @if(!isset($user))<span class="d-none text-danger">*</span> @endif</label>
            </div>
        </div>
        <div class="col-lg-6 p-t-20">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                <input id="password-confirm" type="password" name="password_confirmation" autocomplete="current-password" class="mdl-textfield__input" type="text">
                <label class="mdl-textfield__label">Password confirmation @if(!isset($user))<span class="d-none text-danger">*</span> @endif</label>
            </div>
        </div>
        <div class="col-lg-6 p-t-20">
            <div class="mdl-textfield mdl-textfield--floating-label mdl-js-textfield txt-full-width">
                <select required name="group_id" id="group_id">
                    <option value="">Select group...</option>
                    @foreach($groups as $gr)
                    <option @if(isset($user) && $gr->id === $user->group_id) selected="selected" @endif value="{{$gr->id}}">{{$gr->name}}</option>
                    @endforeach
                </select>
                <label class="mdl-textfield__label" for="division" class="control-label">Group<span class="text-danger d-none">*</span></label><i class="bar"></i>
            </div>
        </div>
    </div>
</div>