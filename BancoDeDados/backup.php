<?php 

$app->get('/backup', function (Request $request, Response $response) {
    // Verifica se o usuário tem permissão de administrador
    if (!isAdmin()) {
        return $response->withStatus(403)->write('Você não tem permissão para acessar essa página.');
    }
    
    // Gerando o backup da base de dados
    $dump = new \Ifsnop\Mysqldump\Mysqldump('database', 'username', 'password');
    
    // Salvando o backup em um arquivo
    $filename = 'backup_' . date('YmdHis') . '.sql';
    file_put_contents($filename, $dump->getMysqldump());
    
    // Disponibilizando o backup para download
    $response = $response->withHeader('Content-Type', 'application/octet-stream');
    $response = $response->withHeader('Content-Disposition', 'attachment; filename="' . $filename . '"');
    $response = $response->write(file_get_contents($filename));
    unlink($filename);
    return $response;
});