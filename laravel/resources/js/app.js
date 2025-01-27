import './bootstrap';

(function () {
    const removeButtons = document.querySelectorAll('.remove-button');

    removeButtons.forEach(button => {
        button.addEventListener('click', function () {
            const rowId = this.getAttribute('data-id');
            const row = document.getElementById(rowId);
            if (row) {
                row.remove();
            }
        });
    });

    function addTableRow() {
        const tbody = document.getElementById('params-table');
        const lineCode = 'row-' + Date.now();
        const newRow = `
            <tr class="border-b" id="${lineCode}">
                <td class="px-4 py-2">
                    <input type="text" name="spec[${lineCode}][name]" value="" required class="w-full p-2 border border-gray-300 rounded-md">
                </td>
                <td class="px-4 py-2">
                    <input type="text" name="spec[${lineCode}][value]" value="" required class="w-full p-2 border border-gray-300 rounded-md">
                </td>
                <td>
                    <button
                        data-id="${lineCode}"
                        class="remove-button bg-red-500 text-white p-2 rounded-full font-bold text-xl hover:bg-red-600 focus:outline-none">
                        -
                    </button>
                </td>
            </tr>
        `;

        tbody.insertAdjacentHTML('beforeend', newRow);

        const removeButton = document.querySelector(`#${lineCode} .remove-button`);
        removeButton.addEventListener('click', function () {
            const row = document.getElementById(lineCode);
            if (row) {
                row.remove();
            }
        });
    }

    const addButton = document.querySelector('.add-button');
    if (addButton) {
        addButton.addEventListener('click', addTableRow);
    }

})();
