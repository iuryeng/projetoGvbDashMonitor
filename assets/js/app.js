//Autor Cod. JavaScrip: Iury Coelho 
//Fonte dados da API: Secretarias de Saúde das Unidades Federativas, dados tratados equipe de voluntários Brasil.IO

const JSON_DATA = "https://api.brasil.io/v1/dataset/covid19/caso/data/?format=json&is_last=True&state=PB" // todos os casos da Paraiba
const RECENTE_BRASIL = "https://api.brasil.io/v1/dataset/covid19/caso/data/?format=json&is_last=True&state" // os casos mais recentes
const DASH_CASOS = document.getElementById("casos-confirmados");
const DASH_MORTES = document.getElementById("mortes");
const DASH_TAXA_MORTALIDADE = document.getElementById("taxa-mortalidade");
const DASH_CASOS_100K = document.getElementById("casos-por-100k");
const DASH_DATA = document.getElementById("data");
const DASH_COD_IBGE =  document.getElementById("cod-ibge");
const DASH_POPULACAO = document.getElementById("populacao");
const DASH_ESTADO = document.getElementById("estado");
const DASH_CIDADES_AFETADAS = document.getElementById("cidades-afetadas");
const DASH_NUM_CIDADE_COM_MORTES = document.getElementById("num-cidades-mortes");

var inforDate;
var inforDateBoletim;
var estado;
var codigoIbgePb; 
var confirmadosPb; 
var confirmadosPor100k; 
var dataAtualizacaoPb;
var taxaMortalidadePb; 
var mortesPb;
var populacaoEstimadaPb;
var casosAcumuladosBrasil;
var cidadesAfetadas;
var numCidadeComMortes=0;
var numCidadeComCasos=0;


const DEF_API =  { // definicoes da api
  "async": true,
  "crossDomain": true,
    "method": "GET",
    "headers": {
        "Host": "api.brasil.io",
        "Authorization": "Token e90bfd7d9fd00405aa7e6ad7c0e5638cf4b44bf9" 
    }
}




function newCasos(){
    fetch(JSON_DATA, DEF_API ).then(response => response.json().then(data => { 
     

  inforDate = data;  
 
    
      
  }))
  .catch(err => {
      console.log(err);
  });

  }




function getDate(){
    fetch(JSON_DATA, DEF_API).then(response => response.json().then(data => { 
	   

	inforDate = data;  
  cidadesAfetadas = data["count"];

   for (var n = 1; n < cidadesAfetadas; n++){
      if ( data["results"][n]["deaths"] >0){
        numCidadeComMortes ++; 
      }
    }

     for (var i = 0; i < cidadesAfetadas -2; i++){
      if ( inforDate["results"][i]["confirmed"] >0){
        numCidadeComCasos ++; 
      }
    }

    
      
	}))
	.catch(err => {
	    console.log(err);
	});

  }


$( document ).ready(function() {
    fetch(RECENTE_BRASIL, DEF_API).then(response => response.json().then(data => { 
     

    var obj = data.results;
    Object.keys(obj).forEach((key) => {
    let valorPB;
      if(obj[key]["state"] == "PB"){
      valor = obj[key];
      estado = valor["state"];
      dataAtualizacaoPb = valor["date"];
      codigoIbgePb = valor["city_ibge_code"];
      confirmadosPb = valor["confirmed"];
      confirmadosPor100kPb = valor["confirmed_per_100k_inhabitants"];
      taxaMortalidadePb = valor["death_rate"];
      mortesPb = valor["deaths"];
      populacaoEstimadaPb = valor["estimated_population_2019"];
       DASH_CASOS.innerHTML = confirmadosPb;
       DASH_MORTES.innerHTML = mortesPb;
       DASH_DATA.innerHTML = dataAtualizacaoPb;
       DASH_TAXA_MORTALIDADE.innerHTML = taxaMortalidadePb;
       DASH_CASOS_100K.innerHTML = confirmadosPor100kPb;
       //DASH_ESTADO.innerHTML = estado;
       DASH_CIDADES_AFETADAS.innerHTML = numCidadeComCasos;
       //DASH_POPULACAO.innerHTML = populacaoEstimadaPb;
       //DASH_COD_IBGE.innerHTML = codigoIbgePb;
       DASH_NUM_CIDADE_COM_MORTES.innerHTML = numCidadeComMortes;
       
      }


  });

    
  }))
  .catch(err => {
      console.log(err);
  });

  });

function getDateBoletim(){
    fetch(JSON_BOLETIM_PB).then(response => response.json().then(data => {   
	
  inforDateBoletim = data;

	}))
	.catch(err => {
	    console.log(err);
	});

  }



//contar numero de cidades com registro na API
numeroCidade = 0;
/*function getDateCidade(cidade){

this.cidade = cidade;
for (var n=0; n< inforDate["results"]["length"] ; n ++) {
	if( inforDate["results"][n]["state"] == "PB"){
		//console.log(inforDate["results"][n])
		numeroCidade ++;
	}
  }
}*/


function clicked(d) {  // função para adicionar evento ao clicar na area do mapa 
  var x, y, k;
  //captura o valor do centroid da area selecionada 
  if (d && centered !== d) {
    var centroid = path.centroid(d);
    x = centroid[0];
    y = centroid[1];
    k = 4;
    centered = d;
  } else {
    x = width / 2;
    y = height / 2;
    k = 1;
    centered = null;
  }
console.log(centroid);



}

function inforCases(cidade){
  return inforDate.results.find(seed => seed.city == cidade);
}



function mouseover(d){ // aqui vai a função pra exibir os dados do covid onde o mouse passa

  d3.select(this).style('fill', '#FF8773');
  
  
  document.getElementById("card-mortes").innerHTML =`${inforCases(d.properties.name)["deaths"]}`;
  document.getElementById("cidade").innerHTML =`${d.properties.name}`;
  document.getElementById("codigo").innerHTML =`${d.properties.id}`;
  //exibindo os casos 
  document.getElementById("confirmados").innerHTML =`${inforCases(d.properties.name)["confirmed"]}`;
   d3.select('#card-legend')
          
       
          .style('display', 'block')
          .style('opacity', 0.5)

}


function mouseout(d){
  // Retorna a cor inical quando  o mouse sai 
  map.selectAll('path')
    .style('fill', function(d){return centered && d===centered ? '#D5708B' : fillFn(d);}); 
    d3.select('#card-legend')
          
          .style('opacity', 0.0)
}

function nomeEstado(d){ // capturando o nome de cada cidade 
   //return nome
}

function numCasos(d){ // capturando o numero de casos por cidade
   //return  numCasos(nomeEstado)
}


function fillFn(d){ // função para pintar o mapa de acordo com a quantidade de casos por cidade
  //return color(numCases(d));
}












      
      




    

getDate();
getDateBoletim();



