```php
$configs = OP()->Unit('Git')->SubmoduleConfig();
foreach( $configs as $config ){
    D($config);
}
```
