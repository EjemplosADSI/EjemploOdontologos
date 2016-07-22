<?php

/**
 * Created by PhpStorm.
 * User: CAPACITACION-PC
 * Date: 22/07/2016
 * Time: 8:50
 */

require_once('db_abstract_class.php');

class Odontologos extends db_abstract_class
{
    private $idodontologos;
    private $nombres;
    private $apellidos;
    private $especialidad;
    private $direccion;
    private $celular;
    private $user;
    private $pass;
    private $estado;

    /**
     * @return mixed
     */
    public function getIdodontologos()
    {
        return $this->idodontologos;
    }

    /**
     * @param mixed $idodontologos
     */
    public function setIdodontologos($idodontologos)
    {
        $this->idodontologos = $idodontologos;
    }

    /**
     * @return mixed
     */
    public function getNombres()
    {
        return $this->nombres;
    }

    /**
     * @param mixed $nombres
     */
    public function setNombres($nombres)
    {
        $this->nombres = $nombres;
    }

    /**
     * @return mixed
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * @param mixed $apellidos
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;
    }

    /**
     * @return mixed
     */
    public function getEspecialidad()
    {
        return $this->especialidad;
    }

    /**
     * @param mixed $especialidad
     */
    public function setEspecialidad($especialidad)
    {
        $this->especialidad = $especialidad;
    }

    /**
     * @return mixed
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * @param mixed $direccion
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    /**
     * @return mixed
     */
    public function getCelular()
    {
        return $this->celular;
    }

    /**
     * @param mixed $celular
     */
    public function setCelular($celular)
    {
        $this->celular = $celular;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getPass()
    {
        return $this->pass;
    }

    /**
     * @param mixed $pass
     */
    public function setPass($pass)
    {
        $this->pass = $pass;
    }

    /**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * @param mixed $estado
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    /* Metodo destructor cierra la conexion. */
    function __destruct() {
        $this->Disconnect();
        unset($this);
    }

    /* Metodo que crear un objeto con los datos enviados o vacio por defecto*/
    public function __construct($odontologos_data=array()){
        parent::__construct();
        if(count($odontologos_data)>1){
            foreach ($odontologos_data as $campo=>$valor){
                $this->$campo = $valor;
            }
        }else {
            $this->idodontologos = "";
            $this->nombres = "";
            $this->apellidos = "";
            $this->especialidad = "";
            $this->direccion = "";
            $this->celular = "";
            $this->user = "";
            $this->pass = "";
            $this->estado = "";
        }
    }

    public function insertar(){
        $this->insertRow("INSERT INTO odontologos VALUES ('NULL', ?, ?, ?, ?, ?, ?, ?, ?)", array(
                $this->nombres,
                $this->apellidos,
                $this->especialidad,
                $this->direccion,
                $this->celular,
                $this->user,
                $this->pass,
                $this->estado,
            )
        );
        $this->Disconnect();
    }

    public function editar(){
        $arrUser = (array) $this;
        $this->updateRow("UPDATE odontologos SET nombres = ?, apellidos = ?, especialidad = ?, direccion = ?, celular = ?, user = ?, pass = ?, estado = ? WHERE idodontologos = ?", array(
            $this->nombres,
            $this->apellidos,
            $this->especialidad,
            $this->direccion,
            $this->celular,
            $this->user,
            $this->pass,
            $this->estado,
            $this->idodontologos,
        ));
        $this->Disconnect();
    }

    public function eliminar($id){
        if ($id > 0){
            return $this->deleteRow("DELETE FROM Odontologos WHERE id = ?", array($id));
        }else{
            return false;
        }
    }

    public static function buscarForId($id){
        $odonto = new Odontologos();
        if ($id > 0){
            $getrow = $odonto->getRow("SELECT * FROM odontologos WHERE idodontologos =?", array($id));
            $odonto->idodontologos = $getrow['idodontologos'];
            $odonto->nombres = $getrow['nombres'];
            $odonto->apellidos = $getrow['apellidos'];
            $odonto->especialidad = $getrow['especialidad'];
            $odonto->direccion = $getrow['direccion'];
            $odonto->celular = $getrow['celular'];
            $odonto->user = $getrow['user'];
            $odonto->pass = $getrow['pass'];
            $odonto->saldo = $getrow['saldo'];
            $odonto->estado = $getrow['estado'];
            $odonto->Disconnect();
            return $odonto;
        }else{
            return NULL;
        }
    }

    public static function getAll(){
        return Odontologos::buscar("SELECT * FROM odontologos");
    }

    public static function buscar($query){
        $arrOdontologos = array();
        $tmp = new Odontologos();
        $getrows = $tmp->getRows($query);

        foreach ($getrows as $valor) {
            $odont = new Odontologos();
            $odont->idodontologos = $valor['idodontologos'];
            $odont->nombres = $valor['nombres'];
            $odont->apellidos = $valor['apellidos'];
            $odont->especialidad = $valor['especialidad'];
            $odont->direccion = $valor['direccion'];
            $odont->celular = $valor['celular'];
            $odont->user = $valor['user'];
            $odont->pass = $valor['pass'];
            $odont->estado = $valor['estado'];
            array_push($arrOdontologos, $odont);
        }
        $tmp->Disconnect();
        return $arrOdontologos;
    }

}