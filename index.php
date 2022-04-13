<?php namespace x;

function p_h_p($content) {
    if (false === \strpos($content, '<?')) {
        return $content;
    }
    $type = $this->type;
    if (
        'PHP' === $type ||
        'application/php' === $type ||
        'application/x-httpd-php' === $type ||
        'application/x-httpd-php-source' === $type ||
        'application/x-php' === $type ||
        'text/php' === $type ||
        'text/x-php' === $type
    ) {
        $content = \fire(function($content) {
            \ob_start();
            \extract($GLOBALS, \EXTR_SKIP);
            // Parse mixed PHP expression and plain HTML data
            $parts = \preg_split('/(<\?(?:php|=)(?:[\s\S]+?)(?:\?>|$))/', $content, null, \PREG_SPLIT_NO_EMPTY | \PREG_SPLIT_DELIM_CAPTURE);
            $out = "";
            foreach ($parts as $part) {
                $e = 0 === \strpos($part, '<?='); // Echo?
                if (0 === \strpos($part, '<?php') || $e) {
                    $part = \substr($part, $e ? 3 : 5);
                    if ('?>' === \substr($part, -2)) {
                        $part = \substr($part, 0, -2);
                    }
                    if (';' !== \substr($part = \trim($part), -1)) {
                        $part .= ';';
                    }
                    $out .= ($e ? ' echo ' : "") . $part;
                } else {
                    $out .= " echo '" . \strtr($part, ["'" => "\\'"]) . "';";
                }
            }
            eval($out);
            return \ob_get_clean();
        }, [$content], $this);
    }
    return $content;
}

\Hook::set([
    'page.content',
    'page.description',
    'page.title'
], __NAMESPACE__ . "\\p_h_p", 2);