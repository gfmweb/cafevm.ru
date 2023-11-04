<?php

namespace App\Helpers;

class Redis
{
    /**
     * @return \Redis
     * @throws \RedisException
     */
    public static function getRedis(): \Redis
    {
        $redis = new \Redis();
        $redis->connect('127.0.0.1',6379);
        $redis->select(env('REDIS_BASE'));
        return $redis;
    }
}