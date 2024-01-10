function openModal(modalId) {
    var modal = document.getElementById(modalId);
    modal.style.display = 'block';
} 

function openAddCustomerModal() {
    openModal('addCustomerModal');
}

function closeModal(modalId) {
    document.getElementById(modalId).style.display = 'none';
}

function addCustomer(customerId, customerName, customerEmail, customerTicket) {
    // Get input
    var customerId = document.getElementById('customerId').value;
    var customerName = document.getElementById('customerName').value;
    var customerEmail = document.getElementById('customerEmail').value;
    var customerTicket = document.getElementById('customerTicket').value;

    var tbody = document.querySelector('.table tbody');

    // Append new row 
    tbody.innerHTML += `
        <tr>
            <td class="customerId">${customerId}</td>
            <td class="customerName">${customerName}</td>
            <td class="customerEmail">${customerEmail}</td>
            <td class="customerTicket">${customerTicket}</td>
            <td>
                <button class="view-button">VIEW</button>
                <button class="edit-button" onclick="openEditModal('${customerId}', '${customerName}', '${customerEmail}', '${customerTicket}')">EDIT</button>
                <button class="delete-button">DELETE</button>
            </td>
        </tr>
    `;

    // Close the modal
    closeModal('addCustomerModal');
}

function openEditModal(customerId, customerName, customerEmail, customerTicket) {
    openModal('editCustomerModal');

    // Populate the edit form with the current customer details
    document.getElementById('editCustomerId').value = customerId;
    document.getElementById('editCustomerName').value = customerName;
    document.getElementById('editCustomerEmail').value = customerEmail;
    document.getElementById('editCustomerTicket').value = customerTicket;
}

function closeEditModal() {
    closeModal('editCustomerModal');
}

function saveEditedCustomer() {
    // Get edited input values
    var editedCustomerId = document.getElementById('editCustomerId').value;
    var editedCustomerName = document.getElementById('editCustomerName').value;
    var editedCustomerEmail = document.getElementById('editCustomerEmail').value;
    var editedCustomerTicket = document.getElementById('editCustomerTicket').value;

    // Get all rows in the table
    var rows = document.querySelectorAll('.table tbody tr');

    // Loop through the rows to find the one with the matching customer ID
    for (var i = 0; i < rows.length; i++) {
        var customerIdCell = rows[i].querySelector('.customerId');
        if (customerIdCell && customerIdCell.textContent.trim() === editedCustomerId) {
            // Update the specific cells in the table
            rows[i].querySelector('.customerName').textContent = editedCustomerName;
            rows[i].querySelector('.customerEmail').textContent = editedCustomerEmail;
            rows[i].querySelector('.customerTicket').textContent = editedCustomerTicket;
            break; // Stop the loop once the row is updated
        }
    }

    // Close the edit modal
    closeEditModal('editCustomerModal');
}
