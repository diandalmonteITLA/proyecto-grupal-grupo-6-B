<?php 
declare(strict_types = 1);
namespace src\Persistence;

//Clase que maneja la persistencia en Json de los comentarios
class CommentJsonRepo {
    private string $filePath;

    public function __construct(string $path) {
        $this->filePath = $path;
        //Se verifica si la ruta existe
        if (!file_exists($this->filePath)) {
            file_put_contents($this->filePath, json_encode([]));
        }
    }

    //Devuelve los comentarios como array
    public function getComments(): array {

        $jsonString = file_get_contents($this->filePath);
        return json_decode($jsonString, true) ?? [];

    }

    public function addComment(array $newItem): void {

        $currentData = $this->getComments();
        $currentData[] = $newItem;
        
        $this->save($currentData);

    }

    //Guarda los cambios en JSON
    private function save(array $data): void {

        $jsonString = json_encode($data, JSON_PRETTY_PRINT);
        file_put_contents($this->filePath, $jsonString);
        
    }
}
?>