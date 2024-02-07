function openModal(modalId) {
    var modal = document.getElementById(modalId);
    modal.style.display = 'block';
} 

function openAddMemberModal() {
    openModal('addMemberModal');
}

function closeModal(modalId) {
    document.getElementById(modalId).style.display = 'none';
}

function addMember(memberID,memberName,memberLevel,date) {
    // Get input
    var memberID = document.getElementById('memberID').value;
    var memberName = document.getElementById('memberName').value;
    var memberLevel = document.getElementById('memberLevel').value;
    var date= document.getElementById('date').value;

    var tbody = document.querySelector('.table tbody');

    // Append new row 
    tbody.innerHTML += `
        <tr>
            <td class="memberID">${memberID}</td>
            <td class="memberName">${memberName}</td>
            <td class="memberLevel">${memberLevel}</td>
            <td class="date">${date}</td>
            <td>
                <button class="view-button">VIEW</button>
                <button class="edit-button" onclick="openEditModal('${memberID}', '${memberName}', '${memberLevel}', '${date}')">EDIT</button>
                <button class="delete-button">DELETE</button>
            </td>
        </tr>
    `;

    // Close the modal
    closeModal('addMemberModal');
}


function openEditModal(memberID, memberName, memberLevel, subscriptionDate) {
    document.getElementById('editmemberID').value = memberID;
    document.getElementById('editmemberName').value = memberName;
    document.getElementById('editmemberLevel').value = memberLevel;
    document.getElementById('editdate').value = subscriptionDate;
    document.getElementById('editMemberModal').style.display = 'block';
}


function closeEditModal() {
    closeModal('editMemberModal');
}

function saveEditedMember() {
    // Get edited input values
    var editedmemberId = document.getElementById('editmemberID').value;
    var editedmemberName = document.getElementById('editmemberName').value;
    var editedmemberLevel = document.getElementById('editmemberLevel').value;
    var editedDate = document.getElementById('editdate').value;

    // Get all rows in the table
    var rows = document.querySelectorAll('.table tbody tr');

    // Loop through the rows to find the one with the matching Member ID
    for (var i = 0; i < rows.length; i++) {
        var MemberIdCell = rows[i].querySelector('.memberID');
        if (MemberIdCell && MemberIdCell.textContent.trim() === editedmemberId) {
            // Update the specific cells in the table
            rows[i].querySelector('.memberName').textContent = editedmemberName;
            rows[i].querySelector('.memberLevel').textContent = editedmemberLevel;
            rows[i].querySelector('.date').textContent = editedDate;
            break; // Stop the loop once the row is updated
        }
    }

    // Close the edit modal
    closeEditModal('editMemberModal');
}
