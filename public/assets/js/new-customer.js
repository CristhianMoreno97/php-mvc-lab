const customerForm = document.getElementById('customer-form');

customerForm.addEventListener('submit', (e) => {
    e.preventDefault();
    customerFormSubmit();
})

async function customerFormSubmit () {
    let customer = {};
    customer.firstName = document.getElementById('first-name').value
    customer.lastName = document.getElementById('last-name').value
    customer.address = document.getElementById('address').value

    let response = await fetch('http://localhost/php_router/public/customer/create', {
        method: 'POST',
        body: JSON.stringify(customer)
    })
    let responseData = await response.json()

    if (responseData.success) {
        alert('Cliente creado con éxito')
        customerForm.reset()
    } else {
        alert('Error al crear cliente')
    }
}
