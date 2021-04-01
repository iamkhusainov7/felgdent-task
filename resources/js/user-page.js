import { request } from './scripts/request';

const table = $('#user-table').DataTable();

$('#delete-user').on('submit', async (e) => {
    e.preventDefault();
    const action = e.delegateTarget.action;
    
    try {
        let result = await request.deleteItem(action);

        const id = result['item-id'];

        deleteFromTable(
            id
        );

        $(`#delete-item`).modal('toggle');
    } catch (error) {
        console.error(error)
    }
});

function deleteFromTable(id) {
    const tr = $(`tr[data-item-id='${id}']`);
    table.row(tr[0]).remove();
    $(tr[0]).remove();
}

$(document).on("click", "button.delete", async function (e) {
    const currentButton = $(this);
    const url = currentButton.data('url');
    $('#delete-user').attr('action', `${url}`);
    $(`#delete-item`).modal('toggle');
});