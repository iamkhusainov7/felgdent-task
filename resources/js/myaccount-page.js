import { request } from './scripts/request';

const form = $("#form").validate({
    errorElement: 'span',
    errorClass: "mdl-textfield__error",
    focusInvalid: false, // do not focus the last invalid input
});

flatpickr(`.datetime`, {
    dateFormat: "d.m.Y",
    allowInput: true,
    onOpen: function (selectedDates, dateStr, instance) {
        instance.setDate(instance.input.value, false);
    },
});

$('#form').on('submit', async (e) => {
    e.preventDefault();
    
    if (
        !form.valid()
    ) {
        return;
    }

    $(this).children(':input[value=""]').attr("disabled", "disabled");

    const action = e.delegateTarget.action;
    let dataToBeSent = getInputValues(e.currentTarget);

    for (let key in dataToBeSent) {
        console.log(key)
    }
    
    try {
        let result = await request.create(action, dataToBeSent);

        window.location = result.data.redirect;
    } catch (error) {
        switch (error.status) {
            case 422:
                fillErrors(error.data.errors, "form")
                break;
        }
    }
});

function fillErrors(error, form) {
    for (let key in error) {
        generateErrorLabel(error[key], key, form)
    }
}

function generateErrorLabel(message, id, form) {
    let error = `
        <span id="${id}-error-server" class="mdl-textfield__error" for="${id}">${message}</span>
    `;

    $(error).insertAfter(`#${form} *[name="${id}"]`);
}

function getInputValues() {
    const formData = new FormData(
        document.getElementById('form')
    );

    if (
        !formData.get('photo')
    ) {
        formData.delete('photo');
    }

    if (
        !formData.get('new-password')
    ) {
        formData.delete('new-password');
    }
    
    return formData;
}
