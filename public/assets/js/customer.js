async function listCustomer() {
    let response = await fetch(
        'http://localhost/php_router/public/customer/table'
    )

    let responseData = await response.json()
    console.log(responseData)

    if (responseData.success) {
        const customerTableBody = document.getElementById('customerTableBody')
        responseData.result.forEach(item => {
            customerTableBody.insertAdjacentHTML('beforebegin', `<tr>
            <td>${item.first_name}</td>
            <td>${item.last_name}</td>
            <td>${item.address}</td>
            <td>
                <button>Editar</button>
                <button>Eliminar</button>
            </td>
            </tr>`)
        })
    }
}

listCustomer()