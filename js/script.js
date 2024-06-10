$(function(){
    //mostrarmodal entrada e saída de produtos
    function mostrarModais(sel){
        $(sel).fadeIn(100).css('display','flex');
    }
    $('.btEntrada').click(()=>{mostrarModais('.fundoModalEntrada');})
    $('.btSaida').click(()=>{mostrarModais('.fundoModalSaida');})

    //esconder modal entrada e saída e produtos
    function esconderModais(sel){
        $(sel).fadeOut(100);sel
    }
    $('.fundoModalEntrada').click(function(e){
        if(e.target === this)
            esconderModais('.fundoModalEntrada');
    })
    $('.fundoModalSaida').click(function(e){
        if(e.target === this)
            esconderModais('.fundoModalSaida');
    })
    $('.contCadEntrada .btCancelarModal').click(function(e){
        esconderModais('.fundoModalEntrada');
        e.preventDefault();
    })
    
    $('.contCadSaida .btCancelarModal').click(function(e){
        esconderModais('.fundoModalSaida');
        e.preventDefault();
    })

    //seleção nova categoria
    $('.contRadioCat').click(()=>{
        if($('.contRadioCat .radioCat svg').css('display') == 'none'){
            $('.contRadioCat .radioCat svg').fadeIn(100);
            $('select.categoria').css('display','none');
            $('input.categoria').css('display','block');
            $('select.categoria').val('');
        }else{
            $('.contRadioCat .radioCat svg').fadeOut(100);
            $('input.categoria').css('display','none');
            $('select.categoria').css('display','block');
            $('input.categoria').val('');
        }
    })
})