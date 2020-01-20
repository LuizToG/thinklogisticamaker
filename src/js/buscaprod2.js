  /*  var request = getXmlHttp();
 
   function cadastra(){
    var codigo = document.getElementById("codigo").value;
    var nome = document.getElementById("nome").value;
    var prinome = document.getElementById("prinome").value;
    var comissao = document.getElementById("comissao").value;
    //var vinculo = document.getElementById("vinculo").value;
    var cpfcnpj = document.getElementById("cpfcnpj").value;
    var seguimento = document.getElementById("seguimento").value;
    var revista = document.getElementById("revista").value;
    var revistaparalelo = document.getElementById("revistaparalelo").value;
    //var grupo = document.getElementById("grupo").value;
    var seguimentogestao = document.getElementById("seguimentogestao").value;
    var ativo = document.getElementById("ativo").value;
    var url= "consultaprod2.php?codigo="+codigo+"&nome="+nome+"&prinome="+prinome+"&comissao="+comissao+"&cpfcnpj="+cpfcnpj+"&seguimento="+seguimento+"&revista="+revista+"&revistaparalelo="+revistaparalelo+"&seguimentogestao="+seguimentogestao+"&ativo="+ativo;      
    
     request.open("GET", url, true);
     request.setRequestHeader("Content-Type", 
     "application/x-www-form-urlencoded");
     request.onreadystatechange = confirma;
     request.send(null);
  }*/

  revista();
function cadastra(){
    
    var codigo = document.getElementById("codigo").value;
    var nome = document.getElementById("nome").value;
    var prinome = document.getElementById("prinome").value;
    var comissao = document.getElementById("comissao").value;
    var seguimento = document.getElementById("seguimento").value;
    var seguimentogestao = document.getElementById("seguimentogestao").value;
    var revistaparalelo = document.getElementById("revistaparalelo").value;
    var ativo = document.getElementById("ativo").value;


    var revista = document.getElementById("revista").value;


    if (revista === '' || revista === 'PA' || revista === null) {
      revista = 'null';
     }


    var cpfcnpj = document.getElementById("cpfcnpj").value;
    var vinculo = document.getElementById("vinculo").value;
    var grupo = document.getElementById("grupo").value;
    var acrescimo = document.getElementById("acrescimo").value;
 
    var url= "services/consultaprod2.php?codigo="+codigo+"&nome="+nome+"&prinome="+prinome+"&comissao="+comissao+"&seguimento="+seguimento+"&seguimentogestao="+seguimentogestao+"&revistaparalelo="+revistaparalelo+"&ativo="+ativo+"&revista="+revista+"&cpfcnpj="+cpfcnpj+"&vinculo="+vinculo+"&grupo="+grupo+"&acrescimo="+acrescimo;      
    
    alert(url);
    

   $.ajax({
        type: 'GET',
        dataType: 'json',
        url: url,
        async: true,
           success: function(html) {
            location.reload();
        }
    });

    return false;
    
    
};



function revista(){

var urlrevista = "services/revista.php?revistas_id=";      

    console.log(urlrevista);

  
    $.ajax({
        //"http://192.168.0.251:8082/ERPBABITA-1.0/webresources/com.babita.modeller.viewvendasfaturamento"
        url: urlrevista,
        type: "GET",
        dataType: "json",
        //data : "param-no",
        success: function (html) {
            // var fat = $h('.'+id);
            //var fat1 = $h('.'+id);

            $('#revista').html(comboxfornecedordefeito("revista", html, "", ""));
            

        }, error: function (e) {
            alert(e);
        }
    });

}


function comboxfornecedordefeito(titulo,data,id,nome){
 
  var combox = "<option></option>";
  var data =  data.data;
  console.log(data);
 
  $.each(data,function(key,values){
     combox = combox+"<option value="+values.rev_num_rev+">"+values.rev_num_rev+"-"+values.rev_nom+"</option>";
    });
  return combox;
}
