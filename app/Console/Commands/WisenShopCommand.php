<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

abstract class WisenShopCommand extends Command
{
    public $commander = 'WisenShop: ';
    protected function clearCached()
    {
        Artisan::call('config:clear');
        Artisan::call('cache:clear');
    }

    protected function showConsoleHeadingMessage($message, $label = 'INFO', $bg_color = 'blue', $text_color = 'white', $compact = false)
    {
        $this->output->writeln('');
        $this->output->writeln('  <bg=' . $bg_color . ';fg=' . $text_color . '> ' . $this->commander . $label . ' </> ' . $message);
        if (!$compact)
            $this->output->writeln('');
    }

    protected function showConsoleHeadingInfo($message)
    {
        $this->showConsoleHeadingMessage('', $message, 'blue');
    }

    protected function showConsoleHeadingError($message)
    {
        $this->showConsoleHeadingMessage('', $message, 'red');
    }

    protected function showConsoleHeadingInfoCompact($message)
    {
        $this->showConsoleHeadingMessage('', $message, 'blue', 'white', true);
    }

    protected function showConsoleHeadingErrorCompact($message)
    {
        $this->showConsoleHeadingMessage('', $message, 'red', 'white', true);
    }

    protected function showConsoleHeadingMessageCompact($message, $label = 'INFO', $bg_color = 'blue', $text_color = 'white')
    {
        $this->showConsoleHeadingMessage($message, $label, $bg_color, $text_color, true);
    }

    protected function messageAligned($message, $type = 'info', $compact = false)
    {
        if ($type == 'info')
            $this->info('  ' . $message);
        else if ($type == 'error')
            $this->error('  ' . $message);

        if (!$compact)
            $this->output->writeln('');
    }

    protected function infoAligned($message, $compact = false)
    {
        $this->messageAligned($message, 'info', $compact);
    }

    protected function errorAligned($message, $compact = false)
    {
        $this->messageAligned($message, 'error', $compact);
    }

    protected function messageAlignedCompact($message, $type = 'info')
    {
        if ($type == 'info')
            $this->info('  ' . $message, true);
        else if ($type == 'error')
            $this->error('  ' . $message, true);
    }

    protected function infoAlignedCompact($message)
    {
        $this->messageAlignedCompact($message, 'info');
    }

    protected function errorAlignedCompact($message)
    {
        $this->messageAlignedCompact($message, 'error');
    }

    protected function messageAlignedBig($message, $label = 'INFO', $bg_color = 'green', $text_color = 'white')
    {
        $content = $this->commander . $label . ' > ' . $message;
        $content_length = strlen($content);

        $padding = str_repeat(' ', $content_length);

        $this->output->writeln(' ');
        $this->output->writeln('  <bg=' . $bg_color . ';fg=' . $text_color . '> ' . $padding . ' </>'); // Top blank line with background
        $this->output->writeln('  <bg=' . $bg_color . ';fg=' . $text_color . '> ' . $content . ' </>');
        $this->output->writeln('  <bg=' . $bg_color . ';fg=' . $text_color . '> ' . $padding . ' </>'); // Bottom blank line with background
        $this->output->writeln(' ');
    }

    protected function errorAlignedBig($message, $label = 'ERROR')
    {
        $this->messageAlignedBig($message, $label, 'red', 'white');
    }

    protected function toCamelCase($string)
    {
        return Str::camel($string);
    }

    protected function toSnakeCase($string)
    {
        return Str::snake($string);
    }

    protected function toKebabCase($string)
    {
        return Str::kebab($string);
    }

    protected function emptyDirectory($directory)
    {
        if (File::isDirectory($directory)) {
            $files = File::files($directory);

            foreach ($files as $file) {
                File::delete($file);
            }
        }
    }
}