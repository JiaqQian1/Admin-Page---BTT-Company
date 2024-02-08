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

function editCategory(categoryId, categoryName, productNames) {
    const newName = prompt('Enter the new category name:', categoryName);
    const newProductNames = prompt('Enter the new product names (eg:Pencil,Eraser):', productNames);

    if (newName !== null && newProductNames !== null) {
        const form = document.createElement('form');
        form.method = 'post';
        form.action = 'manageCategorypg.php';

        const inputCategoryId = document.createElement('input');
        inputCategoryId.type = 'hidden';
        inputCategoryId.name = 'categoryID';
        inputCategoryId.value = categoryId;
        form.appendChild(inputCategoryId);

        const inputCategoryName = document.createElement('input');
        inputCategoryName.type = 'hidden';
        inputCategoryName.name = 'categoryName';
        inputCategoryName.value = newName;
        form.appendChild(inputCategoryName);

        const inputProductNames = document.createElement('input');
        inputProductNames.type = 'hidden';
        inputProductNames.name = 'productNames';
        inputProductNames.value = newProductNames;
        form.appendChild(inputProductNames);

        const inputEditCategory = document.createElement('input');
        inputEditCategory.type = 'hidden';
        inputEditCategory.name = 'editCategory';
        inputEditCategory.value = true;
        form.appendChild(inputEditCategory);

        document.body.appendChild(form);
        form.submit();
    }
}

function deleteCategory(categoryId) {
    const confirmation = confirm('Are you sure you want to delete this category?');
    if (confirmation) {
        const form = document.createElement('form');
        form.method = 'post';
        form.action = 'manageCategorypg.php';

        const inputCategoryId = document.createElement('input');
        inputCategoryId.type = 'hidden';
        inputCategoryId.name = 'categoryID';
        inputCategoryId.value = categoryId;
        form.appendChild(inputCategoryId);

        const inputDeleteCategory = document.createElement('input');
        inputDeleteCategory.type = 'hidden';
        inputDeleteCategory.name = 'deleteCategory';
        inputDeleteCategory.value = true;
        form.appendChild(inputDeleteCategory);

        document.body.appendChild(form);
        form.submit();
    }
}
