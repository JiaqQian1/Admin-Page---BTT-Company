let categories = [
    {
        id: 1,
        categoryName: 'Concert',
        productNames: ['BlackPink Concert', 'Angela Zhang Concert', 'Xue ZhiQian Concert']
    },
    {
        id: 2,
        categoryName: 'Choir',
        productNames: ['The Sixteen Choir', 'Vienna Boys\' Choir']
    },
    {
        id: 3,
        categoryName: 'Live Band',
        productNames: ['Maneskin Live Band', 'ColdPlay Live Band', 'Maroon 5 Live Band']
    }
];


function displayCategories(categories) {
    const categoryList = document.querySelector('.category-list tbody');
    categoryList.innerHTML = '';

    categories.forEach(category => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td class="CategoryId">${category.id}</td>
            <td class="categoryName">${category.categoryName}</td>
            <td class="productName">${category.productNames.join(', ')}</td>
            <td>
                <button onclick="editCategory(${category.id}, '${category.categoryName}', '${category.productNames.join(', ')}')">Edit</button>
                <button onclick="deleteCategory(${category.id})">Delete</button>
            </td>
        `;
        categoryList.appendChild(row);
    });
}

function renderProductList(productNames) {
    const productList = document.createElement('ul');
    productNames.forEach(name => {
        const listItem = document.createElement('li');
        listItem.textContent = name;
        productList.appendChild(listItem);
    });
    return productList.innerHTML;
}

function addCategory() {
    const categoryName = document.getElementById('categoryName').value;
    const productNames = document.getElementById('productNames').value.split(',').map(name => name.trim());

    const newCategory = {
        id: categories.length + 1,
        categoryName: categoryName,
        productNames: productNames
    };

    categories.push(newCategory);
    displayCategories(categories);

    document.getElementById('categoryName').value = '';
    document.getElementById('productNames').value = '';
}

function editCategory(categoryId, categoryName, productNames) {
    const newName = prompt('Enter the new category name:', categoryName);
    const newProductNames = prompt('Enter the new product names (eg: Pencil, Eraser):', productNames);

    if (newName !== null && newProductNames !== null) {
        // Create a form element
        const form = document.createElement('form');
        form.method = 'post';
        form.action = 'manageCategorypg.php'; // Point to the PHP script that handles form submission

        // Create input fields for category ID, name, and product names
        const categoryIdInput = document.createElement('input');
        categoryIdInput.type = 'hidden';
        categoryIdInput.name = 'categoryID';
        categoryIdInput.value = categoryId;
        form.appendChild(categoryIdInput);

        const categoryNameInput = document.createElement('input');
        categoryNameInput.type = 'hidden';
        categoryNameInput.name = 'categoryName';
        categoryNameInput.value = newName;
        form.appendChild(categoryNameInput);

        const productNamesInput = document.createElement('input');
        productNamesInput.type = 'hidden';
        productNamesInput.name = 'productNames';
        productNamesInput.value = newProductNames;
        form.appendChild(productNamesInput);

        // Append the form to the document body and submit it
        document.body.appendChild(form);
        form.submit();
    }
}

function deleteCategory(categoryId) {
    const confirmation = confirm('Are you sure you want to delete this category?');
    if (confirmation) {
        // Find category index
        const categoryIndex = categories.findIndex(category => category.id === categoryId);
        if (categoryIndex !== -1) {
            // Remove category from array
            categories.splice(categoryIndex, 1);
            // Redisplay categories
            displayCategories(categories);
        }
    }
}
