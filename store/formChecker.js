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
    console.log("Fieldname {0}, Value: {1}", fieldName, field.value);
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
        console.log(val);
        return validateField(form, val, restriction);
    }).reduce(function(prev, cur) {
        return prev && cur;
    }, true);
    if(not(isValid)) {
        alert("All quantities must be whole numbers, zero or more");
    }
    return isValid;
}