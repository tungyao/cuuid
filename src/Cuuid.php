<?php

namespace Tungyao\Uuid;

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
    public function __construct($address = '127.0.0.1', $port = 8082) {
        $conn = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
        socket_connect($conn, $address, $port);
        if ($conn) {
            $this->code = socket_read($conn, 32);
        }
        $this->conn = $conn;
    }

    /**
     * @return string
     */
    public function get(): string {
        socket_write($this->conn, "get", 3);
        $this->code = socket_read($this->conn, 32);
        return $this->code;
    }

    // 会唯一的短链接
    public function link(): string {
        socket_write($this->conn, "lnk", 3);
        $this->code = socket_read($this->conn, 32);
        return $this->code;
    }

    /**
     *
     */
    public function close(): void {
        socket_close($this->conn);
    }
}
