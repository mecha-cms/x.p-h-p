<?php namespace x\p_h_p\page;

function content($content) {
    if (!$content || false === \strpos($content, '<?')) {
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
        $content = \fire(function ($content) {
            \ob_start();
            \extract($GLOBALS, \EXTR_SKIP);
            // Parse mixed PHP expression and plain HTML data
            $parts = \preg_split('/(<\?(?:php|=)(?:"(?:[^"\\\]|\\\.)*"|\'(?:[^\'\\\]|\\\.)*\'|[\s\S])*?(?:\?>|$))/', $content, -1, \PREG_SPLIT_NO_EMPTY | \PREG_SPLIT_DELIM_CAPTURE);
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

function description($description) {
    return \fire(__NAMESPACE__ . "\\content", [$description], $this);
}

function title($title) {
    return \fire(__NAMESPACE__ . "\\content", [$title], $this);
}

\Hook::set('page.content', __NAMESPACE__ . "\\content", 2);
\Hook::set('page.description', __NAMESPACE__ . "\\description", 2);
\Hook::set('page.title', __NAMESPACE__ . "\\title", 2);

if (\defined("\\TEST") && 'x.p-h-p' === \TEST && \is_file($test = __DIR__ . \D . 'test.php')) {
    require $test;
}