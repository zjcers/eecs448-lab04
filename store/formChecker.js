function mustBeZeroOrGreaterInteger(val)
{
    return /^([0-9]+)$/.test(val);
}
/*
 * Validates a single form field
 * 
 * Parameters:
 * form: HTMLFormElement
 * fieldName: string (must be a element inside of form)
 * restrictions: function(value: string) -> boolean
 * 
 * Returns:
 * boolean (true if field value is valid, else false)
 */
function validateField(form, fieldName, restrictions)
{
    var field = form[fieldName];
    return restrictions(field.value);
}
/*
 * For the sake of bangs are hard to see
 */
function not(val) {
    return !val;
}
var fields = {
    "quan-banana": mustBeZeroOrGreaterInteger,
    "quan-apple": mustBeZeroOrGreaterInteger,
    "quan-grapefruit": mustBeZeroOrGreaterInteger
};
/*
 * Validates all fields in the store form
 * Pops up an alert and stops the submission if the validation fails
 */
function validate()
{
    var form = document.forms["store"];
    var formFields = Object.keys(fields);
    var isValid = formFields.map(function(val, i, arr){
        var restriction = fields[val];
        return validateField(form, val, restriction);
    }).reduce(function(prev, cur) {
        return prev && cur;
    }, true);
    if(not(isValid)) {
        alert("All quantities must be whole numbers, zero or more");
    }
    return isValid;
}
var shippingPrices = {
    "free": 0,
    "overnight": 50,
    "3day": 5
};
var currencyFormat = new Intl.NumberFormat("en-US", {style: "currency", currency: "USD"});
/*
 * Estimates the total and subtotal as the form is being updated
 */
function makeTotal()
{
    var form = document.forms["store"];
    var formFields = Object.keys(fields);
    var subtotal = formFields.map(function(fieldName) {
        return [fieldName, form[fieldName].value];
    }).map(function(field) {
        var quan = parseInt(field[1], 10);
        var priceName = field[0].replace("quan-", "price-");
        var price = parseFloat(document.getElementById(priceName).innerText);
        return quan*price;
    }).reduce(function(prev, cur) {
        return prev+cur;
    }, 0.0);
    var shipping = shippingPrices[form["shipping"].value];
    var total = subtotal + shipping;
    document.getElementsByName("subtotal")[0].value = currencyFormat.format(subtotal);
    document.getElementsByName("total")[0].value = currencyFormat.format(total);
}