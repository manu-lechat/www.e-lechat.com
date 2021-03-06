<?php

namespace Kirby\Editor;

use Kirby\Toolkit\Str;

class CodeBlock extends Block
{
    public function markdown(): string
    {
        return '```' . $this->attrs()->language() . PHP_EOL . $this->content() . PHP_EOL . '```' . PHP_EOL . PHP_EOL;
    }
}
