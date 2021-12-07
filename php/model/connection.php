<?php
class Connection
{
    private static $DB_URL = "localhost";
    private static $DB_PORT = "3306";
    private static $USER = "root";
    private static $PASSWORD = "root";
    private static $DATABASE = "progweb";
    private static $conn;

    public static function getConnection()
    {
        try {
            self::$conn = new PDO(
                "mysql:host=" . self::$DB_URL . ";port=" . self::$DB_PORT . ";dbname=" . self::$DATABASE . ";",
                self::$USER,
                self::$PASSWORD
            );

            self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return self::$conn;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function closeConnection()
    {
        self::$conn = null;
    }

    function __destruct()
    {

        self::$conn = null;
    }

    function CreateTable()
    {
        $tableUsuario = "create table if not exists Usuario(
            id_usuario int not null auto_increment,
            nome varchar(255) not null,
            data_nascimento date not null,
            cpf char(14) not null,
            telefone varchar(20),
            email varchar(255),
            username varchar(20) not null,
            senha varchar(255) not null,
            authenticated_token varchar(255),
            nivel int,
            experiencia float,
            ranking varchar(50) not null,
            score_streak int,
            primary key (id_usuario)
            )ENGINE = innodb";

        $tablePartida = "create table if not exists Partida(id_partida int not null auto_increment,
            cod_usuario int not null,
            dimensao_campo int not null,
            area_campo int,
            numero_bombas int not null,
            modalidade varchar(50) not null,
            data_partida datetime not null default now(),
            tempo_gasto float not null,
            resultado tinyint not null,
            pontuacao int not null,
            primary key (id_partida),
            constraint fk_UsuarioPartida foreign key (cod_usuario) 
            references Usuario(id_usuario) 
            )ENGINE = innodb";


        try {
            $database = self::getConnection();
            $database->exec($tableUsuario);
            $database->exec($tablePartida);
        } catch (PDOException $e) {
            echo "Ocorreu um erro: " . $e->getMessage();
        }
    }
}
