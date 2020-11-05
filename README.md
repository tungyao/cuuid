# 使用方法

* 安装 `composer require tungyao/uuid`
* 使用

```php
use Tungyao\Uuid\Cuuid;

class Create {

    public function __construct() {
        $cuuid  = new Cuuid();
        $newId = $cuuid->get(); // 每执行一次都会生成新的id
        $newId = $cuuid->get();
        $cuuid->close(); // 使用完成建议执行关闭方法
    }
}

```