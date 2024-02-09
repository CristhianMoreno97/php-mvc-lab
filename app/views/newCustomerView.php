<form action="" id="customer-form">
    <input type="hidden" name="id" id="id" value="<?php echo $parameters['customer']['id'] ?? '0' ?>">
    <div>
        <label for="first-name">First name</label>
        <input type="text" id="first-name" value="<?php echo $parameters['customer']['first_name'] ?? '' ?>">
    </div> 
    <div>
        <label for="last-name">Last name</label>
        <input type="text" id="last-name" value="<?php echo $parameters['customer']['last_name'] ?? '' ?>">
    </div> 
    <div>
        <label for="address">Address</label>
        <input type="text" id="address" value="<?php echo $parameters['customer']['address'] ?? '' ?>">
    </div> 
    <button type="submit">Save</button>
</form>

<script src="<?php echo URL_ROOT ?>/assets/js/new-customer.js"></script>