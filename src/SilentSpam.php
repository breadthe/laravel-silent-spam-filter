<?php

namespace Breadthe\SilentSpam;

class SilentSpam
{
    protected $blacklist = [];

    /**
     * Amend the silentspam config blacklist at runtime with additional criteria.
     *
     * @param array $keywords
     */
    public function blacklist(array $keywords = [])
    {
        $this->blacklist = $keywords;
    }

    public function isSpam($message)
    {
        foreach (array_merge(config('silentspam.blacklist') ?? [], $this->blacklist) as $keyword) {
            if (preg_match("/{$keyword}/i", $message)) {
                return true;
            }
        }

        return false;
    }

    public function notSpam($message)
    {
        return ! $this->isSpam($message);
    }
}
