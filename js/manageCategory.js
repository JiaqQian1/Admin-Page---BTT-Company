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

function editCategory(categoryID) {
    const newName = prompt('Enter the new category name:');
    const newProductNames = prompt('Enter the new product names (eg:Pencil,Eraser):');

    if (newName !== null && newProductNames !== null) {
        // Create a form dynamically and submit it
        const form = document.createElement('form');
        form.method = 'post';
        form.action = ''; // Leave it empty to submit to the same page

        const hiddenField1 = document.createElement('input');
        hiddenField1.type = 'hidden';
        hiddenField1.name = 'editCategory';
        hiddenField1.value = 'true';
        form.appendChild(hiddenField1);

        const hiddenField2 = document.createElement('input');
        hiddenField2.type = 'hidden';
        hiddenField2.name = 'categoryID';
        hiddenField2.value = categoryID;
        form.appendChild(hiddenField2);

        const hiddenField3 = document.createElement('input');
        hiddenField3.type = 'hidden';
        hiddenField3.name = 'categoryName';
        hiddenField3.value = newName;
        form.appendChild(hiddenField3);

        const hiddenField4 = document.createElement('input');
        hiddenField4.type = 'hidden';
        hiddenField4.name = 'productNames';
        hiddenField4.value = newProductNames;
        form.appendChild(hiddenField4);

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
