<?
class Tag {
    var $atributo;
    var $votos;

    function __construct($atr, $targetId){
        $this->atributo = $atr;
        $this->votos = 1;
        $todosUsuarios = pegaJson("DB/dbUsuarios.json");
        foreach ($todosUsuarios as $cara)
            if ($cara->id == $targetId){
                array_push($cara->tags, $this);
                break;
            }
            $db = fopen("DB/dbUsuarios.json", 'w');
            fwrite($db, json_encode($todosUsuarios, JSON_PRETTY_PRINT));
            fclose($db);
        }
}
?>