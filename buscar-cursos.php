<?php

require 'vendor/autoload.php';

use Gustavodell\BuscadorCursos\Buscador;
//GuzzleHttp realiza requisições https
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

//Fazendo requisição por meio do guzzleHttp
$client = new Client(['base_uri' => 'https://www.alura.com.br/']);
//Crawler lé o conteudo html
$crawler = new Crawler();

$buscador = new Buscador($client, $crawler);
$cursos = $buscador->buscar('/cursos-online-programacao/php');

foreach($cursos as $curso){
    echo exibeMensagem($curso);
}
