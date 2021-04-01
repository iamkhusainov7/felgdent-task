import { request } from './scripts/request';
import { readFromItem, appendToItem, editToItem } from './scripts/item';

const form = $("#create-group").validate({
    errorElement: 'span',
    errorClass: "mdl-textfield__error",
    focusInvalid: false, // do not focus the last invalid input
});

const table = $('#group-table').DataTable();

const formEdit = $("#edit-group").validate({
    errorElement: 'span',
    errorClass: "mdl-textfield__error",
    focusInvalid: false, // do not focus the last invalid input
});

$('.division-select').select2({
    theme: "material",
    allowClear: true,
    placeholder: "Select division"
});

$('.supervisor-select').select2({
    theme: "material",
    allowClear: true,
    placeholder: "Select supervisor"
});

$('#create-group').on('submit', async (e) => {
    e.preventDefault();

    if (
        !form.valid()
    ) {
        return;
    }

    const action = e.delegateTarget.action;
    let dataToBeSent = getInputValues(e.currentTarget);

    try {
        let result = await request.create(action, dataToBeSent);

        $(`#create-item`).modal('hide');

        appendToTable(result.data.data);
        appendToItem(result.data.data);
    } catch (error) {
        switch (error.status) {
            case 422:
                fillErrors(error.data.errors, "create-group")
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

function editToTable(data) {
    const td = $("#group-table").find(`tr[data-item-id='${data.id}']`).find('td');

    $(td[1]).html(data.name);
}

$(document).on("click", "a.btn-primary, button.delete", async function (e) {
    const currentButton = $(this);
    const target = currentButton.data('target');
    const url = currentButton.data('url');

    if (target === 'delete-item') {
        $('#delete-group').attr('action', `${url}`);
        $(`#${target}`).modal('toggle');
        return;
    } else if (target != 'edit-item') {
        return;
    }

    try {
        const key = currentButton.data('group');
        const data = readFromItem(key);
        
        fillInputs(data, url);
        $('#edit-item').modal('toggle')
    } catch (e) {
        console.error(e)
    }
});

function fillInputs(data, updatePath) {
    const form = $('#edit-group');
    form.attr('action', updatePath);
    form.find('input[name="group-name"]').val(data.name);
}

$('#edit-group').on('submit', async (e) => {
    e.preventDefault();

    if (
        !formEdit.valid()
    ) {
        return;
    }

    const action = e.delegateTarget.action;
    let dataToBeSent = getInputValues(e.currentTarget);

    try {
        let result = await request.edit(action, dataToBeSent);

        $(`#edit-item`).modal('toggle');
        editToTable(result.data.data);
        editToItem(result.data.data);
    } catch (error) {
        switch (error.status) {
            case 422:
                fillErrors(error.data.errors, "edit-group")
                break;
        }
    }
});

$('#delete-group').on('submit', async (e) => {
    e.preventDefault();
    const action = e.delegateTarget.action;

    try {
        let result = await request.deleteItem(action);

        const id = action.match(/(\d+)/)[0];
        deleteFromTable(
            id
        );

        $(`#delete-item`).modal('toggle');
    } catch (error) {
        switch (error.status) {
            case 422:
                fillErrors(error.data.data, "edit-group")
                break;
        }
    }
});

function appendToTable(data) {
    const index = table.rows().count() + 1;

    const row = table.row.add([
        index,
        data.name,
        0,
        `<a href="{{route('group.show', $group->id)}}" class="btn btn-success btn-xs">
        <i class="fa fa-eye"></i>
        </a>
        <a data-group="${index - 1}" data-target="edit-item" data-url="${updateUrl.replace(/id/, data.id)}" title="Edit" class="btn btn-primary btn-xs">
            <i class="fa fa-pencil"></i>
        </a>
        <button data-url="${deleteUrl.replace(/id/, data.id)}" data-item-id="${data.id}" data-toggle="modal" data-target="delete-item" title="Delete" class="btn delete btn-danger btn-xs delete">
            <i class="fa fa-trash-o "></i>
        </button>`
    ]).draw().node();

    return $(row).attr('data-item-id', data.id);
}

function getInputValues(form) {
    const elements = $(form).serialize()
    return elements;
}

function deleteFromTable(id) {
    const tr = $(`tr[data-item-id='${id}']`);
    table.row(tr[0]).remove();
    $(tr[0]).remove();
}