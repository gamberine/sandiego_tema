
San Diego — Home Pack (Bootstrap + Slick + ACF)

1) Copie a pasta deste pacote para o diretório do seu tema (child theme recomendado).
2) Inclua o arquivo inc/enqueue-and-acf.php no functions.php do tema:
   require_once get_stylesheet_directory() . '/inc/enqueue-and-acf.php';
   
3) No WordPress, crie uma página e aplique o template "Home San Diego" (page-home.php).
4) Edite a página e monte as seções via ACF (as imagens de exemplo estão em assets/img).
5) Ajuste o link do botão de busca via filtro 'sandiego/search_button_url' no functions.php se desejar integrar o motor de reservas.
6) Abra o arquivo copy-helper.html localmente para copiar/colar os textos com 1 clique.
