<?php
// +----------------------------------------------------------------------
// | Producer.php
// +----------------------------------------------------------------------
// | Description: 生产者
// +----------------------------------------------------------------------
// | Time: 2018/12/19 下午3:05
// +----------------------------------------------------------------------
// | Author: Object,半醒的狐狸<2252390865@qq.com>
// +----------------------------------------------------------------------

include_once 'boot.php';

try {

    \Ablegang\PhpMq\Queue::init('Mysql', [
        'dsn' => 'mysql:host=mysql;dbname=test',
        'username' => 'root',
        'password' => 'root',
        'table' => 'queues',
        'ttr' => 60,
    ]); // 队列初始化

    // 生产者放入消息

    $job = new \Ablegang\PhpMq\Driver\Job([
        'job_data' => json_encode(['order_id' => time(), 'user_id' => 0001]),
        'tube' => 'test'
    ]);
    $job = \Ablegang\PhpMq\Queue::put($job);

} catch (\Exception $e) {
    var_dump($e->getMessage());
}
