<?php namespace _\lot\x\p_h_p\panel\page;

function fields($_) {
    // Add `PHP` field
    if (isset($_['lot']['desk']['lot']['form']['lot'][1]['lot']['tabs']['lot']['page']['lot']['fields']['lot']['type'])) {
        $_['lot']['desk']['lot']['form']['lot'][1]['lot']['tabs']['lot']['page']['lot']['fields']['lot']['type']['lot']['PHP'] = 'PHP';
    }
    return $_;
}

\Hook::set('_', __NAMESPACE__ . "\\fields");
