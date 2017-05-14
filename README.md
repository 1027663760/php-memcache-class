
php相关源代码记录 php memcache封装类 带注释

使用方法：

include 'ling.memcache.php';//只需要引用一次即可

$memcache = ling_memcache::getInstance();//取得内部对象，如果对象不存在会自动创建

$memcache -> set('测试key', '测试内容', 0, 60*60);//1小时后过期

echo $memcache -> get('测试key');
