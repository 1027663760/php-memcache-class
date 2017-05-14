<?php
class ling_memcache{
	private $conn;
	private static $memcache = null;
	function __construct() {
		//$this->conn = new Memcache();
		$this->conn = memcache_connect ('127.0.0.1',11211);
    }
	
	/**
	 * 静态方法，返回memcache对象
	 */
	public static function getInstance() {
		if (self::$memcache == null) {
			self::$memcache = new ling_memcache();
		}
		return self::$memcache;
	}
	
	/**
	 * get - 查询指定元素的值
	 * key：指定元素
	 * 返回key对应的存储元素的字符串值或者在失败或key未找到的时候返回FALSE
	 */
	function get($key) {
		return memcache_get($this->conn,$key);
	}
	
	/**
	 * set函数 - 向key存储一个元素值为 var
	 * expire：以秒为单位的失效时间 默认为0
	 * flag：元素是否使用zlib压缩 默认为0不压缩，可选值：MEMCACHE_COMPRESSED
	 * 成功时返回 TRUE， 或者在失败时返回 FALSE
	 */
	function set($key, $var, $flag = 0 ,$expire = 0) {
		return memcache_set($this->conn, $key, $var, $flag, $expire);
	}
	
	/**
	 * decrement函数 - 减小元素的值
	 * key：指定元素
	 * value：要将指定元素的值减小多少
	 * 成功的时候返回元素的新值 或者在失败时返回 FALSE
	 */
	function decrement($key, $value) {
		return memcache_decrement($this->conn, $key, $value);
	}
	
	/**
	 * increment函数 - 增加元素的值
	 * key：指定元素
	 * value：要将指定元素的值增加多少
	 * 成功的时候返回元素的新值 或者在失败时返回 FALSE
	 */
	function increment($key, $value) {
		return memcache_increment($this->conn, $key, $value);
	}
	
	/**
	 * delete函数 - 删除一个元素
	 * key：指定元素
	 * timeout：多少秒后删除，默认为0 = 马上删除
	 * 成功时返回 TRUE， 或者在失败时返回 FALSE
	 */
	function delete($key, $timeout = 0) {
		return memcache_delete($this->conn, $key, $timeout);
	}
	
	/**
	 * flush函数 - 清空所有元素
	 * 本函数并不会真正的释放任何资源，而是仅仅标记所有元素都失效了，因此已经被使用的内存会被新的元素复写
	 * 成功时返回 TRUE， 或者在失败时返回 FALSE
	 */
	function flush() {
		return memcache_flush($this->conn);
	}
	
	/**
	 * getStats函数 - 获取统计信息
	 * 返回的数组key是统计信息名，值就是统计信息的值；失败时返回 FALSE
	 */
	function getStats() {
		return memcache_get_stats($this->conn);
	}
	
	/**
	 * getVersion函数 - 获取memcache版本信息
	 * 返回服务端版本号(字符串形式) 失败时返回 FALSE
	 */
	function getVersion() {
		return memcache_get_Version($this->conn);
	}
}
?>
