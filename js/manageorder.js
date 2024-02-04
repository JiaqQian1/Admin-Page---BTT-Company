function openList(listId) {
    var list = document.getElementById(listId);
    list.style.display = 'block';
}

function closeList(listId) {
    document.getElementById(listId).style.display = 'none';
}

function openAddOrder() {
    openList('addOrder');
}

function addOrder(orderId, orderName, orderDate, ticketDetails, seatNumber) {
    var tbody = document.querySelector('.table tbody');

    // Append new row 
    tbody.innerHTML += `
        <tr>
            <td>${orderId}</td>
            <td>${orderName}</td>
            <td>${orderDate}</td>
            <td>${ticketDetails}</td>
            <td>${seatNumber}</td>
            <td>
                <button class="view-button">VIEW</button>
                <button class="edit-button" onclick="openEditModal('${orderId}', '${orderName}', '${orderDate}', '${ticketDetails}', '${seatNumber}')">EDIT</button>
                <button class="delete-button">DELETE</button>
            </td>
        </tr>
    `;

    // Close the modal
    closeList('addOrder');
}

function openEditModal(orderId, orderName, orderDate, ticketDetails, seatNumber) {
    openList('editOrder');

    // Populate the edit form with the current order details
    document.getElementById('editOrderId').value = orderId;
    document.getElementById('editName').value = orderName;
    document.getElementById('editOrderDate').value = orderDate;
    document.getElementById('editTicketDetails').value = ticketDetails;
    document.getElementById('editNumber').value = seatNumber;
}

function saveEditedModal() {
    var editedOrderId = document.getElementById('editOrderId').value;
    var editedName = document.getElementById('editName').value;
    var editedOrderDate = document.getElementById('editOrderDate').value;
    var editedTicketDetails = document.getElementById('editTicketDetails').value;
    var editedNumber = document.getElementById('editNumber').value;

    var rows = document.querySelectorAll('.table tbody tr');

    for (var i = 0; i < rows.length; i++) {
        var orderIdCell = rows[i].querySelector('td');
        if (orderIdCell && orderIdCell.textContent.trim() === editedOrderId) {
            rows[i].querySelectorAll('td')[1].textContent = editedName;
            rows[i].querySelectorAll('td')[2].textContent = editedOrderDate;
            rows[i].querySelectorAll('td')[3].textContent = editedTicketDetails;
            rows[i].querySelectorAll('td')[4].textContent = editedNumber;
            break;
        }
    }

    closeList('editOrder');

    function deleteOrder(orderId) {
        var rows = document.querySelectorAll('.table tbody tr');
    
        for (var i = 0; i < rows.length; i++) {
            var orderIdCell = rows[i].querySelector('td');
            if (orderIdCell && orderIdCell.textContent.trim() === orderId) {
                rows[i].remove();
                break;
            }
        }
    }
    
}
