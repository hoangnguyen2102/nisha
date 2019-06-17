$( document ).ready(function() {
    // Keep expanded sticky item when opening register form
    $("#sticky-nav .sticky-item .register-expanded").click(function(e) {
        e.preventDefault();
        $(this).parent().toggleClass("active");
    });
    if (window.location.href.indexOf('cam-on') > -1) {
        $("#sticky-nav").find('.register-expanded').parent().addClass('hidden');
    };
    $.validator.addMethod(
        "vnphone",
        function(value, element) {
            var re = new RegExp(/^(0\d{9,10})$/);
            return this.optional(element) || re.test(value);
        },
        "10-11 digits start with 0"
    );
    var registerStickyForm = $('.register-sticky-form');
    if(registerStickyForm.length == 1){
        registerStickyForm.validate({
            rules:{
                name: 'required',
                custom_phone_mobile: 'required',
                email: 'required'
            },
            submitHandler: function(){
                $(this.currentForm).find('input[name="email"]').val();
                return true;
            }
        });
    }
});