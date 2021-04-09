<?php 
// Proteção dash-user -- Se não existir a sessão com email cadastrado redireciona para index.php
session_start();
if(!$_SESSION['email']){
  header('Location: index.php');
  exit();
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>    
    <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.7.1.min.js"></script>
    <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>
    <script src="https://d3js.org/d3.v3.min.js"></script>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/dashforge.css">    
  </head>

  <body class="page-profile">
  <header class="navbar navbar-header navbar-header-fixed">      
      <div class="navbar-brand">
        Desafio de Programação - Vaga Full Stack Jr.
       <img  src="assets/img/header_logo2.png" alt="" style="height: 50px; width: 160px">
      </div>      
    </div>  
  </header>

   <div class="content content-fixed">
      <div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">
        <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
          <div>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Coronavírus Monitor - PB</li>
              </ol>
            </nav>
            <h4 class="mg-b-0 tx-spacing--1">Bem Vindo ao Dashboard Paraíba</h4>
            <p class="tx-11 tx-color-03 mg-b-0">Atualizado em: <span id ="data" class="tx-medium tx-success"></span></p>
             <p class="tx-11 tx-color-03 mg-b-0"><span>Dados dos Boletins Epidemiológicos da Paraíba, via projeto Brasil.IO</span></p>
          </div>          
        </div>

        <div class="row row-xs">
          <div class="col-sm-6 col-lg-3">
            <div class="card card-body">
              <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Confirmados</h6>
              <div class="d-flex d-lg-block d-xl-flex align-items-end">
                <h3 id="casos-confirmados" class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1"></h3>
              </div>

              <div class="chart-three">
                 
                </div><!-- chart-three -->
            </div>
          </div><!-- col -->
          <div class="col-sm-6 col-lg-3 mg-t-10 mg-sm-t-0">
            <div class="card card-body">
              <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Mortes</h6>
              <div class="d-flex d-lg-block d-xl-flex align-items-end">
                <h3  id="mortes" class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1"></h3>                
              </div>
         
            </div>
          </div><!-- col -->
          <div class="col-sm-6 col-lg-3 mg-t-10 mg-lg-t-0">
            <div class="card card-body">
              <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Taxa de Mortalidade</h6>
              <div class="d-flex d-lg-block d-xl-flex align-items-end">
                <h3 id ="taxa-mortalidade" class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1"></h3>
                
              </div>
           
            </div>
          </div><!-- col -->
          <div class="col-sm-6 col-lg-3 mg-t-10 mg-lg-t-0">
            <div class="card card-body">
              <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Confirmados por 100k Habitantes</h6>
              <div class="d-flex d-lg-block d-xl-flex align-items-end">
                <h3 id = "casos-por-100k"class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1"></h3>
                
              </div>
            
            </div>
          </div><!-- col -->
        
         
          <div class="col-md-6 col-xl-4 mg-t-10 order-md-1 order-xl-0">
            <div class="card ht-lg-100p ">
              <div class="card-header bg-light d-flex align-items-center justify-content-between">
                <h6 class="mg-b-0"> Casos na Paraíba</h6>
                
              </div><!-- card-header -->
              <div class="card-body pd-0">

                <div class="pd-y-25 pd-x-20">
                  <p class="tx-11 tx-color-03 mg-b-0"><span>Clique no mapa para exibir os dados.</span></p>
                  <svg id="mapa" class="ht-200"></svg>
                </div>
               <div class="table-responsive">
                  <table class="table table-bordered">
                                        <div id="card-legend">
      
      Cidade: <span id="cidade"></span><br>
      Código IBGE: <span id="codigo"></span><br>
      Confirmados: <span id="confirmados"></span><br>
      Mortes: <span id="card-mortes"></span><br>

  </div>
                    <thead>
                      <tr>
                        <th class="wd-40 text-center">Cidades Afetadas</th>
                        <th class="wd-25 text-center">Cidades com Mortes</th>
                   
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td id="cidades-afetadas"class="tx-center"></td>
                        <td id="num-cidades-mortes"class="text-center"></td>
                    
                      </tr>                   
                
                    </tbody>

                  </table>


                </div>
              </div>
            </div>
          </div>
          

          <div class="col-lg-12 col-xl-6 mg-t-10">
            <div class="card ht-lg-100p">
              <div class="card-header bg-light d-flex align-items-center justify-content-between">
                <h6 class="mg-b-0">Boletins das Notificações de Casos - PB</h6>
                
              </div><!-- card-header -->
              <div class="card-body ">                      
                <div class="table-responsive">
                  <table id="covid-table-boletim-PB" class=" table no-footer dtr-inline collapsed" role="grid" style="width: 732px;">
                    <thead>
                      <tr role="row">
                        
                        <th >Data:</th>                                      
                        <th >URL:</th>  
                        <th >Observação:</th>                                        
                       
                       
                        
                       
                      </tr>
                    </thead>                   
                  </table>

                </div><!-- table-responsive -->
              </div>
            </div><!-- card -->           
          </div><!-- col -->
     
        </div><!-- row -->
      </div><!-- container -->
    </div>

    <footer class="footer">
      <div>
       
       
      </div>
      
    </footer>

    <script src="assets/js/app.js"></script>
    <script src="assets/lib/jquery/jquery.min.js"></script>
    <script src="assets/lib/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="assets/lib/datatables.net-dt/js/dataTables.dataTables.min.js"></script>
    <script src="assets/lib/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="assets/lib/datatables.net-responsive-dt/js/responsive.dataTables.min.js"></script>    
  

<script type="text/javascript">
//Autor: Iury Coelho
$(function(){
        'use strict'

$('#dataTable').DataTable({
          'ajax': 'assets/data/casosPb.json',
          "columns": [
                          
            { "data": "city" },    
            { "data": "confirmed" },    
            { "data": "deaths" },
            { "data": "death_rate" },
            { "data": "date" }
          

          ],
          
          pageLength: 7,
          order: [[ 2, "desc" ]],
          language: {
            
            searchPlaceholder: 'Procurar...',
            sSearch: '',
            lengthMenu: ' ',

          }
        });

$('#covid-table-boletim-PB').DataTable({
          'ajax': 'assets/data/boletinsPB.json',
          "columns": [                          
            { "data": "date" },        
            { "data": "url" },
            { "data": "notes" }         
          ],
          responsive: true,
          pageLength: 7,
          order: [[ 1, "desc" ]],
          language: {
            
            searchPlaceholder: 'Procurar...',
            sSearch: '',
            lengthMenu: ' ',

          }
        });

 

 // Select2
  $('#dataTable').select2({ minimumResultsForSearch: Infinity });
       
});



/* Define escala de cor para plotar uma cor para cada quantidade de casos
var color = d3.scale.linear()
  .domain([1, 20])
  .clamp(true)
  .range(['#fff', '#409A99']);*/

  let features;
  var geojson = 'assets/data/paraiba.json';
  var div_map =document.getElementById("div-map")
//variaveis de estilo do mapa
 
  var height = 200;
  var width = 300; 
  var border=2;
  var bordercolor="whitesmoke";
  var mapColor = "steelblue";
  var fill = "rgba(255, 49, 255, 0.388)",
        stroke = "rgba(0, 0, 0, 0.5)",
        strokeWidth = 0.1,
        radius = 6, // tamanho do circulo de marcação 
        centered;

// definindo o tamanho do svg
  var svg = d3.select('svg')
      .attr('width', width)
      .attr('height', height);

// Adicionando um background com a class map-background
  svg.append('rect')
     .attr('class', 'map-background')
     .attr('width', width)
     .attr('height', height)

//projetando o mapa da PB
  var projection = d3.geo
      .mercator()
      .scale(4330)
      .translate([2934, -429]); //posicao so mapa na tag svg 

// definindo os caminhos 
    var path = d3.geo.path()
       .projection(projection);

//append g e setando a class map-color definindo a cor do mapa 
  var g = svg.append('g');
  var map = g.append('g')
      .classed('map-color', true);

// Carregando o arquivo json com as coordenadas da PB
d3.json(geojson, function(data) {
   features = data.features;

/*Atualizando as cores das cidades de acordo com a qauntidade de casos*/
//color.domain([0, d3.max(features, numCasos)]);

//eventos para cada estado
  map.selectAll('path')
      .data(features)
      .enter().append('path')
      .attr('d', path)      
      .on('click', clicked) // ativação da função quando o moouse for clicado em cima da area 
      .on('mouseover', mouseover)
      .on('mouseout', mouseout);   
      
});

</script>

    <script src="assets/lib/jquery/jquery.min.js"></script>
    <script src="assets/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/lib/feather-icons/feather.min.js"></script>
    <script src="assets/lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/lib/prismjs/prism.js"></script>
    <script src="assets/lib/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="assets/lib/datatables.net-dt/js/dataTables.dataTables.min.js"></script>
    <script src="assets/lib/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="assets/lib/datatables.net-responsive-dt/js/responsive.dataTables.min.js"></script>
   
  </body>
</html>
