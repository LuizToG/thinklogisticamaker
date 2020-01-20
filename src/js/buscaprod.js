       
function buscarProdEtiquetaRevista() {
	
	
	  var codigo = $("#codigo").val();
	  //var nome = $("#nome").val();
	  var urlperfil = "services/consultaprod.php?codigo="+codigo;
	   $.get(urlperfil, function (dataReturn) {
		console.log(urlperfil);
            console.log(dataReturn)
   dataReturn = jQuery.parseJSON(dataReturn);
var tabela = "";
cont = 0;
$.each(dataReturn.data, function (key, values) {
cont = 1;
console.log(dataReturn.data);
tabela = tabela+"<table class='table table-striped table-bordered table-hover col-12 ' id='table'> <thead class = 'bg-dark text-white'><tr><th>Codigo</th> <th>Nome</th><th>Primeiro Nome</th><th>Comissão</th><th>Vinculo</th><th>CPF/CNPJ</th><th>Segmento Site</th><th>Revistas</th><th>Paralelo/Revista</th><th>Segmento Gestão</th><th>Fashion Club / Outros</th><th>Acrescimo</th></tr> </thead> <tbody><tr> <th>"+values.fabricantes_id+"</th> <th> "+values.fabricantes_nome+" </th> <th> "+values.fabricantes_nomfant+" </th><th> "+values.fabricantes_comissao+" </th><th> "+values.fv_vinculacao_id+" </th><th> "+values.fv_fabricantes_cnpj+" </th><th> "+values.segmento_nome+" </th><th> "+values.fabricantes_revistas_id+" </th><th> "+values.fabricantes_revista+" </th><th> "+values.fabricantes_segmento_id_gestao+" </th><th> "+values.grupo_nome+" </th><th> "+values.fabricantes_bonus+" </th></tr> </tbody></table>";


});
if(cont === 1){
  $('#table').html(tabela);
}
if(cont === 0){
	
	 $('#table').html("NÃO ENCONTRADO");
	 
}
	//coloco na div o retorno da requisica 

        });
		
		}

       

		function buscacpf() {
	
	
			var vinculo = $("#vinculo").val();
			//var nome = $("#nome").val();
			var urlperfil = "services/buscacpf.php?vinculo="+vinculo;
			 $.get(urlperfil, function (dataReturn) {
			  console.log(urlperfil);
				  console.log(dataReturn)
		 dataReturn = jQuery.parseJSON(dataReturn);
	  var tabela = "";
	  cont = 0;
	  $.each(dataReturn.data, function (key, values) {
	  cont = 1;
	  console.log(dataReturn.data);
	  tabela = tabela+"<table class='table table-striped table-bordered table-hover col-12 ' id='table2'> <thead class = 'bg-dark text-white'><tr><th>Vinculo</th> </tr> </thead> <tbody><tr> <th>"+values.fv_fabricantes_cnpj+"</th> </tr> </tbody></table>";
	  
	  
	  });
	  if(cont === 1){
		$('#table2').html(tabela);
	  }
	  if(cont === 0){
		  
		   $('#table2').html("NÃO ENCONTRADO");
		   
	  }
		  //coloco na div o retorno da requisica 
	  
			  });
			  
			  }
	  