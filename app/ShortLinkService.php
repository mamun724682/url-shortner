<?php

namespace App;

use App\Models\ShortLink;

class ShortLinkService
{
    public function updateOrCreate($data_array, $id = null)
    {
        try {
            $data = collect($data_array)->only(['link'])->toArray();

            $data['code'] = $this->random_number_with_char();
            $data['last_visited'] = now();

            $short_link = ShortLink::updateOrCreate(['id' => $id], $data);

            $short_link->url_used_times()->create();

            return $short_link;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function updateAndCreateTime(ShortLink $link)
    {
        try {
            $link->update(['last_visited' => now()]);

            $link->url_used_times()->create();

            return $link;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    protected function random_number_with_char($limit = 5)
    {
        // return substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $limit); // High chance generate repeated code
        return Str::random(); // Less chance to generate repeated code
    }

}
