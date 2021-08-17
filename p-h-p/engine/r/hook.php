<?php

Hook::set('_', function($_) {
    // Add `PHP` field
    if (isset($_['lot']['desk']['lot']['form']['lot'][1]['lot']['tabs']['lot']['page']['lot']['fields']['lot']['type'])) {
        $_['lot']['desk']['lot']['form']['lot'][1]['lot']['tabs']['lot']['page']['lot']['fields']['lot']['type']['lot']['PHP'] = 'PHP';
    }
    return $_;
});
