async function listCustomer() {
    let response = await fetch(
        'http://localhost/php_router/public/customer/table'
    )

    let responseData = await response.json()
    console.log(responseData)

    if (responseData.success) {
        const customerTableBody = document.getElementById('customerTableBody')
        customerTableBody.innerHTML = '';
        responseData.result.forEach(item => {
            customerTableBody.insertAdjacentHTML('beforeend', `<tr>
            <td>${item.first_name}</td>
            <td>${item.last_name}</td>
            <td>${item.address}</td>
            <td>
                <a href="http://localhost/php_router/public/customer/edit/?id=${item.id}">
                    <button>Editar</button>
                </a>
                <button onclick="deleteCustomer(${item.id})">Eliminar</button>
            </td>
            </tr>`)
        })
    }
}

listCustomer()

async function deleteCustomer(id) {
    let response = await fetch("http://localhost/php_router/public/customer/delete", {
        method: 'DELETE',
        body: JSON.stringify({ id }),
    })
    let responseData = await response.json()
    
    if (responseData.success) {
        listCustomer()
    } else {
        alert(responseData.message)
    }
}