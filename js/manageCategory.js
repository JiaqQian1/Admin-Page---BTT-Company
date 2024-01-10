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

displayCategories(categories);

function displayCategories(categories) {
    const categoryList = document.querySelector('.category-list tbody');
    categoryList.innerHTML = '';

    categories.forEach(category => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td class="CategoryId">${category.id}</td>
            <td class="categoryName">${category.categoryName}</td>
            <td class="productName">
                <div>${renderProductList(category.productNames)}</div>
            </td>
            <td>
                <button onclick="editCategory(${category.id})">Edit</button>
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

function editCategory(categoryId) {
    const newName = prompt('Enter the new category name:');
    const newProductNames = prompt('Enter the new product names (eg:Pencil,Eraser):');

    if (newName !== null && newProductNames !== null) {
        const categoryToUpdate = categories.find(category => category.id === categoryId);
        if (categoryToUpdate) {
            categoryToUpdate.categoryName = newName;
            categoryToUpdate.productNames = newProductNames.split(',').map(name => name.trim());
            displayCategories(categories);
        }
    }
}

function deleteCategory(categoryId) {
    const confirmation = confirm('Are you sure you want to delete this category?');
    if (confirmation) {
        categories = categories.filter(category => category.id !== categoryId);
        displayCategories(categories);
    }
}
