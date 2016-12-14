# Checkpoint

This is a module that create both whitelist and blacklist for url.


# Usage

```
$checkpoint = new Checkpoint();
$checkpoint->setSafeBorders(['/path/which/always/pass/through']);
$checkpoint->setCheckpoints(['/path/which/not/pass/through', '/blacklisted']);

$can_pass_through = $checkpoint->canPassThrough('/hoge'); // will return true.
$can_pass_through = $checkpoint->canPassThrough('/blacklisted'); // will return false!
```
