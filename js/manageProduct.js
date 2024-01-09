function openModal(modalId) {
    var modal = document.getElementById(modalId);
    modal.style.display = 'block';
} 

function openAddProductModal() {
    openModal('addProductModal');
}

function closeModal(modalId) {
    document.getElementById(modalId).style.display = 'none';
}

function addProduct(productId,productName,productType,productDate) {
    // Get input
    var productId = document.getElementById('productId').value;
    var productName = document.getElementById('productName').value;
    var productType = document.getElementById('productType').value;
    var productDate = document.getElementById('productDate').value;

    var tbody = document.querySelector('.table tbody');

    // Append new row 
    tbody.innerHTML += `
        <tr>
            <td class="productId">${productId}</td>
            <td class="productName">${productName}</td>
            <td class="productType">${productType}</td>
            <td class="productDate">${productDate}</td>
            <td>
                <button class="view-button">VIEW</button>
                <button class="edit-button" onclick="openEditModal('${productId}', '${productName}', '${productType}', '${productDate}')">EDIT</button>
                <button class="delete-button">DELETE</button>
            </td>
        </tr>
    `;

    // Close the modal
    closeModal('addProductModal');
}


function openEditModal(productId, productName, productType, productDate) {
    openModal('editProductModal');

    // Populate the edit form with the current product details
    document.getElementById('editProductId').value = productId;
    document.getElementById('editProductName').value = productName;
    document.getElementById('editProductType').value = productType;
    document.getElementById('editProductDate').value = productDate;
}

function closeEditModal() {
    closeModal('editProductModal');
}

function saveEditedProduct() {
    // Get edited input values
    var editedProductId = document.getElementById('editProductId').value;
    var editedProductName = document.getElementById('editProductName').value;
    var editedProductType = document.getElementById('editProductType').value;
    var editedProductDate = document.getElementById('editProductDate').value;

    // Get all rows in the table
    var rows = document.querySelectorAll('.table tbody tr');

    // Loop through the rows to find the one with the matching product ID
    for (var i = 0; i < rows.length; i++) {
        var productIdCell = rows[i].querySelector('.productId');
        if (productIdCell && productIdCell.textContent.trim() === editedProductId) {
            // Update the specific cells in the table
            rows[i].querySelector('.productName').textContent = editedProductName;
            rows[i].querySelector('.productType').textContent = editedProductType;
            rows[i].querySelector('.productDate').textContent = editedProductDate;
            break; // Stop the loop once the row is updated
        }
    }

    // Close the edit modal
    closeEditModal('editProductModal');
}
