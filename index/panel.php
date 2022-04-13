<?php

// Add `PHP` field
if ('GET' === $_SERVER['REQUEST_METHOD'] && 0 === strpos($_['type'] . '/', 'page/') && !empty($_['is']['page'])) {
    Hook::set('_', function($_) {
        if (isset($_['lot']['desk']['lot']['form']['lot'][1]['lot']['tabs']['lot']['page']['lot']['fields']['lot']['type'])) {
            $_['lot']['desk']['lot']['form']['lot'][1]['lot']['tabs']['lot']['page']['lot']['fields']['lot']['type']['lot']['PHP'] = 'PHP';
        }
        return $_;
    });
}