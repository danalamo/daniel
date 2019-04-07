<?php

namespace Tests\Browser;

use Carbon\Carbon;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ExampleTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->browse(function (Browser $browser) {
            $page = 1;
            $per_page = 100;
            $base = 'https://northmetrochurch.ccbchurch.com/api';
            $browser
                ->visit('https://northmetrochurch.ccbchurch.com/goto/login')
                ->type('[data-test=username]', env('CCB_USER'))
                ->type('[data-test=password]', env('CCB_PASS'))
                ->click('[data-test=Button-login]')
                ->waitForLocation('/index.php')
                ->visit($url = "$base/individuals?page=$page&per_page=$per_page")
                ->whenAvailable('pre', function(Browser $el) use ($browser, $url, $per_page, $page) {
                    $json = $browser->resolver->findOrFail('pre')->getText();
                    \DB::table('individuals')->insert([
                        'url' => $url,
                        'per_page' => $per_page,
                        'page' => $page,
                        'data' => $json,
                        'created_at' => new Carbon,
                        'updated_at' => new Carbon,
                    ]);
                })
            ;
                
            $browser->driver->executeScript('return console.log("test", {data:[{id:1, name:"daniel"}]});');
            
            $browser->storeConsoleLog('individuals');
        });
    }
}
