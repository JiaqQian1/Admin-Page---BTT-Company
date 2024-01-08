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
    // Get input values
    var productId = document.getElementById('productId').value;
    var productName = document.getElementById('productName').value;
    var productType = document.getElementById('productType').value;
    var productDate = document.getElementById('productDate').value;

    var tbody = document.querySelector('.table tbody');
    var newRow = document.createElement('tr');
    newRow.innerHTML = `
                        <tr>
                            <td class="productId">${productId}/td>
                            <td class="productName">${productName}</td>
                            <td class="productType">${productType}</td>
                            <td class="productDate">${productDate}</td>
                            <td>
                                <button class="view-button">VIEW</button>
                                <!-- Modify your "EDIT" button like this -->
                                <button class="edit-button" onclick="openEditModal('01', 'Elvin', '05/01/01', 'BLACKPINK CONCERT', 'A100')">EDIT</button>

                                <button class="delete-button">DELETE</button>
                            </td>
                        </tr>`;

     tbody.appendChild(newRow);
    // Close the modal
    closeModal('addProductModal');
}
