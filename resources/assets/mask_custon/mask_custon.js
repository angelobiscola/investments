
$(document).ready(function(){
    $('.cnpj').mask('00.000.000/0000-00');
    $('.cpf').mask('000.000.000-00');
    $('.rg').mask('0.000.000-0');
    $('.cep').mask('00000-000');
    $('.data').mask('00/00/0000');

    if(!$('.phone').val())
    {
        $('.phone').val('+55')
    }

    var SPMaskBehavior = function (val) {
            return val.replace(/\D/g, '').length === 13 ? '+00 - (00) 00000-0000' : '+00 - (00) 0000-00009';
        },
        spOptions = {
            onKeyPress: function(val, e, field, options) {
                field.mask(SPMaskBehavior.apply({}, arguments), options);
            }
        };
    $('.phone').mask(SPMaskBehavior, spOptions);

});
