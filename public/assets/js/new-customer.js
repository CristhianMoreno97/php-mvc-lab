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
    customer.id = document.getElementById('id').value

    let path = customer.id ? 'update' : 'create';

    let response = await fetch('http://localhost/php_router/public/customer/' + path, {
        method: 'POST',
        body: JSON.stringify(customer)
    })
    let responseData = await response.json()

    if (responseData.success) {
        alert('Operación exitosa')
    } else {
        alert('Error en la operación')
    }
}
