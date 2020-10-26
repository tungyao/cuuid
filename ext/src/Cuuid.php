<?php

namespace Tungyao\Ext;

/**
 * Class Cuuid
 * @package Tungyao\Ext
 */
class Cuuid {
    private $conn = null;
    private $code = false;

    /**
     * @param string $address
     * @param int $port
     * @return Cuuid
     */
    public static function Create($address = '127.0.0.1', $port = 8082) {
        $c = new Cuuid();
        $conn = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
        socket_connect($conn, $address, $port);
        if ($conn) {
            $c->code = socket_read($conn, 32);
        }
        $c->conn = $conn;
        return $c;
    }

    /**
     * @return string
     */
    public function get(): string {
        socket_write($this->conn, 'get');
        $c->code = socket_read($this->conn, 32);
        return $this->code;
    }

    /**
     *
     */
    public function close(): void {
        socket_close($this->conn);
    }
}
