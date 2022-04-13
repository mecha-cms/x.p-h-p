PHP Page Extension for [Mecha](https://github.com/mecha-cms/mecha)
==================================================================

![Code Size](https://img.shields.io/github/languages/code-size/mecha-cms/x.p-h-p?color=%23444&style=for-the-badge)

If you don’t like the [block](https://github.com/mecha-cms/x.block.e) evaluation method, you can use this extension to evaluate PHP expressions in the page file. It’s just that, you need to write the page content as raw HTML code, so you can’t combine this extension feature with [markdown](https://github.com/mecha-cms/mecha/tree/v3.0.0/lot/x/markdown) extension and the like (unless you are fine with implementing the parser in the PHP code).

---

Release Notes
-------------

### 1.0.3

 - [./mecha-cms/mecha#96](https://github.com/mecha-cms/mecha/issues/96)

### 1.0.2

 - Added ability to evaluate alternative block syntax. Example: `<?php if ($a): ?><b>c</b><?php endif; ?>`.

### 1.0.1

 - Added page type field with a value of `PHP` for [panel](https://github.com/mecha-cms/x.panel) extension.

### 1.0.0

 - Initial release.