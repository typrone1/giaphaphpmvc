/**
 * Add jQuery Validation plugin method for a valid password
 *
 * Valid passwords contain at least one letter and one number.
 */
$('.box-item button').click(function(){
    if (this.innerHTML == '-'){
        this.innerHTML = "<i class='fa fa-usb'></i>";
    }else {
        this.innerHTML = "<i class='fa fa-subscript'></i>";
    }
    $(this).parent().parent().find('ul').toggle();
});

$(".tree li:not(li:has(ul))").each(function () {
    $(this).find('button').remove();
});
$.validator.addMethod('validPassword',
    function(value, element, param) {

        if (value != '') {
            if (value.match(/.*[a-z]+.*/i) == null) {
                return false;
            }
            if (value.match(/.*\d+.*/) == null) {
                return false;
            }
        }

        return true;
    },
    'Must contain at least one letter and one number'
);