function openModal(modalId) {
    var modal = document.getElementById(modalId);
    modal.style.display = 'block';
} 

function openAddStaffModal() {
    openModal('addStaffModal');
}

function closeModal(modalId) {
    document.getElementById(modalId).style.display = 'none';
}

function addStaff(staffId, staffName, staffRole) {
    // Get input
    var staffId = document.getElementById('staffId').value;
    var staffName = document.getElementById('staffName').value;
    var staffRole = document.getElementById('staffRole').value;

    var tbody = document.querySelector('.table tbody');

    // Append new row 
    tbody.innerHTML += `
        <tr>
            <td class="staffId">${staffId}</td>
            <td class="staffName">${staffName}</td>
            <td class="staffRole">${staffRole}</td>
            <td>
                <button class="staff-view-button">VIEW</button>
                <button class="staff-edit-button" onclick="openEditStaffModal('${staffId}', '${staffName}', '${staffRole}')">EDIT</button>
                <button class="staff-delete-button">DELETE</button>
            </td>
        </tr>
    `;

    // Close the modal
    closeModal('addStaffModal');
}

function openEditModal(staffId, staffName, staffRole) {
    openModal('editStaffModal');

    // Populate the edit form with the current staff details
    document.getElementById('editStaffId').value = staffId;
    document.getElementById('editStaffName').value = staffName;
    document.getElementById('editStaffRole').value = staffRole;
}

function closeEditModal() {
    closeModal('editStaffModal');
}

function saveEditedStaff() {
    // Get edited input values
    var editedStaffId = document.getElementById('editStaffId').value;
    var editedStaffName = document.getElementById('editStaffName').value;
    var editedStaffRole = document.getElementById('editStaffRole').value;

    // Get all rows in the table
    var rows = document.querySelectorAll('.table tbody tr');

    // Loop through the rows to find the one with the matching staff ID
    for (var i = 0; i < rows.length; i++) {
        var staffIdCell = rows[i].querySelector('.staffId');
        if (staffIdCell && staffIdCell.textContent.trim() === editedStaffId) {
            // Update the specific cells in the table
            rows[i].querySelector('.staffName').textContent = editedStaffName;
            rows[i].querySelector('.staffRole').textContent = editedStaffRole;
            break; // Stop the loop once the row is updated
        }
    }

    // Close the edit modal
    closeEditModal('editStaffModal');
}

