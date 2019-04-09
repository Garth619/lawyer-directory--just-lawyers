<?php
	
	
	//https://stackoverflow.com/questions/35924138/adding-acf-to-custom-wp-api-endpoints
	
// permite que meta_key e meta_value 
// sejam filtrados pela api
function filtros( $valid_vars ) {
    $valid_vars = array_merge( 
        $valid_vars, 
            array( 
                'meta_key', 
                'meta_value' ) );
    return $valid_vars;
}
add_filter( 'rest_query_vars', 'filtros' );
// funcção que retorna posts do autor
function busca( $data ) {
    $posts = get_posts(array(
        'post_type' => 'imoveis',
        'posts_per_page'    =>  '1000',
        'meta_query'    => array(
            'relation'  =>  'AND',
            array(
                'key'   =>  'transacao',
                'value' => $data['tipo']
            ),
            array(
                'key'   =>  'quartos',
                'value' => $data['quartos'],
                'compare'   =>  '>'
            )
        )
    ));

    if ( empty( $posts ) ) {
        return new WP_Error( 'sem resultados', 'quartos: ' . $data['quartos'] . ' transacao: '. $data['tipo'], array( 'status' => 404 ) );
    }
    else {
    foreach ($posts as $key => $post) {
        $posts[$key]->acf = get_fields($post->ID);
    }
    return $posts;
}
// cria o endpoint que ira receber a função acima
add_action( 'rest_api_init', function () {
    register_rest_route( 'busca/v2', '/resultado/(?P<tipo>.+)/(?P<quartos>\d+)', 
        array(
            'methods' => 'GET',
            'callback' => 'busca',

        ) 
    );
});