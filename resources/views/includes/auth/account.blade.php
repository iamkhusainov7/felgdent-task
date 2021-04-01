<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 p-t-20">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width d-flex">
                <input id="email" readonly value="{{$account->email ?? ''}}" class="mdl-textfield__input">
                <label class="mdl-textfield__label" for="email">Email</label>
            </div>
        </div>
        <div class="col-lg-6 p-t-20">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                <input data-rule-required="true" data-rule-maxLength="60" id="firstname" value="{{$account['firstname'] ?? ''}}" name="firstname" class="mdl-textfield__input" type="text">
                <label for="firstname" class="mdl-textfield__label">First Name<span class="text-danger">*</span></label>
            </div>
        </div>
        <div class="col-lg-6 p-t-20">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                <input data-rule-required="true" data-rule-maxLength="60" id="surname" value="{{$account['surname'] ?? ''}}" name="surname" class="mdl-textfield__input" type="text">
                <label class="mdl-textfield__label">Last Name<span class="text-danger">*</span></label>
            </div>
        </div>
        <div class="col-lg-6 p-t-20">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                <input data-rule-required="true" id="bday" name="bday" data-default-date="{{isset($account['bday']) ? date('d.m.Y', strtotime($account['bday'])) : ''}}" class="mdl-textfield__input flatpickr-input datetime" type="date" id="bday">
                <label class="mdl-textfield__label" for="bday">Birth Date<span class="text-danger">*</span></label>
            </div>
        </div>
        <div class="col-lg-6 p-t-20">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                <input id="old-password" data-rule-required="true" type="password" name="old-password" autocomplete="current-password" class="mdl-textfield__input" type="text">
                <label for="old-password" class="mdl-textfield__label">Current password <span class="text-danger">*</span></label>
            </div>
        </div>
        <div class="col-lg-6 p-t-20">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                <input id="password" type="password" name="new-password" autocomplete="current-password" class="mdl-textfield__input" type="text">
                <label for="password" class="mdl-textfield__label">New password</label>
            </div>
        </div>
        <div class="col-lg-6 p-t-20">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width d-flex">
                <input id="group" readonly value="{{$account->group->name ?? ''}}" class="mdl-textfield__input">
                <label class="mdl-textfield__label" for="email">Group name</label>
            </div>
        </div>
        <div class="col-lg-6 p-t-20">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                <input id="password-confirm" type="password" name="new-password_confirmation" autocomplete="current-password" class="mdl-textfield__input" type="text">
                <label class="mdl-textfield__label">Password confirmation</label>
            </div>
        </div>
    </div>
</div>