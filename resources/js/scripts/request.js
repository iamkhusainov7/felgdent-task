import axios from 'axios';

export const request = {
    read, create, edit, deleteItem
}

async function create(route, data, successMessage) {
    try {
        let res = await axios.post(route, data, {
            headers: {
                'X-CSRF-TOKEN': $(`meta[name="csrf-token"]`).attr('content')
            }
        });

        successHandle(
            successMessage ?? 'Data has been successfully created!'
        );

        return res;
    } catch (e) {
        return errorHandle(e)
    };
}

async function edit(route, data, successMessage) {
    try {
        let res = await axios.put(route, data, {
            headers: {
                'X-CSRF-TOKEN': $(`meta[name="csrf-token"]`).attr('content'),
            }
        });

        successHandle( successMessage ?? 'Data has been successfully updated!');

        return res;
    } catch (e) {
        return errorHandle(e)
    };
}

async function read(route, params) {
    try {
        const res = await axios.get(route, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            },
            params
        });

        return res.data;
    }
    catch (e) {
        return errorHandle(e);
    }
}

async function deleteItem(route, params) {
    try {
        const res = await axios.delete(route, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
            },
            params
        });

        successHandle('Data was successfully deleted!');

        return res.data;
    }
    catch (e) {
        return errorHandle(e);
    }
}

function errorHandle(error) {
    if (error.response) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: error.response.data.message,
            timer: 1500,
        });

        console.error('Error', error.response);

        throw error.response;
    } else if (error.request) {
        // The request was made but no response was received
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Something went wrong!',
            timer: 1500,
        });
        console.error(error.request);
    } else {
        // Something happened in setting up the request that triggered an Error
        console.error('Error', error);
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: error.message,
            timer: 1500,
        });
    }

    throw error;
}

function successHandle(message, showButton = false) {
    return Swal.fire({
        icon: 'success',
        title: message,
        showConfirmButton: showButton,
        timer: 1500,
    });
}