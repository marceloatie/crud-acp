
function confirmaExclusao(nomeRegistro, urlExclusao){
    alertify.confirm('Confirmação de exclusão', 'Deseja realmente excluir '+nomeRegistro+' ?',
    function(){
        //OK
        window.location.assign(urlExclusao);
    }, function(){
        //Cancelar
    }).set('labels', {ok:'Excluir', cancel:'Cancelar'});
}
