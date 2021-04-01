let key = 0;

function appendToItem(data) {
    items[items.length] = data;
}

function readFromItem(item) {
    key = item;

    return items[item];
}

function editToItem(data) {
    items[key] = data;
}

export {
    appendToItem, editToItem, readFromItem
}
