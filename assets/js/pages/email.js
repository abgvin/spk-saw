$( document ).ready(function() {
    
    "use strict";
    
    var hiddenMailOptions = function() {
        if($('.checkbox-mail:checked').length) {
            $('.mail-hidden-options').css('display', 'inline-block');
        } else {
            $('.mail-hidden-options').css('display', 'none');
        };
    };
    
    hiddenMailOptions();
    
    $('.check-mail-all').on('click', function () {
        if($(this).hasClass('all-checked')){
            $(this).removeClass('all-checked');
            $('.checkbox-mail').each(function() {
                if($(this).closest('tr').hasClass("checked")){
                    $(this).click();
                };
            });
        } else {
            $('.checkbox-mail').each(function() {
                if(!$(this).closest('tr').hasClass("checked")){
                    $(this).click();
                };
            });
            $(this).addClass('all-checked');
        }
    });
    
    $('.checkbox-mail').each(function() {
        $(this).click(function() {
            if($(this).closest('tr').hasClass("checked")){
                $(this).closest('tr').removeClass('checked');
                hiddenMailOptions();
            } else {
                $(this).closest('tr').addClass('checked');
                hiddenMailOptions();
            }
        });
    });
    
    $('.mailbox-content tr td:first-child').on('click', function(e) {
        e.stopPropagation();
    });
});
